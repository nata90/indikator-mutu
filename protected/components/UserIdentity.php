<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id; 
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$model = new User;
		$user = $model->findByAttributes(array('username'=>$this->username));
		if($user===null){
		$this->errorCode=self::ERROR_USERNAME_INVALID;
				} else {if($user->password!==$user->encrypt($this->password)){
		$this->errorCode=self::ERROR_PASSWORD_INVALID;		
				} else {
		$this->_id = $user->id_user;
		$this->setState('level', $user->level);
		$this->setState('idsatker', $user->id_satker);
		$this->errorCode=self::ERROR_NONE;	
				}
		}
		
		return !$this->errorCode;
		
	}
	
	public function getId(){
	return $this->_id;
	}
	
	public function accessRules(){
		$us = Yii::app()->user->name;
		$model= new User;
		$level = $model->findByAttributes(array('level'=>1,'username'=>$us));
	if(isset($level)){
		return array(
		array('allow', // allow all users to perform 'index' and 'view' actions
		'actions'=>array('index','view'),
		'users'=>array('*'),
			),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions'=>array('admin','create'),
		'users'=>array('@'),
			),
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
		'actions'=>array('update','delete'),
		'users'=>array($level->username),
			),
		array('deny', // deny all users
		'users'=>array('*'),
			),
		);
			}else{
		return array(
		array('allow', // allow all users to perform 'index' and 'view' actions
		'actions'=>array('index','view'),
		'users'=>array('*'),
			),
		array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions'=>array('admin','create'),
		'users'=>array('@'),
			),
		array('deny', // deny all users
		'users'=>array('*'),
			),
		);
	}

}
}