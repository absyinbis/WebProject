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
		if(!addWanted($wanted))
			throw new Exception("wanted no add");
	}

	
}



?>