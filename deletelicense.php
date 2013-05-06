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

$url = 'localhost';
$dbname = 'dmvDB';
$dblogin = 'root';
$dbpass = '';

$value11 = $_SESSION['username'];

$db = new PDO("mysql:host=$url;dbname=$dbname", "$dblogin", "$dbpass");
$statement = $db->prepare("select UserID from User where Username = :username");
$statement->execute(array(':username' => $value11));
$row = $statement->fetch();
$result1 = $row['UserID'];

$statement = $db->prepare("DELETE FROM License WHERE UserID = :userid");
$statement->execute(array(':userid' => $result1));

?>
<div id="group2">  
		<p>
		License deleted successfully.
		<a href="index.php" class="myButton">Return to Home page</a>  
		</p>
</div>
<?php
mysql_close(); 
?>
