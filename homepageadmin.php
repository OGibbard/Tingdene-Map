<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
if ($_SESSION['accounttype']=='user'){
    header('Location: homepage.php');
};
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="menu.css">
        <Title>
            Homepage
        </Title>    
    </head>
    <body>
    <nav class="navMenu">
        <a href="map.php">Map</a>
        <a href="admin.php">Edit</a>
        <a href="login.php">Exit</a>
        <div class="dot"></div>
    </nav>
    </body>
</html>