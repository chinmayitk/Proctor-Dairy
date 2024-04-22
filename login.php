<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to proctor diary</title>
    <link rel="shortcut icon" type="image/png" href="amclogo.png">

	<style>
		#heading{
			color: #1e66c4;
			font-size:50px;
			font-weight: bold;
			background-color: white;	
		}
		#buttons{
			padding: 10px;
    		border: 1px solid #1e66c4;
    		color: white;
    		background-color: #1e66c4;
    		margin: 3px;
    		text-decoration: none;
			font-weight: bold;
			font-size:20px;
			cursor:pointer;	 
		}
		#body{
			background: url(background15.jpg) no-repeat;
			color: white;
			background-size: 100% 100%;
    		background-attachment: fixed;
			background-position: center;
			font-weight:bold;
			background-color : yellow;
		}
		

		
	</style>
	
</head>
<body id="body">
	<center><br><br><br><br><br><br>
	<h1 id="heading">PROCTOR DIARY</h1><br>
	<form action="" method="POST">
		<input id="buttons" type="submit" name="admin_login" value="ADMIN LOGIN" required>
		<input id="buttons" type="submit" name="teacher_login" value="TEACHER LOGIN" required>
		<input id="buttons" type="submit" name="student_login" value="STUDENT LOGIN" required>
	</form>
	<?php
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
		if(isset($_POST['teacher_login'])){
			header("Location: teacher_login.php");
		}
	?>
	</center>
</body>
</html>