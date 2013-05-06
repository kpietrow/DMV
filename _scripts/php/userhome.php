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
        <p>Welcome to your home page, <?php print $_SESSION['username'];?>! You have loaded this page <?php print $_SESSION['visits'];?> times since logging in.</p>
        <p><a href="loginform.php?logout">Log out</a></p>
    </div>

<!DOCTYPE html> 
<html> 

<!--Emilio-->

 
<head>

<meta charset="utf-8" />
<title>Home of <?php print $_SESSION['username'];?></title>
<link rel="stylesheet" href="\\sprites.css" type="text/css" media="screen, projection" />  



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
    <li id="home"><a href="index.html" class="navigation a">home</a></li>
    <li id="app"><a href="app.html" class="navigation a">app</a></li>
    <li id="about"><a href="about.html" class="navigation a">about</a></li> 
  </ul> 
 
 </div>  

 </nav>   
 
 
 
 <!--end menu--> 
	<div id="group2">  
		
		
        <p>Welcome to your home page, <?php print $_SESSION['username'];?>! You have loaded this page <?php print $_SESSION['visits'];?> times since logging in.</p>
        <p><a href="loginform.php?logout">Log out</a></p>
    
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