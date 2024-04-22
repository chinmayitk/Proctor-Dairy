<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	session_start();
	$query = "update students S,semsec SS,sss_combine SSS set student_usn='$_SESSION[student_usn]',student_name='$_POST[student_name]',student_email='$_POST[student_email]',student_password='$_POST[student_password]',student_mobile='$_POST[student_mobile]',gender='$_POST[gender]',ssd_semester='$_POST[ssd_semester]',ssd_section='$_POST[ssd_section]',ssd_dept='$_POST[ssd_dept]' where S.student_usn=SSS.sss_usn AND SS.ssd_id=SSS.sss_id AND student_usn ='$_SESSION[student_usn]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "student_dashboard.php";
</script>
