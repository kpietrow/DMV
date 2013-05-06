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

class app
	{
		private $dbconn;
		private $tablename;
		
		function __construct( $tablename, $dbname, $dblogin, $dbpass,
										$url = 'localhost' )
		{
         $this->dbconn = new PDO("mysql:host=$url;dbname=$dbname", "$dblogin", "$dbpass");
         $this->tablename = $tablename;
		}

	   /**
	    * Insert new user info into the table.
	    */
	   function addAccount($LNum, $LicenseClass, $LicenseIssued, $LicenseExpires, $LicenseType, $LicenseRestrictions)
	   {
	   
	   	// get UserID and DOB
	   	$sql = $db->prepare('SELECT UserID, UserDOB FROM ' . User . 'WHERE Username =' . $_SESSION['username']);
		$result = $statement->fetch();
	   
	   
	      // build INSERT query string
	      $sql = 'INSERT INTO ' . $this->tablename . ' (L#, LicenseClass, 
	      			LicenseIssued, LicenseExpires, LicenseType, UserID, 
	      			LicenseRestrictions, UserDOB) VALUES ("'
	               . $LNum . '", "' . $LicenseClass . '", "' . $LicenseIssued . '", "' $LicenseExpires '", "'
	               $LicenseType '", "' $result['UserID'] '", "' $LicenseRestrictions '", "'
	               $result['UserDOB'])';

	      // submit database query
	      $result = $this->dbconn->exec( $sql );
	   }
	}
?>