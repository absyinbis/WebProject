<?php  

require_once  'lib_obj.php';

function createConnection()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "libya";
	
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return $conn;
}

function executeQuery($conn, $query)
{

	if ($conn->query($query) === TRUE) {
		return TRUE;
	} else {
		echo "QUERY ERROR: " . $conn->error;
		return FALSE;
	}
	
}

function getPoliceStation($username)
{
	
	$conn = createConnection();
	$sql = "select * from police_station where username='".$username."' and state = 1";
	$result = $conn->query($sql);
	$ps = new cPoliceStation();
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()) {
			$ps->setId($row["id"]);
			$ps->setName($row["name"]);
			$ps->setUserName($row["username"]);
			$ps->setPassword($row["password"]);
			$ps->setPhoneNumber($row["phonenumber"]);
			$ps->setAccess($row["access"]);
			$ps->setState($row["state"]);
		}
	}
	else
	{
		$sql = "SELECT user.*, police_station.name PSName FROM user INNER JOIN police_station ON user.ps_id= police_station.id 
				where user.username='".$username."' and user.state = 1 and (user.access = 2 or 3)";
		$result = $conn->query($sql);
		$ps = new cUser();
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()) {
					$ps->setId($row["id"]);
					$ps->setName($row["name"]);
					$ps->setUserName($row["username"]);
					$ps->setPassword($row["password"]);
					$ps->setPhoneNumber($row["phonenumber"]);
					$ps->setAccess($row["access"]);
					$ps->setState($row["state"]);
					$ps->setWho($row["ps_id"]);
					$ps->setPSName($row["PSName"]);

				}
			}
			else
			{
			$conn->close();
			return NULL;
			}
	}
	$conn->close();
	return $ps;	
}

function getPoliceStations()
{
	$conn = createConnection();

	$sql = "select * from police_station where State = 1";
	$result = $conn->query($sql);
	$pss = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$ps = new cPoliceStation();
			$ps->setId($row["id"]);
			$ps->setName($row["name"]);
			$ps->setUserName($row["username"]);
			$ps->setPassword($row["password"]);
			$ps->setPhoneNumber($row["phonenumber"]);
			$ps->setAccess($row["access"]);
		$pss[] = $ps;
		}
	}
	$conn->close();
	return $pss;
}

function addPoliceStation($ps)
{
	$conn = createConnection();
	$sql = "INSERT INTO police_station (name,username,password,phonenumber,access,state) VALUES ('" 
				. $ps->getName() . "','"
				. $ps->getUserName() . "','" 
				. $ps->getPassword(). "' , '"
				. $ps->getPhoneNumber()."' , '"
				. $ps->getAccess()."', '"
				. $ps->getState() ."')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function editPoliceStation($ps)
{
	$conn = createConnection();

	$sql = "UPDATE police_station SET name='" 
				. $ps->getName()."', username='" 
				. $ps->getUserName(). "', password='"
				. $ps->getPassword(). "', phonenumber='"
				. $ps->getPhoneNumber()."' ,access='"
				. $ps->getAccess(). "' where id='" 
				. $ps->getId() ."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;

}

function deletePoliceStation($id)
{
	$conn = createConnection();

	$sql = "UPDATE police_station SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function deleteReport($id)
{
	$conn = createConnection();

	$sql = "UPDATE report SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function deleteCarStolen($id)
{
	$conn = createConnection();

	$sql = "UPDATE car_stolen SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function deleteWanted($id)
{
	$conn = createConnection();

	$sql = "UPDATE wanted SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function getUsersByPoliceStation($id)
{
	$conn = createConnection();

	$sql = "select * from user where ps_id ='".$id."' and state = 1";
	$result = $conn->query($sql);
	$users = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$user = new cUser();
		$user->setId($row["id"]);
		$user->setName($row["name"]);
		$user->setUserName($row["username"]);
		$user->setPassword($row["password"]);
		$user->setPhoneNumber($row["phonenumber"]);
		$user->setAccess($row["access"]);
		$users[] = $user;
		}
	}
	$conn->close();
	return $users;
}

function getUsers()
{
	$conn = createConnection();

	$sql = "SELECT `user`.*, `police_station`.`name` who FROM `user` INNER JOIN `police_station` ON `user`.`ps_id` = `police_station`.`id` where user.state = 1";

	$result = $conn->query($sql);
	$users = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$user = new cUser();
		$user->setId($row["id"]);
		$user->setName($row["name"]);
		$user->setUserName($row["username"]);
		$user->setPassword($row["password"]);
		$user->setPhoneNumber($row["phonenumber"]);
		$user->setAccess($row["access"]);
		$user->setWho($row["who"]);
		$users[] = $user;
		}
	}
	$conn->close();
	return $users;
}

function getUserByUserName($username)
{
	$conn = createConnection();
	$sql = "SELECT * From user WHERE state = 1 AND username = '".$username."'";
	$result = $conn->query($sql);

	$user = new cUser();
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()) {
			$user->setId($row["id"]);
			$user->setName($row["name"]);
			$user->setUserName($row["username"]);
			$user->setPassword($row["password"]);
			$user->setPhoneNumber($row["phonenumber"]);
			$user->setAccess($row["access"]);
			$user->setState($row["state"]);
			$user->setWho($row["ps_id"]);
		}
	}
	else
	{
	$conn->close();
	return NULL;
	}
	$conn->close();
	return $user;
}

