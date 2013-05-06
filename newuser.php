<?php
   // process logout request if present in URL query string
   if (isset($_GET['logout']))
   {
      // destroy session (suppress error message here if session doesn't exist)
      // note: we must call session_start first so we have the session ID
      session_start();
      @session_destroy();
   }
?>

<!DOCTYPE html> 
<html> 


<!--Emilio-->

 
<head>
  
<link rel="stylesheet" href="sprites.css" type="text/css" media="screen, projection" />  



</style> 

<title>DMV</title> 

<link rel="shortcut icon" href="favicon.ico" type="x-icon"> 

<script type="text/javascript" src="_scripts/js/login.js"></script>  

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
		<p> 	
		
			<?php
   
			   if (isset($_GET['error']))
			   {
				  $errmsg = '';
				  switch ($_GET['error'])
				  {
				  case 1: $errmsg = 'Passwords entered do not match one another.'; break;
				  case 2: $errmsg = 'Username already exists in the database. Please choose a different username.'; break;
				  case 3: $errmsg = 'The username or password you entered is incorrect. Please try again.'; break;
				  case 4: $errmsg = 'Invalid login mode. Please reload the page and try again.'; break;
				  case 5: $errmsg = 'Unexpected error processing login. Please try again'; break;
				  default: $errmsg = 'An unknown error occurred. Please try again in a few minutes.'; break;
				  }
				  print '<p class="errmsg">' . $errmsg . '</p>';
			   } 
			?>	
		
		<form method="post" action="_scripts/php/login.php">
		<div>
			<label for="login_type" style="visibility:hidden;">I am:</label>
			<select id="login_type" name="logintype" style="visibility:hidden;">
				<option value="Register" selected="selected">a new user</option>
				<option value="Login">an existing user</option>
			</select>
		</div>
		<div class="shownew">
			<label for="em_input">Email:</label>
			<input id="em_input" name="email" type="text"  placeholder="Enter a valid email address"/>
		</div>
		<div>
			<label for="uname_input">Username:</label>
			<input id="uname_input" name="uname" type="text" required="required" placeholder="Enter your username"/>
			<br />
			<label for="pass_input">Password:</label>
			<input id="pass_input" name="passwd" type="password" required="required" placeholder="Enter your password"/>
		</div>
		<div class="shownew">
			<label for="pass2_input">Confirm:</label>
			<input id="pass2_input" name="passwd2" type="password" placeholder="Repeat your password"/>
		</div> 
		<input id="submit_login" type="submit" value="Register" />
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