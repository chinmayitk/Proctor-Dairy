<!DOCTYPE html>
<html>
<head>
<title>Teacher Dashboard</title>
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
			background: url(background2.jpg);
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
			padding: 2px;
			margin:5px;
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
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"proctordiary");
	?>
</head>
<body id="body">
	<div id="header"><br>
		<center >Proctor Diary(Teacher) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher Email: <?php echo $_SESSION['teacher_email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Teacher Name:<?php echo $_SESSION['teacher_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<a id="input" href="logout.php">LOGOUT</a>
		</center>
	</div>
	<span id="top_span"><marquee> Welcome to proctor diary <?php echo $_SESSION['teacher_name']?></marquee></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
			<th><strong><u>CONTENTS :</u></strong></th>
                <tr>
					<td id="td" >
						<input id="input" type="submit" name="teacher_info" value="View Teacher info ">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="edit_teacher" value="Edit Teacher Details">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="add_new_student" value="Add New Student">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="delete_student" value="Delete Student">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="edit_student" value="Edit Student Details">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_student" value="View Proctor Students">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="add_marks" value="Add Student Marks">
					</td>
				</tr>
					<td id="td">
						<input id="input" type="submit" name="view_marks" value="View Student Marks">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="edit_marks" value="Edit Student Marks">
					</td>
				</tr>
				<tr>
					<td id="td">
						<input id="input" type="submit" name="view_meeting" value="View Student Meeting">
					</td>
				</tr>
                <tr>
					<td id="td">
						<input id="input" type="submit" name="edit_meeting" value="Edit Student Meeting">
					</td>
				</tr>
				
				<tr>
					<td id="td">
						<input id="input" type="submit" name="show_teacher" value="Staff">
					</td>
				</tr>
				
				
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">

        <?php
			if(isset($_POST['teacher_info']))
			{
				
				$query = "select * from teachers where teacher_id = '$_SESSION[teacher_id]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table>
				<th><strong><u>TEACHER INFO:</u></strong></th>
					<tr>
						<td >
							<b>Teacher ID:</b>
						</td> 
						<td>
							<input id="input" type="text" value="<?php echo $row['teacher_id']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher Name:</b>
						</td> 
						<td>
							<input id="input" type="text" value="<?php echo $row['teacher_name']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher email:</b>
						</td> 
						<td>
							<input id="input" type="text" value="<?php echo $row['teacher_email']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher password:</b>
						</td> 
						<td>
							<input id="input" type="text" value="<?php echo $row['teacher_password']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher Department:</b>
						</td> 
						<td>
							<input id="input" type="text" value="<?php echo $row['teacher_dept']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Teacher Mobile:</b>
						</td> 
						<td>
							<input id="input" id="input" type="text" value="<?php echo $row['teacher_mobile']?>" disabled>
						</td>
					</tr>
					
					
				</table>
				<?php
				}	
			}
		?>

        <?php
			if(isset($_POST['edit_teacher']))
			{
				
				$query = "select * from teachers where teacher_id = '$_SESSION[teacher_id]'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
                <form action="teacher_edit_teacher.php" method="post">
				<table>
				<th><strong><u>EDIT TEACHER INFO:</u></strong></th>
					<tr>
						<td >
							<b>Teacher ID:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_id" value="<?php echo $row['teacher_id']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Name:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_name" value="<?php echo $row['teacher_name']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>email:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_email" value="<?php echo $row['teacher_email']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>password:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_password" value="<?php echo $row['teacher_password']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Department:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_dept" value="<?php echo $row['teacher_dept']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Mobile:</b>
						</td> 
						<td>
							<input id="input" type="text" name="teacher_mobile" value="<?php echo $row['teacher_mobile']?>" >
						</td>
					</tr>
					
                    <tr>
						<td>
							<input id="buttons" type="submit" name="submit" value="Save">
						</td>
					</tr>
					
				</table>
                </form>
				<?php
				}	
			}
		?>

        <?php 
				if(isset($_POST['add_new_student'])){
					?>
					
					<form action="teacher_add_student.php" method="post">
					<table>
						<th><strong><u>ENTER NEW STUDENT:</u></strong></th>
						<tr>
							<td>
								<b>Student USN:</b>
							</td> 
							<td>
								<input id="input" type="text" name="student_usn"  required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student Name:</b>
							</td> 
							<td>
								<input id="input" type="text" name="student_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student email:</b>
							</td> 
							<td>
								<input id="input" type="text" name="student_email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student password:</b>
							</td> 
							<td>
								<input id="input" type="text" name="student_password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>student mobile:</b>
							</td> 
							<td>
								<input id="input" type="text" name="student_mobile" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>gender:</b>
							</td> 
							<td>
								<input id="input" type="text" name="gender" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student Semester:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ssd_semester" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student Section:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ssd_section" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Student Dept:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ssd_dept" required>
							</td>
						</tr>
                        <tr>
							<td>
								<b>Teacher ID:</b>
							</td> 
							<td>
								<input id="input" type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']?>" disabled>
							</td>
						</tr>
						
						<br>
						<tr>
							<td></td>
							<td>
								<input id="buttons" type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>

            <?php
			if(isset($_POST['delete_student']))
			{
				?>
				
				<form action="teacher_delete_student.php" method="post">
				&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="delete_student" required>
				<input id="buttons"type="submit" name="submit" value="Delete">
				</form><br><br>
				
				<?php
			}
			?>
		
				<?php
				if(isset($_POST['edit_student']))
				{
					?>
					
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="edit_usn" required>
					<input id="buttons" type="submit" name="Search_USN" value="Search">
					</form><br><br>
					
					
					<?php
				}
				if(isset($_POST['Search_USN']))
				{
					$query1 = "select student_usn,student_name,student_email,student_password,student_mobile,gender,ssd_semester,ssd_section,ssd_dept from students S,semsec SS,sss_combine SSS where S.student_usn=SSS.sss_usn AND SS.ssd_id=SSS.sss_id AND student_usn = '$_POST[edit_usn]' AND teach_id='$_SESSION[teacher_id]'";
					$query_run = mysqli_query($connection,$query1);
					$_SESSION['student_usn'] = $_POST['edit_usn'];
					while ($row = mysqli_fetch_assoc($query_run))
					{
					?>
                    <form action="teacher_edit_student.php" method="post">
					<table>
					<th><strong><u>EDIT STUDENT DETAILS:</u></strong></th>
					<tr>
						<td >
							<b>USN:</b>
						</td> 
						<td>
							<input id="input" type="text" name="edit_usn" value="<?php echo $row['student_usn']?>" disabled>
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_name:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_name" value="<?php echo $row['student_name']?>" >
						</td>	
					</tr>
					<tr>
						<td>
							<b>Student_email:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_email" value="<?php echo $row['student_email']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_password:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_password" value="<?php echo $row['student_password']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Student_mobile:</b>
						</td> 
						<td>
							<input id="input" type="text" name="student_mobile" value="<?php echo $row['student_mobile']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Gender:</b>
						</td> 
						<td>
							<input id="input" type="text" name="gender" value="<?php echo $row['gender']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Semester:</b>
						</td> 
						<td>
							<input  id="input" type="text" name="ssd_semester" value="<?php echo $row['ssd_semester']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Section:</b>
						</td> 
						<td>
							<input id="input" type="text" name="ssd_section" value="<?php echo $row['ssd_section']?>" >
						</td>
					</tr>
					<tr>
						<td>
							<b>Department:</b>
						</td> 
						<td>
							<input id="input" type="text" name="ssd_dept" value="<?php echo $row['ssd_dept']?>" >
						</td>
					</tr>
					<tr>
							<td>
								<b>Teacher ID:</b>
							</td> 
							<td>
								<input id="input" type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']?>" disabled>
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
				if(isset($_POST['add_marks'])){
					?>
					
					<form action="teacher_add_marks.php" method="post">
					<table>
						<th><strong><u>ENTER NEW STUDENT MARKS:</u></strong></th>
						<tr>
							<td>
								<b>Student USN:</b>
							</td> 
							<td>
								<input id="input" type="text" name="inter_usn"  required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Subject Code:</b>
							</td> 
							<td>
								<input id="input" type="text" name="inter_sub_code" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA1:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia1" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA2:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia2" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA3:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia3" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>assignment:</b>
							</td> 
							<td>
								<input id="input" type="text" name="assignment" required>
							</td>
						</tr>
						<br>
						<tr>
							<td></td>
							<td>
								<input id="buttons" type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>

			<?php
			if(isset($_POST['view_marks']))
			{
				?>
				
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="usn_view_marks" required>
				<input id="buttons" type="submit" name="search_by_usn_view_marks" value="Search">
				</form><br><br>
				
				<?php
			}
			
				if(isset($_POST['search_by_usn_view_marks']))
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
					$_SESSION['usn_view_marks'] = $_POST['usn_view_marks'];
					$query1 = "select * from internals where inter_usn='$_SESSION[usn_view_marks]'";
					$query_run = mysqli_query($connection,$query1);
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
			if(isset($_POST['edit_marks']))
			{
				?>
				
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="edit_marks_usn" required>
				&nbsp;&nbsp;<b>Enter Subject code:</b>&nbsp;&nbsp; <input id="input" type="text" name="edit_marks_subcode" required>
				<input id="buttons" type="submit" name="search_by_usn_for_edit" value="Search">
				</form><br><br>
				
				<?php
			}
			if(isset($_POST['search_by_usn_for_edit']))
			{	

				$_SESSION['edit_marks_usn'] = $_POST['edit_marks_usn'];
				$_SESSION['edit_marks_subcode'] = $_POST['edit_marks_subcode'];
				$query = "select * from internals where inter_usn = '$_SESSION[edit_marks_usn]' AND inter_sub_code='$_SESSION[edit_marks_subcode]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="teacher_edit_marks.php" method="post">
						<table>
						<th><strong><u>EDIT MARKS</u></strong></th>
						<tr>
							<td>
								<b>Student USN:</b>
							</td> 
							<td>
								<input id="input" type="text" name="edit_marks_usn" value="<?php echo $row['inter_usn']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Subject Code:</b>
							</td> 
							<td>
								<input id="input" type="text" name="edit_marks_subcode" value="<?php echo $row['inter_sub_code']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA1:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia1" value="<?php echo $row['ia1']?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA2:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia2" value="<?php echo $row['ia2']?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>IA3:</b>
							</td> 
							<td>
								<input id="input" type="text" name="ia3" value="<?php echo $row['ia3']?>" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>assignment:</b>
							</td> 
							<td>
								<input id="input" type="text" name="assignment" value="<?php echo $row['assignment']?>" required>
							</td>
						</tr>
						
						
						<br>
						<tr>
							<td></td>
							<td>
								<input id="buttons" type="submit" value="Save">
							</td>
						</tr>
						
					</table>
					</form>
					<?php
				}
			}
			?>

			<?php
			if(isset($_POST['view_meeting']))
			{
				?>
				
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="view_meeting_usn" required>
				&nbsp;&nbsp;<input id="buttons" type="submit" name="search_by_usn_view_meeting" value="Search">
				</form><br><br>
				
				<?php
			}
			
				if(isset($_POST['search_by_usn_view_meeting']))
				{
				$_SESSION['view_meeting_usn'] = $_POST['view_meeting_usn'];
				$query = "select * from meetings where meet_usn = '$_SESSION[view_meeting_usn]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run))
				{
			?>
				<table>
					<th><strtong><u>MEETING DETAILS:</u></strong></th>
					<tr>
						<td>
							<b>USN:</b>
						</td> 
						<td >
							<input id="input" type="text" value="<?php echo $_SESSION['view_meeting_usn']?>" disabled>
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
			if(isset($_POST['edit_meeting']))
			{
				?>
				
				<form action="" method="post">				
				&nbsp;&nbsp;<b>Enter USN:</b>&nbsp;&nbsp; <input id="input" type="text" name="edit_meeting_usn" required>
				&nbsp;&nbsp;<b>Enter Meeting ID:</b>&nbsp;&nbsp; <input id="input" type="text" name="edit_meeting_id" required>
				<input id="buttons" type="submit" name="search_by_usn_for_edit_meeting" value="Search">
				</form><br><br>
			<?php
			}
			if(isset($_POST['search_by_usn_for_edit_meeting']))
			{
				$_SESSION['edit_meeting_usn'] = $_POST['edit_meeting_usn'];
				$_SESSION['edit_meeting_id'] = $_POST['edit_meeting_id'];
				$query = "select * from meetings where meet_usn='$_SESSION[edit_meeting_usn]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run))
				{
					?>
						<form action="teacher_edit_meetings.php" method="post">
						<table>
					<th><strtong><u>EDIT MEETING DETAILS</u></strong></th>
					<tr>
						<td>
							<b>USN:</b>
						</td> 
						<td>
							<input id="input" type="text" name="meet_usn" value="<?php echo $_SESSION['edit_meeting_usn']?>" disabled >
						</td>
					</tr>
					<tr>
						<td>
							<strong>Meeting ID:</strong>
						</td> 
						<td>
							<input id="input" type="text" name="meet_id" value="<?php echo $_SESSION['edit_meeting_id']?>" disabled >
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
			}
			?>

			<?php
				if(isset($_POST['show_student']))
				{
					?>
					<center>
						<h2>STUDENT DETAILS</h2>
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT USN'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT NAME'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT EMAIL'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT MOBILE'?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT GENDER'?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT SEMESTER'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT SECTION'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'STUDENT DEPT'?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo 'PROCTOR ID'?>" disabled></td>	
							</tr>
						</table>
					</center>
					<?php
					$query = "select student_usn,student_name,student_email,student_mobile,gender,ssd_semester,ssd_section,ssd_dept,teach_id from students S,semsec SS,sss_combine SSS where S.student_usn=SSS.sss_usn AND SS.ssd_id=SSS.sss_id AND teach_id = '$_SESSION[teacher_id]' ";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border: 3px solid white;">
							<tr>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['student_usn']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['student_name']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['student_email']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['student_mobile']?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['gender']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['ssd_semester']?>" disabled></td>
                                <td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['ssd_section']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['ssd_dept']?>" disabled></td>
								<td id="td"><input id="input" type="text"  name="total" value="<?php echo $row['teach_id']?>" disabled></td>
							</tr>
						</table>
						</center>
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