function addUser($user)
{
	$conn = createConnection();
	$sql = "INSERT INTO user (name,username,password,phonenumber,access,state,ps_id) VALUES ('" 
				. $user->getName() . "','"
				. $user->getUserName() . "','" 
				. $user->getPassword(). "' , '"
				. $user->getPhoneNumber()."' , '"
				. $user->getAccess(). "' ,'"
				. $user->getState() ."' , '"
				. $user->getWho() . "')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function editUser($user)
{
	$conn = createConnection();

	$sql = "UPDATE user SET name='" 
				. $user->getName()."', username='" 
				. $user->getUserName(). "', password='"
				. $user->getPassword(). "', phonenumber='"
				. $user->getPhoneNumber()."' , access='"
				. $user->getAccess()."' where id='" 
				. $user->getId() ."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function deleteUser($id)
{
	$conn = createConnection();

	$sql = "UPDATE user SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function getWanted()
{
	$conn = createConnection();

	$sql = "select * from wanted where state= 1";
	$result = $conn->query($sql);
	$wanteds = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$wanted = new cWanted();
			$wanted->setId($row["id"]);
			$wanted->setName($row["name"]);
			$wanted->setNationalNumber($row["national_number"]);
			$wanted->setReportId($row["report_id"]);
			$wanted->setDate($row["date"]);
			$wanted->setWho($row["ps_id"]);
			$wanted->setState($row["state"]);
		$wanteds[] = $wanted;
		}
	}
	$conn->close();
	return $wanteds;
}

function addWanted($wanted)
{
	$conn = createConnection();
	$sql = "INSERT INTO wanted (name,image,national_number,report_id,date,ps_id,user_id,state) VALUES ('" 
				. $wanted->getName() . "','"
				. $wanted->getImg() . "','" 
				. $wanted->getNationalNumber(). "' , '"
				. $wanted->getReportId() ."' , '"
				. $wanted->getDate() . "' , '"
				. $wanted->getWho() . "' , '"
				. $wanted->getUser() . "' , '"
				. $wanted->getState() . "')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function getDetailsWanted($id)
{
	$conn = createConnection();
	$sql = "SELECT `wanted`.*, `police_station`.`name` who, `user`.`name` user
            FROM `wanted` 
	        INNER JOIN `police_station` ON `wanted`.`ps_id` = `police_station`.`id` 
			INNER JOIN `user` ON `user`.`ps_id` = `police_station`.`id` 
			WHERE wanted.id = $id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$wanted = new cWanted();
			$wanted->setId($row["id"]);
			$wanted->setName($row["name"]);
			$wanted->setImg($row["image"]);
			$wanted->setNationalNumber($row["national_number"]);
			$wanted->setReportId($row["report_id"]);
			$wanted->setDate($row["date"]);
			$wanted->setWho($row["who"]);
			$wanted->setUser($row["user"]);
		}
	}
	else
	{
		$conn->close();
		return NULL;
	}
	$conn->close();
	return $wanted;
}

