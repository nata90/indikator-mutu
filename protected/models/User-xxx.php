<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id_user
 * @property string $nip
 * @property string $nama_user
 * @property integer $jabatan
 * @property integer $level
 * @property integer $id_satker
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Satker $idSatker
 */
 
	
	
class User extends CActiveRecord
	{
		
		public $password;
		
		/**
		 * @return string the associated database table name
		 */
		 
		//digunakan untuk memproses data setelah di validasi
		protected function afterValidate() {
		parent::afterValidate();
				
		 //melakukan enkripsi pada passwod yang di input
		 $this->password = $this->encrypt($this->password);
		
		}
			
	//membuat sebuah fungsi untuk mengenkripsi data
	public function encrypt($value){
		 return md5($value);
	}

	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nip, nama_user, jabatan, level, id_satker, username, password', 'required'),
			array('level, id_satker', 'numerical', 'integerOnly'=>true),
			array('nip', 'length', 'max'=>25),
			array('jabatan', 'length', 'max'=>50),
			array('nama_user, username, password', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user, nip, nama_user, jabatan, level, id_satker, username, password', 'safe', 'on'=>'search'),
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
			'idSatker' => array(self::BELONGS_TO, 'Satker', 'id_satker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => 'Id User',
			'nip' => 'Nip',
			'nama_user' => 'Nama User',
			'jabatan' => 'Jabatan',
			'level' => 'Level',
			'id_satker' => 'Id Satker',
			'username' => 'Username',
			'password' => 'Password',
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

		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama_user',$this->nama_user,true);
		$criteria->compare('jabatan',$this->jabatan);
		$criteria->compare('level',$this->level);
		$criteria->compare('id_satker',$this->id_satker);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
