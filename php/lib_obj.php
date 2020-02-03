<?php
 
class cAccount
{
	private $id = -1;
	private $name = "";
	private $username = "";
	private $password = "";
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

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getId(){ return $this->id; }

	public function getName(){ return $this->name; }
	
	public function getUserName(){ return $this->username; }

	public function getPassword(){ return $this->password; }

	public function getState(){ return $this->state; }
}

class cUser
{
	private $id = -1;
	private $name = "";
	private $username = "";
	private $password = "";
	private $phonenumber = -1;
	private $who = -1;

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

		public function setWho($who)
	{
		$this->who = $who;
	}

	public function getId(){ return $this->id; }

	public function getName(){ return $this->name; }

	public function getUserName(){ return $this->username; }

	public function getPassword(){ return $this->password; }

	public function getPhoneNumber(){ return $this->phonenumber; }

	public function getWho(){ return $this->who; }

}

 ?>
