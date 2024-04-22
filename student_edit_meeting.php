<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	session_start();
	$query = "update meetings set meet_usn = '$_POST[meet_usn]', meet_id = '$_POST[meet_id]', meet_date = '$_POST[meet_date]', meet_info = '$_POST[meet_info]' where meet_id='$_POST[meet_id]' AND meet_usn='$_SESSION[student_usn]'";
	$query_run = mysqli_query($connection,$query);
	
?>
<script type="text/javascript">
	alert("meeting edited successfully.");
	window.location.href = "student_dashboard.php";
</script>
