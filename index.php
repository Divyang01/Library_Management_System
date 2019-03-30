<!DOCTYPE html>
<?php 

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="libsys1";

$conn=new mysqli($dbhost,$dbuser,$dbpass,$db);


	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:home.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Library System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					
					<h3 class = "navbar-text navbar-right" style="color:#069">Library System</h3>
				</div>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			<div class = "col-lg-3 well">
				<br />
				<br />
				<h4>Login Here..</h4>
				<hr style = "border:1px solid #d3d3d3; width:100%;" />
				<form enctype = "multipart/form-data">	
					<div id = "username_warning" class = "form-group">
						<label class = "control-label">Username:</label>
						<input type = "text" class = "form-control" id = "username"/>
					</div>
					<div id = "password_warning" class = "form-group">
						<label class = "control-label">Password:</label>
						<input type = "password" class = "form-control" id = "password"/>
					</div>
					<br />
					<div class = "form-group">
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-save"></span> Login</button>
					</div>
				</form>	
				<div id = "result"></div>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-8 well">
				<img src = "images/lib1.jpg" height = "100%" width = "100%" />
			</div>
		</div>
		<nav class navbar navbar-default navbar-fixed bottom>

	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>
