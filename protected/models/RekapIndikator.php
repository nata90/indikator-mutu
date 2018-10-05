<?php

/**
 * This is the model class for table "rekap_indikator".
 *
 * The followings are the available columns in table 'rekap_indikator':
 * @property integer $id_rekap
 * @property integer $id_ind_satker
 * @property string $tgl
 * @property integer $numerator
 * @property integer $denumerator
 *
 * The followings are the available model relations:
 * @property IndSatker $idIndSatker
 */
class RekapIndikator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rekap_indikator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_ind_satker, tgl', 'required'),
			array('id_ind_satker, numerator, denumerator', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rekap, id_ind_satker, tgl, numerator, denumerator', 'safe', 'on'=>'search'),
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
			'idIndSatker' => array(self::BELONGS_TO, 'IndSatker', 'id_ind_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rekap' => 'Id Rekap',
			'id_ind_satker' => 'Id Ind Satker',
			'tgl' => 'Tgl',
			'numerator' => 'Numerator',
			'denumerator' => 'Denumerator',
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

		$criteria->compare('id_rekap',$this->id_rekap);
		$criteria->compare('id_ind_satker',$this->id_ind_satker);
		$criteria->compare('tgl',$this->tgl,true);
		$criteria->compare('numerator',$this->numerator);
		$criteria->compare('denumerator',$this->denumerator);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RekapIndikator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
