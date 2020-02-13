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
	$sql = "select * from users where username='".$username."' and state = 1 and (access = 0 or access = 1)";
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
			$user->setWho($row["who"]);
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

function getPoliceStations()
{
	$conn = createConnection();

	$sql = "select * from users where access = 1 and State = 1";
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
	$sql = "INSERT INTO users (name,username,password,phonenumber,access,state,who) VALUES ('" 
				. $user->getName() . "','"
				. $user->getUserName() . "','" 
				. $user->getPassword(). "', '" 
				. $user->getPhoneNumber(). "' , '"
				. $user->getAccess()."' , '"
				. $user->getState() ."' , '"
				. $user->getWho() ."')";

	$result = executeQuery($conn,$sql);
	return $result;
}

function editUser($user)
{
	$conn = createConnection();

	$sql = "UPDATE users SET name='" 
				. $user->getName()."', username='" 
				. $user->getUserName(). "', password='"
				. $user->getPassword(). "', phonenumber ='"
				. $user->getPhoneNumber() ."' where id='" 
				. $user->getId() ."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;

}

function deleteUser($id)
{
	$conn = createConnection();

	$sql = "UPDATE users SET state=0 WHERE id = '".$id."' ";
	$result = executeQuery($conn, $sql);
	$conn->close();
	return $result;

}

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

function getUsers()
{
	$conn = createConnection();

	$sql = "SELECT
    e.id, e.name , e.username , e.password , e.phonenumber , m.name who
	FROM
    users e
	INNER JOIN users m ON m.id = e.who
	WHERE e.access = 2 AND e.state = 1";

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

function Logg($process,$name,$date,$who)
{
	$conn = createConnection();
	$sql = "INSERT INTO log (process,name,add_date,who) 
	VALUES 
	('".$process."','".$name."','".$date."','".$who."')";

	$conn->query($sql);
}

function getAllLogg()
{

	$conn = createConnection();
	$sql = "select * from log";
	$result = $conn->query($sql);
	$loggs = array();
	if ($result->num_rows > 0) { 
		// output data of each row
		while($row = $result->fetch_assoc()) {
		$logg = new cLogg();
		$logg->setId($row["id"]);
		$logg->setProcess($row["process"]);
		$logg->setName($row["name"]);
		$logg->setAddDate($row["add_date"]);
		$logg->setWho($row["who"]);
		$loggs[] = $logg;
		}
	}
	$conn->close();
	return $loggs;
}



?>