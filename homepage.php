<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
?>
<!DOCTYPE html>

<html>
    <head>
        <Title>
            Homepage
        </Title>    
    </head>
    <body>
        <a href="map.php">Click here to go to the map.</a>
        <br>
        <a href="login.php">Click here to login.</a>
        <br>
        <a href="signup.php">Click here to sign up.</a>
        <br>
        <a href="admin.php">Click here for the admin page.</a>
    </body>
</html>