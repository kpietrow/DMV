<?php
    session_start();

    if (empty($_SESSION['username']))
    {
        // if no username is present, redirect back to login form
        header('Location: loginpage.php');
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
        <p>Welcome to the application page, <?php print $_SESSION['username'];?>!</p>
        <p><a href="loginform.php?logout">Log out</a></p>
    </div>

<!DOCTYPE html> 
<html> 


<!--Emilio-->

 
<head>
  
<meta charset="utf-8" />
<title>Applications page</title>
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
	<div id="group2">  
		<p> 
		<form action="_scripts/php/appsubmit.php" method="post"> 
		SSN:<input type="text" name="SSN"><br><br>
		First Name:<input type="text" name="UserFirstName"><br><br> 
		Middle Name:<input type="text" name="UserMiddleName"><br><br> 
		Last Name:<input type="text" name="UserLastName"><br><br> 
		Address:<input type="text" name="UserAddress"><br><br> 
		City:<input type="text" name="UserCity"><br><br>
		State:<input type="text" name="UserState"><br><br> 
		Zip Code:<input type="text" name="UserZip"><br><br> 
		Date of birth (yyyy-mm-dd):<input type="text" name="UserDOB"><br><br> 
		Sex:<input type="radio" name="UserSex" value="male">M 
			<input type="radio" name="UserSex" value="female">F<br><br>
		Eye Color:<input type="radio" name="UserEyes" value="BR">BR  
			<input type="radio" name="UserEyes" value="BL">BL 
			<input type="radio" name="UserEyes" value="HZ">HZ 
			<input type="radio" name="UserEyes" value="GR">GR 
			<input type="radio" name="UserEyes" value="BLK">BLK <br><br>
		Height:<select name="UserHeight"> 
		<option value="4-00">4-00</option>  
		<option value="4-01">4-01</option> 
		<option value="4-02">4-02</option> 
		<option value="4-03">4-03</option> 
		<option value="4-04">4-04</option> 
		<option value="4-05">4-05</option> 
		<option value="4-06">4-06</option>  
		<option value="4-07">4-07</option> 
		<option value="4-08">4-08</option> 
		<option value="4-09">4-09</option> 
		<option value="4-10">4-10</option> 
		<option value="4-11">4-11</option> 
		<option value="5-00">5-00</option> 
		<option value="5-01">5-01</option> 
		<option value="5-02">5-02</option> 
		<option value="5-03">5-03</option> 
		<option value="5-04">5-04</option> 
		<option value="5-05">5-05</option> 
		<option value="5-06">5-06</option> 
		<option value="5-07">5-07</option> 
		<option value="5-08">5-08</option> 
		<option value="5-09">5-09</option> 
		<option value="5-10">5-10</option> 
		<option value="5-11">5-11</option> 
		<option value="6-00">6-00</option>  
		<option value="6-01">6-01</option> 
		<option value="6-02">6-02</option> 
		<option value="6-03">6-03</option> 
		<option value="6-04">6-04</option> 
		<option value="6-05">6-05</option> 
		<option value="6-06">6-06</option> 
		<option value="6-07">6-07</option> 
		<option value="6-08">6-08</option> 
		<option value="6-09">6-09</option> 
		<option value="6-10">6-10</option> 
		<option value="6-11">6-11</option> 		
		<option value="7-00">7-00</option> 
	</select> 
	<br><br> 
	<input type="submit" value="Submit"> 
	</form>
	</p> 
		
	</div> 
	
 
   
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