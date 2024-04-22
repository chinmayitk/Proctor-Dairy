<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
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
    		border: 1px solid #1e66c4;
			color: darkblue;
			background-color: white;
    		margin: 3px;
    		text-decoration: none;
			font-weight: bold;
			font-size:15px;
			cursor:pointer;
			
		}
		#body{
			background: url(background8.jpg) no-repeat;
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
		<h3 id="heading">Student LogIn Page</h3><br>
		<form action="" method="post">
			Stud USN : <input id="buttons" type="text" name="usn" required><br><br>
			Password : <input id="buttons" type="password" name="password" required><br><br>
			<input id="buttons" type="submit" name="submit" value="LOGIN">
		</form><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"proctordiary");
				$query = "select * from students where student_usn = '$_POST[usn]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['student_usn'] == $_POST['usn'])
					{
						if($row['student_password'] == $_POST['password'])
						{
							$_SESSION['student_name'] =  $row['student_name'];
							$_SESSION['student_email'] =  $row['student_email'];
							$_SESSION['student_usn'] =  $row['student_usn'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
	</center>
</body>
</html>