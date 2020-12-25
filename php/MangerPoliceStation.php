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
		else
			deleteUsersByPoliceStation($id);
	}
	
}
?>