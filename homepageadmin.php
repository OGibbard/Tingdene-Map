<?php
#Start session
session_start();
#Check if user is logged in
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
#Check if user is an admin
if ($_SESSION['accounttype']=='user'){
    header('Location: homepage.php');
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
        <a href="admin.php">Edit</a>
        <a href="login.php">Exit</a>
        <div class="dot"></div>
    </nav>
    </body>
</html>