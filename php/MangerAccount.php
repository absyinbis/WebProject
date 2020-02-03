<?php
require_once 'lib_db.php';



class cAccountManager
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cAccountManager::$_instance == NULL)
		{
			cAccountManager::$_instance = new cAccountManager();
		}
		return cAccountManager::$_instance;
	}
	

	public function login($username,$password)
	{
		$account = getPoliceStation($username);
		if($account == NULL)
			throw new Exception("Account Not Found");
		if($account->getPassword() == $password)
			return $account;
			throw new Exception("Wrong Username/Password");
	}

	public function addpolicestation($account)
	{
		if(!addPoliceStation($account))
			throw new Exception("username alreday used");
	}

	public function editpolicestation($account)
	{
		if(!editPoliceStation($account))
			throw new Exception("not edit");
	}

	public function deletepolicestation($id)
	{
		if(!deletePoliceStation($id))
			throw new Exception("not delete");
	}

}

 ?>