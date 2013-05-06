<?php 
session_start();
define('DB_NAME', 'dmvDB'); 
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

$value0 = $_POST['LNum'];
$value1 = $_POST['LicenseClass']; 
$value2 = $_POST['LicenseIssued']; 
$value3 = $_POST['LicenseExpires']; 
$value4 = $_POST['LicenseType'];
$value5 = $_POST['LicenseRestrictions'];
$value11 = $_SESSION['username'];

$url = 'localhost';
$dbname = 'dmvDB';
$dblogin = 'root';
$dbpass = '';

$db = new PDO("mysql:host=$url;dbname=$dbname", "$dblogin", "$dbpass");
$statement = $db->prepare("select UserID, UserDOB from User where Username = :username");
$statement->execute(array(':username' => $value11));
$row = $statement->fetch();

$result1 = $row['UserID'];
$result2 = $row['UserDOB'];


$sql = "INSERT INTO License (L, LicenseClass, LicenseIssued, 
	LicenseExpires, LicenseType, LicenseRestrictions, 
	UserID, UserDOB) VALUES ('$value0', '$value1', '$value2', '$value3', '$value4', 
	'$value5', '$result1', '$result2')"; 

if (!mysql_query($sql)) { 
	die('Error: ' . mysql_error()); 
}
?>
<div id="group2">  
		<p>
		<a href="../../index.php" class="myButton">Return to Home page</a>  
		</p>
</div>
<?php
mysql_close(); 
?>
