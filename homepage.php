<?php
#Start session
session_start();
#Check if user is logged in
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
#Check that user is on a user account
if ($_SESSION['accounttype']=='admin'){
    header('Location: homepageadmin.php');
};
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Import stylesheet -->
        <link rel="stylesheet" href="menu.css">
        <Title>
            Homepage
        </Title>
    </head>
    <body>
    <!-- Menu options -->
    <nav class="navMenu">
        <a href="map.php">Map</a>
        <a href="login.php">Exit</a>
        <div class='dot'></div>
    </nav>
    </body>
</html>