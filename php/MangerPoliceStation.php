<?php 

require_once 'lib_db.php';



class cPoliceStationManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cPoliceStationManger::$_instance == NULL)
		{
			cPoliceStationManger::$_instance = new cPoliceStationManger();
		}
		return cPoliceStationManger::$_instance;
	}

	public function login($username,$password)
	{
		$account = getPoliceStation($username);
		if($account == NULL)
			throw new Exception("الحساب غير موجود");
		if($account->getPassword() == $password)
			return $account;
			throw new Exception("خطا في كلمة المرور او الحساب");
	}

	public function forgetpassword($username)
	{
		$account = getPhoneNumberByUserName($username);
		if($account == NULL)
			throw new Exception("Account Not Found");
		else
			return $account;
	}

	public function addpolicestation($ps)
	{
		if(!addPoliceStation($ps))
			throw new Exception("اسم المستخدم موجود");
	}

	public function editpolicestation($ps)
	{
		if(!editPoliceStation($ps))
			throw new Exception("اسم المستخدم موجود");
	}

	public function deletepolicestation($id)
	{
		if(!deletePoliceStation($id))
			throw new Exception("not deleted");
	}

	public function checkcause($nationalnumber)
	{
		$wanted = getWantedByNationalNumber($nationalnumber);
		if($wanted != NULL)
			throw new Exception("مطلوب لدي ".$wanted->getWho());
		else
			return getCauseByNationalNumber($nationalnumber);

	}

	
}
?>