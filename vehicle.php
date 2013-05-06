<?php
    session_start();

    if (empty($_SESSION['username']))
    {
        // if no username is present, redirect back to login form
        header('Location: login.php');
    }
    else
    {
        if (empty($_SESSION['visits']))
        {
            $_SESSION['visits'] = 1;
        }
        else
        {
            $_SESSION['visits']++;
        }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Home of <?php print $_SESSION['username'];?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles/calm.css" />
</head>
<body>
    <div>
        <p>Welcome to the License application page, <?php print $_SESSION['username'];?>!</p>
        <p><a href="loginform.php?logout">Log out</a></p>
    </div>

<!DOCTYPE html> 
<html> 


<!--Kevin-->

 
<head>
 
<meta charset="utf-8" />
<title>Home of <?php print $_SESSION['username'];?></title>
<link rel="stylesheet" href="sprites.css" type="text/css" media="screen, projection" />  


</style> 

<title>DMV</title> 

<link rel="shortcut icon" href="favicon.ico" type="x-icon">  

</head> 

<body>


<div id="container">
   
<nav>  

<div id ="container2"> 

<div id="header_default"> 
	<div class="header"> 
		</div> 
	</div> 
	
	</div> 

<!--menu--> 
<hr/>
	
<div id="navigation">
  <ul>
    <li id="home"><a href="index.php" class="navigation a">home</a></li>
    <li id="app"><a href="app.php" class="navigation a">app</a></li>
    <li id="about"><a href="about.php" class="navigation a">about</a></li> 
  </ul> 
 
 </div>  

 </nav>   
 
 
 
 <!--end menu--> 
 <?php  
	if (empty($_SESSION['username'])) { 
		echo "Please login or register to submit an application for a license";
	}
	else { ?>
	<div id="group2">  
		<p> 
		<form action="_scripts/php/vehicleform.php" method="post"> 
		Vehicle Number:<input type="text" name="VNum"><br><br>
		Vehicle Configuration:<input type="text" name="VehicleConfig"><br><br> 
		Vehicle Year:<input type="text" name="VehicleYear"><br><br> 
		Vehicle Make:<input type="text" name="VehicleMake"><br><br>
		Vehicle Model:<input type="text" name="VehicleModel"><br><br>
		Vehicle License Plate:<input type="text" name="VehicleLicensePlate"><br><br> 
		Vehicle License Plate State:<input type="text" name="VehiclePlateState"><br><br> 
	<br><br> 
	<input type="submit" value="Submit"> 
	</form>
	</p> 
		
	</div> <?php } ?>
	
 
   
<br /> 
<br /> 
<br /> 
<br /> 
<br />
 
</div>

 <!--footer-->
   <footer>
   <div class="footer">  
   <div id="FooterTree"><p></p></div>  
   </div>
   </footer>
 <!--end footer-->

   

</body> 

</html>
	<?php
    }
?>