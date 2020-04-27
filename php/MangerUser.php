<?php 

require_once 'lib_db.php';



class cUserManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cUserManger::$_instance == NULL)
		{
			cUserManger::$_instance = new cUserManger();
		}
		return cUserManger::$_instance;
	}

	public function login($username,$password)
	{
		$user = getUserByUserName($username);
		if($user == NULL)
			throw new Exception("Account Not Found");
		if($user->getPassword() == $password)
			return $user;
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

	public function addcause($cause)
	{
		if(!addCause($cause))
			throw new Exception("user no add");
	}

	
}



?>