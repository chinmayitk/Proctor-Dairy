<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="amclogo.png">
	<style>
		#heading{
			color:darkblue;
			font-size:50px;
			font-weight: bold;	
			background-color:white;
			padding: 10px;
			margin: 3px;
		}
		#buttons{
			padding: 10px;
    		border: 3px solid #1e66c4;
			color: darkblue;
			background-color: white;
    		margin: 3px;
    		text-decoration: none;
			font-weight: bold;
			font-size:15px;
			cursor:pointer;
			
		}
		#body{
			background: url(background17.jpg) no-repeat;
			color: white;
			background-size: 100% 100%;
    		background-attachment: fixed;
			background-position: center;
			font-weight:bold;
		}

	</style>
</head>
<body id="body">
	<center><br><br><br><br>
		<h3 id="heading">Admin LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input id="buttons" type="text" name="email"  required><br><br>
			Password: <input id="buttons" type="password" name="password" placeholder: required><br><br>
			<input id="buttons" type="submit" name="submit" value="LOGIN">
		</form><br>
		
		<?php
			session_start();
			if(isset($_POST['submit'])){
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"proctordiary");
				$query = "select * from admin where admin_email='$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['admin_email'] == $_POST['email']){
						if($row['admin_password'] == $_POST['password']){
							$_SESSION['admin_name'] =  $row['admin_name'];
							$_SESSION['admin_email'] =  $row['admin_email'];
							header("Location: admin_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
						
					}
					else{
						?>
						<span>Wrong email !</span>
						<?php
					}
				}
				
			}
		?>
	</center>
</body>
</html>