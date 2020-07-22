<?php 

require_once 'lib_db.php';



class cCarStolenManger
{
	private static $_instance = NULL;

	private function __construct()
	{
		
	}
	
	public static function getInstance()
	{
		if(cCarStolenManger::$_instance == NULL)
		{
			cCarStolenManger::$_instance = new cCarStolenManger();
		}
		return cCarStolenManger::$_instance;
	}

	public function addcarstolen($car)
	{
		if(!addCar($car))
			throw new Exception("wanted no add");
	}

	public function deletecarstolen($id)
	{
		if(!deleteCarStolen($id))
			throw new Exception("not deleted");

	}

	
}