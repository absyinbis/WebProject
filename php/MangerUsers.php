<?php 

require_once 'lib_db.php';



class cUserManager
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cUserManager::$_instance == NULL)
		{
			cUserManager::$_instance = new cUserManager();
		}
		return cUserManager::$_instance;
	}



	public function adduser($user)
	{

	}

	public function edituser($user)
	{

	}

	public function deleteuser($user)
	{

	}
	
}


 ?>