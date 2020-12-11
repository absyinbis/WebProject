<?php 

require_once 'lib_db.php';



class cReportManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cReportManger::$_instance == NULL)
		{
			cReportManger::$_instance = new cReportManger();
		}
		return cReportManger::$_instance;
	}

	public function addreport($report)
	{
		return addReport($report);
	}

	public function deletereport($id)
	{
		if(!deleteReport($id))
			throw new Exception("not deleted");

	}

	public function addimg($id,$img)
	{
		return addImg($id,$img);

	}

	
}