function getDetailsReport($id)
{
	$conn = createConnection();
	$sql = "SELECT `report`.*, `user`.`name` who
			FROM `report` 
			INNER JOIN `user` ON `report`.`user_id` = `user`.`id` where report.id = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$report = new cReport();
			$report->setId($row["id"]);
			$report->setNameYou($row["name_you"]);
			$report->setNameHim($row["name_him"]);
			$report->setReportType($row["report_type"]);
			$report->setDate($row["date"]);
			$report->setPhoneNumber($row["phonenumber"]);
			$report->setUser($row["who"]);
			$report->setState($row["state"]);
		}
	}
	else
	{
		$conn->close();
		return NULL;
	}
	$conn->close();
	return $report;
}

function addCar($car)
{
	$conn = createConnection();
	$sql = "INSERT INTO car_stolen 
	(structure_number,plate_number,vehicle_type,model,year_car,color,description,phonenumber,date_add,ps_id,user_id,state) VALUES ('" 
				. $car->getStructureNumber() . "','"
				. $car->getPlateNumber() . "','" 
				. $car->getVehicleType(). "' , '"
				. $car->getModel() ."' , '"
				. $car->getYearCar() . "' , '"
				. $car->getColor() . "' , '"
				. $car->getDescription() . "', '"
				. $car->getPhoneNumber() . "' , '"
				. $car->getDate() . "' , '"
				. $car->getWho() . "' , '"
				. $car->getUser() . "' , '"
				. $car->getState() . "')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function getCarStolen()
{
	$conn = createConnection();

	$sql = "select * from car_stolen where state=1";
	$result = $conn->query($sql);
	$cars = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$car = new cCarStolen();
			$car->setId($row["id"]);
			$car->setStructureNumber($row["structure_number"]);
			$car->setPlateNumber($row["plate_number"]);
			$car->setVehicleType($row["vehicle_type"]);
			$car->setModel($row["model"]);
			$car->setYearCar($row["year_car"]);
			$car->setDate($row["date_add"]);
		$cars[] = $car;
		}
	}
	$conn->close();
	return $cars;
}


function getDetailsCar($id)
{
	$conn = createConnection();
	$sql = "SELECT `car_stolen`.*, `user`.`name` user, `police_station`.`name` who
			FROM `car_stolen` 
			INNER JOIN `user` ON `car_stolen`.`user_id` = `user`.`id`
			INNER JOIN `police_station` ON `car_stolen`.`ps_id` = `police_station`.`id` WHERE car_stolen.id = $id;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$car = new cCarStolen();
			$car->setId($row["id"]);
			$car->setStructureNumber($row["structure_number"]);
			$car->setPlateNumber($row["plate_number"]);
			$car->setVehicleType($row["vehicle_type"]);
			$car->setModel($row["model"]);
			$car->setYearCar($row["year_car"]);
			$car->setColor($row["color"]);
			$car->setDescription($row["description"]);
			$car->setPhoneNumber($row["phonenumber"]);
			$car->setDate($row["date_add"]);
			$car->setWho($row["who"]);
			$car->setUser($row["user"]);
			$car->setState($row["state"]);
		}
	}
	$conn->close();
	return $car;
}

