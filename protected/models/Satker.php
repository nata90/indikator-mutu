<?php

/**
 * This is the model class for table "satker".
 *
 * The followings are the available columns in table 'satker':
 * @property integer $id_satker
 * @property integer $id_unit
 * @property string $nama_satker
 *
 * The followings are the available model relations:
 * @property IndSatker[] $indSatkers
 * @property Unit $idUnit
 * @property User[] $users
 */
class Satker extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'satker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_unit', 'required'),
			array('id_unit', 'numerical', 'integerOnly'=>true),
			array('nama_satker', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_satker, id_unit, nama_satker', 'safe', 'on'=>'search'),
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
			'indSatkers' => array(self::HAS_MANY, 'IndSatker', 'id_satker'),
			'idUnit' => array(self::BELONGS_TO, 'Unit', 'id_unit'),
			'users' => array(self::HAS_MANY, 'User', 'id_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_satker' => 'ID',
			'id_unit' => 'ID Unit',
			'nama_satker' => 'Nama Satuan Kerja',
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

		$criteria->compare('id_satker',$this->id_satker);
		$criteria->compare('id_unit',$this->id_unit);
		$criteria->compare('nama_satker',$this->nama_satker,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Satker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public static function getListSatker(){
		$data = CHtml::listData(Satker::model()->findAll(), 'id_satker', 'nama_satker');
		return $data; 
	}
}
