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
	$sql = "select * from police_stations where username='".$username."'";
	$result = $conn->query($sql);
	$account = new cAccount();
	if ($result->num_rows > 0) {
		if($row = $result->fetch_assoc()) {
			$account->setId($row["id"]);
			$account->setName($row["name"]);
			$account->setUserName($row["username"]);
			$account->setPassword($row["password"]);
			$account->setState($row["state"]);
		}
	}
	else
	{
		$conn->close();
		return NULL;
	}
	$conn->close();
	return $account;	
}

function getPoliceStations()
{
	$conn = createConnection();

	$sql = "select * from police_stations where state!=0";
	$result = $conn->query($sql);
	$accounts = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$account = new cAccount();
		$account->setId($row["id"]);
		$account->setName($row["name"]);
		$account->setUserName($row["username"]);
		$account->setPassword($row["password"]);
		$account->setState($row["state"]);
		$accounts[] = $account;
		}
	}
	$conn->close();
	return $accounts;
}

function addPoliceStation($account)
{
	$conn = createConnection();
	$sql = "INSERT INTO police_stations (name,username,password,state) VALUES ('" 
				. $account->getName() . "','"
				. $account->getUserName() . "','" 
				. $account->getPassword(). "', " 
				. $account->getState(). ")";
	$result = executeQuery($conn,$sql);
	return $result;
}

function editPoliceStation($account)
{
	$conn = createConnection();

	$sql = "UPDATE police_stations SET name='" 
				. $account->getName()." ', username='" 
				. $account->getUserName(). "', password='" 
				. $account->getPassword(). "', state=" 
				. $account->getState() . " where id=" 
				. $account->getId();"";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;

}

function deletePoliceStation($id)
{
	$conn = createConnection();

	$sql = "DELETE FROM police_stations WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;

}

function getUsersByPoliceStation($id)
{
	$conn = createConnection();

	$sql = "select * from users where police_station_id ='".$id."'";
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
		$user->setWho($row["police_station_id"]);
		$users[] = $user;
		}
	}
	$conn->close();
	return $users;
}

function getUsers()
{
	$conn = createConnection();

	$sql = "select * from users";
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
		$user->setWho($row["police_station_id"]);
		$users[] = $user;
		}
	}
	$conn->close();
	return $users;
}
















?>