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

	public function login($username,$password)
	{
		$account = getPoliceStation($username);
		if($account == NULL)
			throw new Exception("Account Not Found");
		if($account->getPassword() == $password)
			return $account;
			throw new Exception("Wrong Username/Password");
	}

	public function adduser($user)
	{
		if(!addUser($user))
			throw new Exception("user no add");
	}

	public function edituser($user)
	{
		if(!editUser($user))
			throw new Exception("not edit");
	}

	public function deleteuser($id)
	{
		if(!deleteUser($id))
			throw new Exception("not deleted");
	}

	public function logg($process,$name,$date,$who)
	{
		Logg($process,$name,$date,$who);
	}
	
}


 ?>