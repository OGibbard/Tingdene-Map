<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <Title>
            Login
        </Title>    
    </head>
    <body>
        <h1>
            Please login.
        </h1>
        <form action='loginprocess.php' method='POST'>
            User name:<input type='text' name='username'><br>
            Password:<input type='password' name='passwd'><br>
            <input type="submit" value="Login"> 
        </form>
        <br>
        <a href="signup.php">Click here to sign up.</a>
    </body>
</html>