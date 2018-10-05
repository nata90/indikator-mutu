<?php

/**
 * This is the model class for table "indikator".
 *
 * The followings are the available columns in table 'indikator':
 * @property integer $id_indikator
 * @property string $area_ind
 * @property string $uraian_ind
 * @property integer $id_klp
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property IndSatker[] $indSatkers
 * @property KlpArea $idKlp
 */
class Indikator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'indikator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_ind, uraian_ind, id_klp', 'required'),
			array('id_klp, status, standar', 'numerical', 'integerOnly'=>true),
			//array('area_ind, uraian_ind', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_indikator, area_ind, uraian_ind, id_klp, status, standar', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'indSatkers' => array(self::HAS_MANY, 'IndSatker', 'id_indikator'),
			'idKlp' => array(self::BELONGS_TO, 'KlpArea', 'id_klp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_indikator' => 'ID',
			'area_ind' => 'Area Indikator',
			'uraian_ind' => 'Uraian Indikator',
			'id_klp' => 'ID Kelompok',
			'status' => 'Status',
			'standar' => 'Standar (%)',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_indikator',$this->id_indikator);
		$criteria->compare('area_ind',$this->area_ind,true);
		$criteria->compare('uraian_ind',$this->uraian_ind,true);
		$criteria->compare('id_klp',$this->id_klp);
		$criteria->compare('status',$this->status);
		$criteria->compare('standar',$this->standar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
	}

	public static function getButtonGrafik($idIndikator){
		return '<a href="'.Yii::app()->createUrl('grafik/grafik', array('id'=>$idIndikator)).'">Lihat Grafik Mingguan</a> | <a href="'.Yii::app()->createUrl('grafik/grafikbulanan', array('id'=>$idIndikator)).'">Lihat Grafik Bulanan</a>';
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Indikator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
