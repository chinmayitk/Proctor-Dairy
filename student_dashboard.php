<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="amclogo.png">
	
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: white;
			position: fixed;
			color: darkblue;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background:url(background2.jpg);
			position: fixed;
			left: 17%;
			top: 21%;
			color: white;
			border: solid 1px black;
			overflow:scroll;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
            background-color:#1e66c4;
			
		}
		#input{
			padding: 5px;
    		border: 1px solid #1e66c4;
			color: white;
			background-color: #1e66c4;
    		margin: 3px;
    		text-decoration: none;
			font-size:15px;
			cursor:pointer;
			
		}
		#body{
			background: url(background3.jpg) no-repeat;
			color: white;
			background-size: 100% 100%;
    		background-attachment: fixed;
			background-position: center;
			font-weight:bold;
		}
		#buttons{
			padding: 5px;
    		border: 1px solid #1e66c4;
			color: darkblue;
			background-color: white;
    		margin: 2px;
    		text-decoration: none;
			font-weight: bold;
			font-size:16px;
			cursor:pointer;
			
			
		}
		
	</style>
	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"proctordiary");
		
	?>
</head>
<body id="body">
	<div id="header"><br>
		<center>PROCTOR DIARY(STUDENT) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT USN: <?php echo $_SESSION['student_usn'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT NAME:<?php echo $_SESSION['student_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a id="input" href="logout.php">LOGOUT</a>
		</center>
	</div>
	<span id="top_span"><marquee> Welcome to proctor diary <?php echo $_SESSION['student_name']?></marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
		
			<table >
			<th><strong><u>CONTENTS : </u></strong></th>
				
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_detail" value="Student Info">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="edit_detail" value="Edit Student">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_marks" value="View Marks">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="add_meeting" value="Add New Meeting">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_meeting" value="View Meeting">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="edit_meeting" value="Edit Meeting">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_teacher" value="Teachers">
					</td>
				</tr>

			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
			if(isset($_POST['show_detail']))
			{
				
				$query = "select student_usn,student_name,student_email,student_mobile,gender,ssd_semester,ssd_section,ssd_dept,teach_id from students S,semsec SS,sss_combine SSS where S.student_usn=SSS.sss_usn AND SS.ssd_id=SSS.sss_id AND student_usn ='$_SESSION[student_usn]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table >
				<th><strong><u>STUDENT INFO:</u></strong></th>
					<tr>
						<td >
							<b>USN:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['student_usn']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Student_name:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['student_name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Student_email:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['student_email']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Student_mobile:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['student_mobile']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Gender:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['gender']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Semester:</b>
						</td> 
						<td >
							<input  id="input" type="text" value="<?php echo $row['ssd_semester']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Section:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['ssd_section']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Department:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['ssd_dept']?>" disabled>
						</td>
					</tr>
					<tr>
						<td >
							<b>Teacher ID:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['teach_id']?>" disabled>
						</td>
					</tr>
					
				</table>
				<?php
				}	
			}
			?>

			<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select student_usn,student_name,student_email,student_password,student_mobile,gender,ssd_semester,ssd_section,ssd_dept,teach_id from students S,semsec SS,sss_combine SSS where S.student_usn=SSS.sss_usn AND SS.ssd_id=SSS.sss_id AND student_usn = '$_SESSION[student_usn]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="student_edit_student.php" method="post">
					<table>
					<th><strong><u>EDIT STUDENT DETAILS:</u></strong></th>
					<tr>
						<td >
							<b>USN:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_usn" value="<?php echo $row['student_usn']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_name:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_name" value="<?php echo $row['student_name']?>" required>
						</td>	
					</tr>
					<tr>
						<td>
							<b>Student_email:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_email" value="<?php echo $row['student_email']?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_password:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_password" value="<?php echo $row['student_password']?>"required >
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_mobile:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_mobile" value="<?php echo $row['student_mobile']?>" required >
						</td>
					</tr>
					<tr>
						<td>
							<b>Gender:</b>
						</td> 
						<td>
							<input id="input" type="text" name="gender" value="<?php echo $row['gender']?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Semester:</b>
						</td> 
						<td>
							<input  id="input" type="text" name="ssd_semester" value="<?php echo $row['ssd_semester']?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Section:</b>
						</td> 
						<td>
							<input id="input" type="text" name="ssd_section" value="<?php echo $row['ssd_section']?>" required >
						</td>
					</tr>
					<tr>
						<td>
							<b>Department:</b>
						</td> 
						<td>
							<input id="input" type="text" name="ssd_dept" value="<?php echo $row['ssd_dept']?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher_id:</b>
						</td> 
						<td>
							<input id="input" type="text"  value="<?php echo $row['teach_id']?>" disabled >
						</td>
					</tr>
						
						<br>
						<tr>
							<td></td>
							<td>
								<input id="buttons"  type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>

			<?php
				if(isset($_POST['show_marks']))
				{
					?>
					<center>
						<h2><u>INTERNAL MARKS</u></h2>
							
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'USN'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'SUB CODE'?>" disabled ></td>
								<td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'IA1'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'IA2'?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'IA3'?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'ASSIGNMENT'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="usn" value="<?php echo 'TOTAL'?>" disabled></td>
								
							</tr>
						</table>
						</center>
					<?php
					$query = "select * from internals where inter_usn='$_SESSION[student_usn]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="inter_usn" value="<?php echo $row['inter_usn']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="inter_sub_code" value="<?php echo $row['inter_sub_code']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="ia1" value="<?php echo $row['ia1']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="ia2" value="<?php echo $row['ia2']?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="ia3" value="<?php echo $row['ia3']?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="assignment" value="<?php echo $row['assignment']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['total']?>" disabled></td>
								
								
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
			
			<?php
				if(isset($_POST['edit_meeting']))
				{
				
			?>	<form action="student_edit_meeting.php" method="POST">
				<table>
					<th><strtong><u>EDIT MEETING DETAILS</u></strong></th>
					<tr>
						<td>
							<b>USN:</b>
						</td> 
						<td>
							<input id="input" type="text" name="meet_usn" value="<?php echo $_SESSION['student_usn']?>"  >
						</td>
					</tr>
					<tr>
						<td>
							<strong>Meeting ID:</strong>
						</td> 
						<td>
							<input id="input" type="text" name="meet_id" required >
						</td>
					</tr>
					<tr>
						<td>
							<b>Meeting date:</b>
						</td> 
						<td>
							<input id="input" type="text" name="meet_date"  required>	
						</td>
					</tr>
					<tr>
						<td>
							<b>Meeting info:</b>
						</td> 
						<td>
							<textarea id="input" rows="7" cols="60" name="meet_info" required></textarea>
						</td>
					</tr>
					<br>
						<tr>
							<td></td>
							<td>
								<input  id="buttons" type="submit" value="Save">
							</td>
						</tr>
					
				</table>
				</form>
				<?php
				}	
			
			?>
			


			<?php
				if(isset($_POST['add_meeting']))
				{
				
			?>	<form action="student_add_meeting.php" method="POST">
				<table>
					<th><strtong><u>ADD MEETING DETAILS</u></strong></th>
					<tr>
						<td>
							<b>USN:</b>
						</td> 
						<td>
							<input id="input" type="text" name="meet_usn" value="<?php echo $_SESSION['student_usn']?>"required >
						</td>
					</tr>
					<tr>
						<td>
							<strong>Meeting ID:</strong>
						</td> 
						<td>
							<input id="input" type="text" name="meet_id" required >
						</td>
					</tr>
					<tr>
						<td>
							<b>Meeting date:</b>
						</td> 
						<td>
							<input id="input" type="text" name="meet_date" required>	
						</td>
					</tr>
					<tr>
						<td>
							<b>Meeting info:</b>
						</td> 
						<td>
							<textarea id="input" rows="7" cols="60" name="meet_info" required></textarea>
						</td>
					</tr>
					<br>
						<tr>
							<td></td>
							<td>
								<input  id="buttons" type="submit" value="Save">
							</td>
						</tr>
					
				</table>
				</form>
				<?php
				}	
			
			?>

			<?php
				if(isset($_POST['show_meeting']))
				{
				$query = "select * from meetings where meet_usn = '$_SESSION[student_usn]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run))
				{
			?>
				<table>
					<th><strtong><u>MEETING DETAILS</u></strong></th>
					<tr>
						<td>
							<b>USN:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['meet_usn']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Meeting ID:</strong>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['meet_id']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Meeting date:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $row['meet_date']?>" disabled>	
						</td>
					</tr>
					<tr>
						<td >
							<b>Meeting info:</b>
						</td> 
						<td >
							<textarea id="input" rows="7" cols="60" disabled><?php echo $row['meet_info']?></textarea>
						</td>
					</tr>
					
				</table>
				<?php
				}	
			}
			?>

			<?php
				if(isset($_POST['show_teacher']))
				{
					?>
					<center>
						<h2>TEACHERS DETAILS</h2>
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'TEACHER ID'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'TEACHER NAME'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'TEACHER EMAIL'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'TEACHER DEPT'?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo 'TEACHER MOBILE'?>" disabled></td>
                                	
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from teachers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teacher_id']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teacher_name']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teacher_email']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teacher_dept']?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teacher_mobile']?>" disabled></td>
                                
								
							</tr>
						</table>
						</center>
						<?php
					}
				}
			?>
			
		</div>
	</div>
</body>
</html>

