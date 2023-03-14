<?php
#Start session
session_start();
#Reset session
session_destroy();
?>
<!DOCTYPE html>

<html>
    <head>
        <!-- Import stylesheets -->
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <Title>
            Login
        </Title>    
    </head>
    <body>
        <!-- Form design -->
        <div class='main'>
        <p class='sign' align='center'>Login:</p>
        <!-- Form -->
        <form class='form1' action='loginprocess.php' method='POST'>
            <input class='un' type='text' name='username' placeholder='Username'><br>
            <input class='pass' type='password' name='passwd' placeholder='Password'><br>
            <input class='submit' type="submit" value="Login"> 
        </form>
        <br>
        <p align='center'><a href="signup.php">Click here to sign up.</a></p>
        <br>
        <br>
        </div>
    </body>
</html>