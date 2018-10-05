<?php

/**
 * This is the model class for table "ind_satker".
 *
 * The followings are the available columns in table 'ind_satker':
 * @property integer $id_ind_satker
 * @property integer $id_indikator
 * @property integer $id_satker
 *
 * The followings are the available model relations:
 * @property Indikator $idIndikator
 * @property Satker $idSatker
 * @property RekapIndikator[] $rekapIndikators
 */
class IndSatker extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ind_satker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_indikator, id_satker,  id_pjdata', 'required'),
			array('id_indikator, id_satker, id_pjdata', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_ind_satker, id_indikator, id_pjdata, id_satker', 'safe', 'on'=>'search'),
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
			'idIndikator' => array(self::BELONGS_TO, 'Indikator', 'id_indikator'),
			'idSatker' => array(self::BELONGS_TO, 'Satker', 'id_satker'),
			'idPjdata' => array(self::BELONGS_TO, 'PjData', 'id_pjdata'),
			'rekapIndikators' => array(self::HAS_MANY, 'RekapIndikator', 'id_ind_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_ind_satker' => 'Id Ind Satker',
			'id_indikator' => 'Id Indikator',
			'id_satker' => 'Id Satker',
			'id_pjdata' => 'Id Pj Data',
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

		$criteria->compare('id_ind_satker',$this->id_ind_satker);
		$criteria->compare('id_indikator',$this->id_indikator);
		$criteria->compare('id_satker',$this->id_satker);
		$criteria->compare('id_pjdata',$this->id_pjdata);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			/* 'sort'=>array(
				'attributes'=>array(
					'total_jam' => array(
						'asc' => 'total_jam',
						'desc' => 'total_jam DESC',
					),
					'total_pelatihan' => array(
						'asc' => 'total_pelatihan',
						'desc' => 'total_pelatihan DESC',
					),
					'*',
				),
			), */
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IndSatker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
