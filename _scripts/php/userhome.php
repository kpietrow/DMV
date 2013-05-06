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
<?php
    }
?>