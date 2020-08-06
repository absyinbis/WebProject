<?php 

require_once '../php/lib_db.php';


changePassword($_POST["id"],$_POST["access"],$_POST["password"]);

echo "done";

 ?>