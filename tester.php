<?php
/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'root';

$dbname = 'dmvDB';



try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';

    /*** INSERT data ***/
    $count = $dbh->exec("INSERT INTO User(SSN, UserFirstName, 
    UserLastName, UserAddress, UserCity, UserZip, UserDOB, 
    UserSex, UserEyes, UserHeight, UserID, UserState) 
    VALUES ('838383838', 'hi', 'yo', 'best', '12345', 
    '2004-06-07', 'GN', '6-00', NULL, 'NY')");

    /*** echo the number of affected rows ***/
    echo $count;

    /*** close the database connection ***/
    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>