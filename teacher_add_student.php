<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	session_start();
	$query1 = "INSERT INTO `students` (`student_usn`, `student_name`, `student_email`, `student_password`, `student_mobile`, `gender` , `teach_id`) VALUES ('$_POST[student_usn]', '$_POST[student_name]', '$_POST[student_email]', '$_POST[student_password]', '$_POST[student_mobile]', '$_POST[gender]' , '$_SESSION[teacher_id]')";
	$result1 = mysqli_query($connection,$query1);
	if($result1){
		$query2 = "INSERT INTO `semsec` (`ssd_id`, `ssd_semester`, `ssd_section`, `ssd_dept`) VALUES ('$_POST[student_usn]', '$_POST[ssd_semester]', '$_POST[ssd_section]', '$_POST[ssd_dept]')";
		$result2 = mysqli_query($connection,$query2);
		if($result2){
			$query3 = "INSERT INTO `sss_combine` (`sss_usn`, `sss_id`) VALUES ('$_POST[student_usn]', '$_POST[student_usn]')";
			$result3 = mysqli_query($connection,$query3);
			if($result3){
				$query4 = "INSERT INTO `ats_combine` (`a_id`, `t_id`, `usn`) VALUES ('1', '$_SESSION[teacher_id]', '$_POST[student_usn]')";
				$result4 = mysqli_query($connection,$query4);

				?>
				<script type="text/javascript">
						alert("Student added successfully.");
						window.location.href = "teacher_dashboard.php";
				</script>
				<?php
			}
			else{
				?>
				<script type="text/javascript">
						alert(" check query 3.");
						window.location.href = "teacher_dashboard.php";
				</script>
				<?php
			}
			
		}
		else{
			?>
				<script type="text/javascript">
				alert("check query 2.");
				window.location.href = "teacher_dashboard.php";
			</script>
			<?php
		}
	}
	else{
		?>
				<script type="text/javascript">
				alert("check query 1");
				window.location.href = "teacher_dashboard.php";
			</script>
			<?php

	}
?>

