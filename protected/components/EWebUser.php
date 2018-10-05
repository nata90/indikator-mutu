<?php
class EWebUser extends CWebUser{
 
    protected $_model;
 
    protected function loadUser()
    {
        if ( $this->_model === null ) {
                $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }
    
    function getLevel()
    {
        $user=$this->loadUser();
        if($user)
            return $user->level;
        return 100;
    }

	function getSatker(){
		$user=$this->loadUser();
        if($user)
            return $user->id_satker;
        return 100;
	}
}