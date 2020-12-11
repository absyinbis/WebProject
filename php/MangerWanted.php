<?php 

require_once 'lib_db.php';



class cWantedManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cWantedManger::$_instance == NULL)
		{
			cWantedManger::$_instance = new cWantedManger();
		}
		return cWantedManger::$_instance;
	}

	public function addwanted($wanted)
	{
		$report = getDetailsReport($wanted->getReportId());

		if($report->getState() == 0)
			throw new Exception("المحظر مغلق");
		else
		if(!addWanted($wanted))
			throw new Exception("يوجد خطا في الرقم الوطني او المحظر");
	}

	public function deletewanted($id)
	{
		if(!deleteWanted($id))
			throw new Exception("not deleted");

	}

	
}



?>