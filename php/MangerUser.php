<?php 

require_once 'lib_db.php';
require_once '../AES/AesCtr.php';



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

		$user_password = AesCtr::decrypt($user->getPassword(),'absy',256);
		$post_password = AesCtr::decrypt($password,'absy',256);
		$md5_user_password = MD5($user_password);

		if($user_password == $post_password || $password == $md5_user_password && $user_password != '')
			return $user;
			throw new Exception("خطا في كلمة المرور او الحساب");
	}

	public function forgetpassword($username)
	{
		$account = getUserByUserName($username);
		if($account == NULL)
			throw new Exception("الحساب غير موجود");
		else
			return $account;
	}

	public function changepassword($id,$password,$password1){
		
		$password11 = AesCtr::decrypt($password,'absy',256);
		$password22 = AesCtr::decrypt($password1,'absy',256);
		if($password == $password1)
			changePassword($id,$password);
		else
			throw new Exception("كلمة السر غير متطابقة");
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
	
}



?>