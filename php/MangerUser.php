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
			throw new Exception("الحساب غير موجود");
		if($user->getPassword() == $password)
			return $user;
			throw new Exception("خطا في كلمة المرور او الحساب");
	}

	public function adduser($user)
	{
		if(!addUser($user))
			throw new Exception("اسم المستخدم موجود سابقا");
	}

	public function edituser($user)
	{
		if(!editUser($user))
			throw new Exception("اسم المستخدم موجود سابقا");
	}

	public function deleteuser($id)
	{
		if(!deleteUser($id))
			throw new Exception("not deleted");
	}

	public function addcause($cause)
	{
		if(!addCause($cause))
			throw new Exception("يوجد خطا في رقم المحظر او رقم الوطني");
	}

	
}



?>