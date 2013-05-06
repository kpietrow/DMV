<?php
   // check whether the client submitted a POST request
   // and, if so, assume that the login form was submitted
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      // import my function library (provides LoginManager class)
      require_once('lib_login.php');

      // Connect to MYSQL server
      $login = new LoginManager('Login', 'dmvDB', 'root', '');

      // import all POST keys as variables (note: this may not be the safest approach!)
      extract( $_POST );

      // 'usertype' comes from the POST array (that is, the form submission)
      switch ($logintype)
      {
      case 'Register':
         if ($login->confirmPassword($passwd, $passwd2))
         {
            if ($login->isUnameAvailable($uname))
            {
               $login->addAccount($uname, $passwd, $email);

               // send a confirmation email (note: our VMs don't actually send this, no SMTP setup)
               $subject = "Your New Account";
               $body = 'Thank you for registering! Your new login name is ' . $uname;
               mail($email, $subject, $body);

               // store user name as session data
               session_start();
               $_SESSION['username'] = $uname;

               // redirect to home page
               header('Location: userhome.php');
            }
            else
               // we use err code 2 to mean user name already taken
               header('Location: loginform.php?error=2');
         }
         else
            // we use err code 1 to mean password input fields differ
            header('Location: loginform.php?error=1');
         break;

      case 'Login':
         if ($login->isLoginValid($uname, $passwd))
         {
            // store user name as session data
            session_start();
            $_SESSION['Username'] = $uname;

            // redirect to home page
            header('Location: userhome.php');
         }
         else
            // we use err code 3 to mean login failed (either uname or passwd)
            header('Location: loginform.php?error=3');
         break;
      default:
         // we use err code 4 to mean invalid value for user-type
         header('Location: loginform.php?error=4');
         break;
      }

      $login = null; // alow garbage collection (closes db connection)
   }
   else
   {
      // we use err code 5 to mean no login info to be processed
      header('Location: loginform.php?error=5');
   }
?>