function addReport($report)
{
	$conn = createConnection();
	$sql = "INSERT INTO report 
	(name_you,name_him,report_type,phonenumber,image,date,ps_id,user_id,state) VALUES ('" 
				. $report->getNameYou() . "','"
				. $report->getNameHim() . "','" 
				. $report->getReportType(). "' , '"
				. $report->getPhoneNumber() ."' , '"
				. $report->getImg() . "' , '"
				. $report->getDate() . "' , '"
				. $report->getWho() . "' , '"
				. $report->getUser() . "' , '"
				. $report->getState() . "')";

	executeQuery($conn,$sql);
	$last_id = mysqli_insert_id($conn);
	return $last_id;
}

function addImg($id,$img)
{
	$conn = createConnection();
	$sql = "INSERT INTO img (id,img) VALUES ('".$id."','".$img."')";
	executeQuery($conn,$sql);
}

function getImg($id)
{
	$conn = createConnection();
	$sql = "SELECT * FROM img WHERE id = '". $id ."'";
	$result = $conn->query($sql);
	return $result;
}

function getReports($id)
{
	$conn = createConnection();

	$sql = "select * from report where ps_id = '". $id ."' and state = 1";
	$result = $conn->query($sql);
	$reports = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$report = new cReport();
			$report->setId($row["id"]);
			$report->setNameYou($row["name_you"]);
			$report->setReportType($row["report_type"]);
			$report->setDate($row["date"]);
		$reports[] = $report;
		}
	}
	$conn->close();
	return $reports;
}

function addLogg($logg)
{
	$conn = createConnection();
	$sql = "INSERT INTO logg (process,user_id,date,ps_id) VALUES ('" 
				. $logg->getProcess() . "','" 
				. $logg->getUser_Id(). "' , '"
				. $logg->getAddDate() ."' , '"
				. $logg->getPS_Id() . "')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function getAllLogg($ps_id = null)
{
	$conn = createConnection();

	if(is_null($ps_id))
		$sql = "SELECT `logg`.`id`, `logg`.`process`, `logg`.`date`, `user`.`name` user_name, `police_station`.`name` ps_name
			FROM `logg` 
			INNER JOIN `user` ON `logg`.`user_id` = `user`.`id`
			INNER JOIN `police_station` ON `logg`.`ps_id` = `police_station`.`id`";
	else
		$sql = "SELECT `logg`.`id`, `logg`.`process`, `logg`.`date`, `user`.`name` user_name, `police_station`.`name` ps_name
			FROM `logg` 
			INNER JOIN `user` ON `logg`.`user_id` = `user`.`id`
			INNER JOIN `police_station` ON `logg`.`ps_id` = `police_station`.`id` WHERE police_station.id = $ps_id";

	$result = $conn->query($sql);
	$loggs = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$logg = new cLogg();
		$logg->setId($row["id"]);
		$logg->setProcess($row["process"]);
		$logg->setUser_Id($row["user_name"]);
		$logg->setAddDate($row["date"]);
		$logg->setPS_Id($row["ps_name"]);
		$loggs[] = $logg;
		}
	}
	$conn->close();
	return $loggs;
}

function getPhoneNumberByUserName($username)
{
	$conn = createConnection();
	$sql = "select * from police_station where username='".$username."'";
	$result = $conn->query($sql);
	$ps = new cPoliceStation();
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()) {
			$ps->setId($row["id"]);
			$ps->setAccess($row["access"]);
			$ps->setPhoneNumber($row["phonenumber"]);
		}
	}
	else
	{
		$sql = "select * from user where username='".$username."'";
		$result = $conn->query($sql);
		$ps = new cUser();
			if ($result->num_rows > 0) {
				if($row = $result->fetch_assoc()) {
					$ps->setId($row["id"]);
					$ps->setAccess($row["access"]);
					$ps->setPhoneNumber($row["phonenumber"]);
				}
			}
			else
			{
			$conn->close();
			return NULL;
			}
	}
	$conn->close();
	return $ps;	
}

