<?php
session_start();
if (isset($_SESSION['name']) == false) {
	header('Location: login.php');
}
;
if ($_SESSION['accounttype'] != 'admin') {
	header('Location: homepage.php');
}
;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="settings.css">
</head>

<body>
	<a href="homepage.php" class="arrow">&#8249;</a>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Admin Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="<?php echo ($_SESSION['company']); ?>/logo.png" alt="Image" class="shadow">
						</div>
						<h4 class="text-center">
							<?php echo ($_SESSION['company']); ?>
						</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab"
							aria-controls="account" aria-selected="true">
							<i class="fa fa-user text-center mr-1"></i>
							Users
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
							aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
							Admins
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab"
							aria-controls="security" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i>
							Add Site
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab"
							aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i>
							Remove Site
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab"
							aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i>
							Upload Marker
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Users</h3>
						<div class="row">
							<div class="col-md-6">
								<h5>Add User</h5>
								<form action='adminadduser.php' method='POST'>
									Username:<input type='text' name='username' class='form-control'><br>
									Password:<input type='password' name='passwd' class='form-control'><br>
									<input type="submit" value="Add user" class='btn btn-primary'>
								</form>
								<br><br>
								<h5>Change Tier</h5>
								<form action='adminchangetier.php' method="POST">
									Username:<select name="Username" class='form-control'><br>
										<?php
										include_once("connection.php");
										$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
										$stmt->bindParam(':company', $_SESSION['company']);
										$stmt->execute();
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo ('<option value="' . $row["Username"] . '">' . $row["Username"] . '</option>');
										}
										?>
									</select>
									<br>
									<input type='radio' name='Tier' value='1'> 1
									<input type='radio' name='Tier' value='2'> 2
									<input type='radio' name='Tier' value='3'> 3
									<br>
									<input type="submit" value="Change Tier" class='btn btn-primary'>
								</form>
								<br><br>
								<h5>Remove User</h5>
								<form action='admindeleteuser.php' method="POST">
									Username:<select name="Username" class='form-control'><br>
										<?php
										include_once("connection.php");
										$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
										$stmt->bindParam(':company', $_SESSION['company']);
										$stmt->execute();
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo ('<option value="' . $row["Username"] . '">' . $row["Username"] . '</option>');
										}
										?>
									</select>
									<br>
									<input type="submit" value="Remove User" class='btn btn-primary'>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Admins</h3>
						<div class="row">
							<div class="col-md-6">
								<h5>Add Admin</h5>
								<form action='adminaddadmin.php' method="POST">
									Username:<select name="Username" class='form-control'>
										<?php
										include_once("connection.php");
										$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
										$stmt->bindParam(':company', $_SESSION['company']);
										$stmt->execute();
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo ('<option value="' . $row["Username"] . '">' . $row["Username"] . '</option>');
										}
										?>
									</select>
									<br>
									<input type="submit" value="Add Admin" class='btn btn-primary'>
								</form>
								<br><br>
								<h5>Remove Admin</h5>
								<form action='admindeleteadmin.php' method="POST">
									Username:<select name="Username" class='form-control'>
										<?php
										include_once("connection.php");
										$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='admin'");
										$stmt->bindParam(':company', $_SESSION['company']);
										$stmt->execute();
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo ('<option value="' . $row["Username"] . '">' . $row["Username"] . '</option>');
										}
										?>
									</select>
									<br>
									Click to Confirm: <input type='radio' onclick='showButton()'>
									<input id='adminremovebutton' type="submit" value="Remove Admin"
										class='btn btn-primary'>
									<script type="text/javascript">
										document.getElementById("adminremovebutton").style.display = "none";
										function showButton() {
											document.getElementById("adminremovebutton").style.display = "block";
										}
									</script>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-4">Add Site</h3>
						<div class="row">
							<div class="col-md-6">
								<form action='adminaddsite.php' method='POST'>
									Site name:<input type='text' name='sitename' class='form-control'><br>
									Site type:<input type='text' name='sitetype' class='form-control'><br>
									Latitude:<input type='text' name='latitude' class='form-control'><br>
									Longitude:<input type='text' name='longitude' class='form-control'><br>
									Area:<input type='text' name='area' class='form-control'><br>
									Valuation:<input type='text' name='valuation' class='form-control'><br>
									Capacity:<input type='text' name='capacity' class='form-control'><br>
									<input type="submit" value="Add site" class='btn btn-primary'>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Remove Site</h3>
						<div class="row">
							<div class="col-md-6">
								<form action='admindeletesite.php' method="POST">
									Site:<select name="SiteName" class='form-control'><br>
										<?php
										include_once("connection.php");
										$stmt = $conn->prepare("SELECT * FROM properties WHERE Company=:company");
										$stmt->bindParam(':company', $_SESSION['company']);
										$stmt->execute();
										while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
											echo ('<option value="' . $row["SiteName"] . '">' . $row["SiteName"] . '</option>');
										}
										?>
									</select>
									<br>
									<input type="submit" value="Remove Site" class='btn btn-primary'>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Upload Marker</h3>
						<div class="row">
							<div class="col-md-6">
								<form action="uploadmarker.php" method="post" enctype="multipart/form-data">
									<h5>PNG Upload</h5>
									<br>
									Name: <input type="text" name="markername" class='form-control'><br>
									File: <input type="file" name="fileToUpload" id="fileToUpload">
									<br><br>
									<input type="submit" value="Upload Image" name="submit" class='btn btn-primary'>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>