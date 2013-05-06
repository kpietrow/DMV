<?php 

define('DB_NAME', 'User'); 
define('DB_USER', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_HOST', 'localhost'); 

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); 

if (!$link) { 
	die('Could not connect: ' . mysql_error()); 
	} 
	
$db_selected = mysql_select_db(DB_NAME, $link); 

if (!$db_selected) { 
	die('Can\'t use ' . DB_NAME . ': ' . mysql_error()); 
	} 
	
echo 'Connected succesfully'; 

$value1 = $_POST['UserFirstName']; 
$value2 = $_POST['UserMiddleName']; 
$value3 = $_POST['UserLastName']; 
$value4 = $_POST['UserAddress']; 
$value5 = $_POST['UserCity']; 
$value6 = $_POST['UserZip']; 
$value7 = $_POST['UserDOB']; 
$value8 = $_POST['UserSex']; 
$value9 = $_POST['UserEyes']; 
$value10 = $_POST['UserHeight']; 

$sql = "INSERT INTO User (UserID, UserFirstName, UserMiddleName, 
UserLastname, UserAddress, UserCity, UserZip, UserDOB, UserSex, UserEyes 
UserHeight) VALUES ('', '$value1', '$value2', '$value3', '$value4', 
'$value5', '$value6', '$value7', '$value8', '$value9', '$value10')"; 

if (!mysql_query($sql)) { 
	die('Error: ' . mysql_error()); 
}

mysql_close(); 
?>