function changePassword($id,$access,$password)
{
	$conn = createConnection();
	if ($access == 0 || $access == 1) 
	{
		$sql = "UPDATE police_station SET password='".$password."' WHERE id = '".$id."' ";
	}
	else
	{
		$sql = "UPDATE user SET password='".$password."' WHERE id = '".$id."' ";
	}
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function changePhoneNumber($id,$access,$phonenumber)
{
	$conn = createConnection();
	if ($access == 0 || $access == 1) 
	{
		$sql = "UPDATE police_station SET phonenumber='".$phonenumber."' WHERE id = '".$id."' ";
	}
	else
	{
		$sql = "UPDATE user SET phonenumber='".$phonenumber."' WHERE id = '".$id."' ";
	}
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}

function changeUserName($id,$access,$username)
{
	$conn = createConnection();
	if ($access == 0 || $access == 1) 
	{
		$sql = "UPDATE police_station SET username='".$username."' WHERE id = '".$id."' ";
	}
	else
	{
		$sql = "UPDATE user SET username='".$username."' WHERE id = '".$id."' ";
	}
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;
}



function getWantedByNationalNumber($nationalnumber)
{
	$conn = createConnection();
	$sql = "SELECT `police_station`.`name` who
			FROM `wanted` 
			INNER JOIN `police_station` ON `wanted`.`ps_id` = `police_station`.`id` WHERE wanted.national_number = $nationalnumber and `wanted`.`state` = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		// output data of each row
		$wanted = new cWanted();
		while($row = $result->fetch_assoc()) {
			$wanted->setWho($row["who"]);
		}
	}
	else
	{
		$conn->close();
		return NULL;
	}
	$conn->close();
	return $wanted;
}

function getCauseByNationalNumber($nationalnumber)
{
	$conn = createConnection();
	$sql = "SELECT *
			FROM cause 
			WHERE national_number = $nationalnumber;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) { 
		$conn->close();
		return true;
	}
	else
	{
		$conn->close();
		return false;
	}

}

function Search($sql,$forwho,$start=NULL,$lenght=NULL)
{
	$conn = createConnection();
	$result = $conn->query($sql);
	$searchs = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		switch ($forwho) {
			case 'ps':
				while($row = $result->fetch_assoc()) {
					$ps = new cPoliceStation();
					$ps->setId($row["id"]);
					$ps->setName($row["name"]);
					$ps->setUserName($row["username"]);
					$ps->setPassword($row["password"]);
					$ps->setPhoneNumber($row["phonenumber"]);
					$ps->setAccess($row["access"]);
					$searchs[] = $ps;
				}
				break;

			case 'user':
				while($row = $result->fetch_assoc()) 
				{
					$user = new cUser();
					$user->setId($row["id"]);
					$user->setName($row["name"]);
					$user->setUserName($row["username"]);
					$user->setPassword($row["password"]);
					$user->setPhoneNumber($row["phonenumber"]);
					$user->setAccess($row["access"]);
					$user->setWho($row["who"]);
					$searchs[] = $user;
				}
				break;

			case 'wanted':
				while($row = $result->fetch_assoc()) 
				{
					$wanted = new cWanted();
					$wanted->setId($row["id"]);
					$wanted->setName($row["name"]);
					$wanted->setImg($row["image"]);
					$wanted->setNationalNumber($row["national_number"]);
					$wanted->setReportId($row["report_id"]);
					$wanted->setDate($row["date"]);
					$wanted->setWho($row["ps_id"]);
					$wanted->setState($row["state"]);
					$searchs[] = $wanted;
				}
				break;

			case 'carstolen':
				while($row = $result->fetch_assoc()) 
				{
					$car = new cCarStolen();
					$car->setId($row["id"]);
					$car->setStructureNumber($row["structure_number"]);
					$car->setPlateNumber($row["plate_number"]);
					$car->setVehicleType($row["vehicle_type"]);
					$car->setModel($row["model"]);
					$car->setYearCar($row["year_car"]);
					$searchs[] = $car;
				}
				break;

			case 'report':
				while($row = $result->fetch_assoc()) 
				{
					$report = new cReport();
					$report->setId($row["id"]);
					$report->setNameYou($row["name_you"]);
					$report->setReportType($row["report_type"]);
					$report->setDate($row["date"]);
					$searchs[] = $report;
				}
				break;	
		}
	}
	$conn->close();
	return $searchs;
}

