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
<br>
<a>Add account to company:</a>
<form action='adminadduser.php' method='POST'>
  User name:<input type='text' name='username'><br>
  Password:<input type='password' name='passwd'><br>
  <input type="submit" value="Add site">
</form>
<form action='adminaddsite.php' method='POST'>
  Site name:<input type='text' name='sitename'><br>
  Site type:<input type='text' name='sitetype'><br>
  Latitude:<input type='text' name='latitude'><br>
  Longitude:<input type='text' name='longitude'><br>
  <input type="submit" value="Add site">
</form>