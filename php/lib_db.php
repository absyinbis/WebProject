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
			$ps->setAccess($row["access"]);
			$ps->setState($row["state"]);
		}
	}
	else
	{
		$conn->close();
		return NULL;
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
	$sql = "INSERT INTO police_station (name,username,password,access,state) VALUES ('" 
				. $ps->getName() . "','"
				. $ps->getUserName() . "','" 
				. $ps->getPassword(). "' , '"
				. $ps->getAccess()."' , '"
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
				. $ps->getPassword(). "', access='"
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
/*
function getUsersByPoliceStation($id)
{
	$conn = createConnection();

	$sql = "select * from users where who ='".$id."' and access = 2";
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
		$users[] = $user;
		}
	}
	$conn->close();
	return $users;
}
*/
function getUsers()
{
	$conn = createConnection();

	$sql = "SELECT `user`.`id`, `user`.`name`, `user`.`username`, `user`.`password`, `user`.`phonenumber`, `police_station`.`name` who FROM `user` INNER JOIN `police_station` ON `user`.`ps_id` = `police_station`.`id` where user.state = 1";

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
	$sql = "INSERT INTO user (name,username,password,phonenumber,state,ps_id) VALUES ('" 
				. $user->getName() . "','"
				. $user->getUserName() . "','" 
				. $user->getPassword(). "' , '"
				. $user->getPhoneNumber()."' , '"
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
				. $user->getPhoneNumber()."' where id='" 
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







?>