function checkCarStolen($number)
{
	$conn = createConnection();

	$sql = "select * from car_stolen where structure_number like ".$number." or plate_number like ".$number."";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
			$car = new cCarStolen();
			$car->setStructureNumber($row["structure_number"]);
			$car->setPlateNumber($row["plate_number"]);
			$car->setVehicleType($row["vehicle_type"]);
			$car->setModel($row["model"]);
			$car->setYearCar($row["year_car"]);
		}
	$conn->close();
	return $car;
	}
	else
	{
	$conn->close();
	return "empty";
	}


}


function checkWanted($id_number)
{
	$conn = createConnection();
	$sql = "SELECT * FROM `wanted` WHERE `wanted`.`national_number` = $id_number and wanted.state = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()){
			$people = new cPeople();
			$people->setName($row["name"]);
			$people->setMotherName($row["m_name"]);
			$people->setNationalNumber($row["id_number"]);
		} 
		$conn->close();
		return $people;
	}
	else
	{
		$conn->close();
		return "empty";
	}

}

function getIdNumber($number)
{
	$conn = createConnection();
	$sql = "SELECT *
			FROM cars 
			where structure_number like ".$number." or plate_number like ".$number."";
	$result = $conn->query($sql);

		if($row = $result->fetch_assoc()) {
			$conn->close();
			return $row["id_number"];
		}
}


function getPeopleByNationalNumber($id)
{
	$conn = createConnection();
	$sql = "SELECT * FROM people where id_number=$id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()){
			$people = new cPeople();
			$people->setName($row["name"]);
			$people->setMotherName($row["m_name"]);
			$people->setNationalNumber($row["id_number"]);
			return $people;
		}
	}
	else
		return "empty";
}

function addCause($cause)
{
	$conn = createConnection();
	$sql = "INSERT INTO cause (cause_id,report_id,national_number,date,user_id,ps_id,state) VALUES ('" 
				. $cause->getCauseId() . "','"
				. $cause->getReportId() . "','" 
				. $cause->getNationalNumber(). "' , '"
				. $cause->getDate()."' , '"
				. $cause->getUser(). "' ,'"
				. $cause->getWho() ."' , '"
				. $cause->getState() . "')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function getCar($number)
{
	$conn = createConnection();
	$sql = "SELECT `cars`.* FROM `cars` where `cars`.structure_number like ".$number." or `cars`.plate_number like ".$number."";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$car = new cCarStolen();
			$car->setStructureNumber($row["structure_number"]);
			$car->setPlateNumber($row["plate_number"]);
			$car->setVehicleType($row["vehicle_type"]);
			$car->setModel($row["model"]);
			$car->setYearCar($row["year_car"]);
		}
	$conn->close();
	return $car;
	}
	else{
	$conn->close();
	return NULL;
	}


}

function getStatistics($startDate = null , $endDate = null, $ps_id){
	$conn = createConnection();
	$sql = "SELECT COUNT(id) police, (SELECT COUNT(id) from `user`) user,(SELECT COUNT(id) from `wanted`) wanted,(SELECT COUNT(id) from `report`) report,(SELECT COUNT(id) from `car_stolen`) carstolen,(SELECT COUNT(id) from `cause`) cause
		FROM `police_station`";
	$result = $conn->query($sql);
	return $result->fetch_assoc();
}

?>