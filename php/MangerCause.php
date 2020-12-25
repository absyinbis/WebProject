<?php 

require_once 'lib_db.php';



class cCauseManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cCauseManger::$_instance == NULL)
		{
			cCauseManger::$_instance = new cCauseManger();
		}
		return cCauseManger::$_instance;
	}

	
	public function addcause($cause)
	{
		if(!addCause($cause))
			throw new Exception("يوجد خطا في رقم المحظر او رقم الوطني");
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