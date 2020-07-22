<?php

class cPoliceStation
{
	private $id = -1;
	private $name = "";
	private $username = "";
	private $password = "";
	private $phonenumber = -1;
	private $access = -1;
	private $state = -1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setUserName($username)
	{
		$this->username = $username;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setAccess($access)
	{
		$this->access = $access;
	}

	public function setPhoneNumber($phonenumber)
	{
		$this->phonenumber = $phonenumber;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getName(){ return $this->name; }

	public function getUserName(){ return $this->username; }

	public function getPassword(){ return $this->password; }

	public function getAccess(){ return $this->access; }

	public function getPhoneNumber(){ return $this->phonenumber; }

	public function getState(){ return $this->state; }
}

class cUser
{
	private $id = -1;
	private $name = "";
	private $username = "";
	private $password = "";
	private $phonenumber = -1;
	private $access = -1;
	private $state = -1;
	private $who = -1;
	private $PSName = "";

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setUserName($username)
	{
		$this->username = $username;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function setPhoneNumber($phonenumber)
	{
		$this->phonenumber = $phonenumber;
	}

	public function setAccess($access)
	{
		$this->access = $access;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function setWho($who)
	{
		$this->who = $who;
	}

	public function setPSName($PSName)
	{
		$this->PSName = $PSName;
	}


	public function getId(){ return $this->id; }

	public function getName(){ return $this->name; }

	public function getUserName(){ return $this->username; }

	public function getPassword(){ return $this->password; }

	public function getPhoneNumber(){ return $this->phonenumber; }

	public function getAccess(){ return $this->access; }

	public function getState(){ return $this->state; }

	public function getWho(){ return $this->who; }

	public function getPSName(){ return $this->PSName; }
}

class cWanted
{
	private $id = -1;
	private $name = "";
	private $img = "";
	private $national_number = -1;
	private $report_id = -1;
	private $date = -1;
	private $ps_id = -1;
	private $user = -1;
	private $state = -1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setImg($img)
	{
		$this->img = $img;
	}

	public function setNationalNumber($national_number)
	{
		$this->national_number = $national_number;
	}

	public function setReportId($report_id)
	{
		$this->report_id = $report_id;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setWho($ps_id)
	{
		$this->ps_id = $ps_id;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getName(){ return $this->name; }

	public function getImg(){ return $this->img; }

	public function getNationalNumber(){ return $this->national_number; }

	public function getReportId(){ return $this->report_id; }

	public function getDate(){ return $this->date; }

	public function getWho(){ return $this->ps_id; }

	public function getUser(){ return $this->user; }

	public function getState(){ return $this->state; }
}

class cReport
{
	private $id = -1;
	private $report_type = "";
	private $name_you = "";
	private $name_him = "";
	private $phonenumber = -1;
	private $image = "";
	private $date = -1;
	private $ps_id = -1;
	private $user = -1;
	private $state = -1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setNameYou($name_you)
	{
		$this->name_you = $name_you;
	}

	public function setNameHim($name_him)
	{
		$this->name_him = $name_him;
	}

	public function setReportType($report_type)
	{
		$this->report_type = $report_type;
	}

	public function setPhoneNumber($phonenumber)
	{
		$this->phonenumber = $phonenumber;
	}

	public function setImg($image)
	{
		$this->image = $image;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setWho($ps_id)
	{
		$this->ps_id = $ps_id;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getNameYou(){ return $this->name_you; }

	public function getNameHim(){ return $this->name_him; }

	public function getReportType(){ return $this->report_type; }

	public function getPhoneNumber(){ return $this->phonenumber; }

	public function getImg(){ return $this->image; }

	public function getDate(){ return $this->date; }

	public function getWho(){ return $this->ps_id; }

	public function getUser(){ return $this->user; }

	public function getState(){ return $this->state; }
}

class cCause
{
	private $id = -1;
	private $cause_id = -1;
	private $report_id = -1;
	private $national_number = -1;
	private $ps_id = -1;
	private $user_id = -1;
	private $date = -1;
	private $state = -1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setCauseId($cause_id)
	{
		$this->cause_id = $cause_id;
	}

	public function setReportId($report_id)
	{
		$this->report_id = $report_id;
	}

	public function setNationalNumber($national_number)
	{
		$this->national_number = $national_number;
	}

	public function setWho($ps_id)
	{
		$this->ps_id = $ps_id;
	}

	public function setUser($user_id)
	{
		$this->user_id = $user_id;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getCauseId(){ return $this->cause_id; }

	public function getReportId(){ return $this->report_id; }

	public function getNationalNumber(){ return $this->national_number; }

	public function getDate(){ return $this->date; }

	public function getWho(){ return $this->ps_id; }

	public function getUser(){ return $this->user_id; }

	public function getState(){ return $this->state; }
}

class cCarStolen
{
	private $id = -1;
	private $structure_number = -1;
	private $plate_number = -1;
	private $vehicle_type = "";
	private $model = -1;
	private $year = -1;
	private $color = "";
	private $img = "";
	private $description = "";
	private $phonenumber = -1;
	private $date = -1;
	private $ps_id = -1;
	private $user = -1;
	private $state = -1;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setStructureNumber($structure_number)
	{
		$this->structure_number = $structure_number;
	}

	public function setPlateNumber($plate_number)
	{
		$this->plate_number = $plate_number;
	}

	public function setVehicleType($vehicle_type)
	{
		$this->vehicle_type = $vehicle_type;
	}

	public function setModel($model)
	{
		$this->model = $model;
	}

	public function setYearCar($year)
	{
		$this->year = $year;
	}

	public function setColor($color)
	{
		$this->color = $color;
	}

	public function setImg($img)
	{
		$this->img = $img;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setPhoneNumber($phonenumber)
	{
		$this->phonenumber = $phonenumber;
	}

	public function setDate($date)
	{
		$this->date = $date;
	}

	public function setWho($ps_id)
	{
		$this->ps_id = $ps_id;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getStructureNumber(){ return $this->structure_number; }

	public function getPlateNumber(){ return $this->plate_number; }

	public function getVehicleType(){ return $this->vehicle_type; }

	public function getModel(){ return $this->model; }

	public function getYearCar(){ return $this->year; }

	public function getColor(){ return $this->color; }

	public function getImg(){ return $this->img; }

	public function getDescription(){ return $this->description; }

	public function getPhoneNumber(){ return $this->phonenumber; }

	public function getDate(){ return $this->date; }

	public function getWho(){ return $this->ps_id; }

	public function getUser(){ return $this->user; }

	public function getState(){ return $this->state; }

}

class cLogg
{
	private $id = -1;
	private $process = "";
	private $name = "";
	private $add_date = "";
	private $who = -1;


	public function setId($id)
	{
		$this->id = $id;
	}

	public function setProcess($process)
	{
		$this->process = $process;
	}

	public function setUser_Id($name)
	{
		$this->name = $name;
	}

	public function setAddDate($add_date)
	{
		$this->add_date = $add_date;
	}

	public function setPS_Id($who)
	{
		$this->who = $who;
	}


	public function getId(){ return $this->id; }

	public function getProcess(){ return $this->process; }

	public function getUser_Id(){ return $this->name; }

	public function getAddDate(){ return $this->add_date; }
	
	public function getPS_Id(){ return $this->who; }

}

class cPeople{

	private $name = "";
	private $m_name = "";
	private $id_number = -1;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setNationalNumber($id_number)
	{
		$this->id_number = $id_number;
	}

	public function setMotherName($m_name)
	{
		$this->m_name = $m_name;
	}

	public function getName(){ return $this->name; }

	public function getMotherName(){ return $this->m_name; }

	public function getNationalNumber(){ return $this->id_number; }

}

 ?>
