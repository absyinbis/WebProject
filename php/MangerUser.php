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

	
}



?>