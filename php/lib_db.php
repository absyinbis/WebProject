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
		$sql = "select * from user where username='".$username."' and state = 1 and access = 2 or access = 3";
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

function getWanted($start,$lenght)
{
	$conn = createConnection();

	$sql = "select * from wanted limit $start,$lenght ";
	$result = $conn->query($sql);
	$wanteds = array();
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
			$wanted->setWho($row["ps_id"]);
			$wanted->setState($row["state"]);
		$wanteds[] = $wanted;
		}
	}
	$conn->close();
	return $wanteds;
}

function getLenght()
{
	$conn = createConnection();
	$sql = "select * from wanted";
	$result = mysqli_query($conn,$sql);
	
	return $result;
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
	$sql = "SELECT `wanted`.*, `police_station`.`name` who
			FROM `wanted` 
			INNER JOIN `police_station` ON `wanted`.`ps_id` = `police_station`.`id` WHERE wanted.id = $id;";
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
			$wanted->setUser($row["user_id"]);
		}
	}
	$conn->close();
	return $wanted;
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







?>