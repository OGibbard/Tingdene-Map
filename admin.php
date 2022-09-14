<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
if ($_SESSION['accounttype']!='admin'){
  header('Location: homepage.php');
};
?>
<br><h3>Admin for:</h3>
<h1><?php echo ($_SESSION['company']); ?></h1>