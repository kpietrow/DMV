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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Simple Login Portal Example</title>
    <link rel="stylesheet" type="text/css" media="screen" href="styles/calm.css" />
    <script type="text/javascript" src="scripts/login.js"></script>
</head>
<body>
    <h1>Login Portal</h1>
<?php 
   if (isset($_POST['login_type']) && $_POST['login_type'] == 'an existing user') 
   { 
	<div>
		<label for="uname_input">Username:</label>
		<input id="uname_input" name="uname" type="text" required="required" placeholder="Enter your username"/>
		<br />
		<label for="pass_input">Password:</label>
		<input id="pass_input" name="passwd" type="password" required="required" placeholder="Enter your password"/>
	</div> 
	
	<input id="submit_login" type="submit" value="Submit" /> 	
	} 
	else 
	{ 
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
		<input id="submit_login" type="submit" value="Submit" /> 
	}
   
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
	<form method="post" action="login.php">
		<div>
			<label for="login_type">I am:</label>
			<select id="login_type" name="logintype">
				<option value="Register">a new user</option>
				<option value="Login" selected="selected">an existing user</option>
			</select> 
		
	</form>
</body>
</html>