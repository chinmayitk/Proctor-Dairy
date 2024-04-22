<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	session_start();
	$query = "update meetings set meet_usn = '$_SESSION[edit_meeting_usn]', meet_id = '$_SESSION[edit_meeting_id]', meet_date = '$_POST[meet_date]', meet_info = '$_POST[meet_info]' where meet_id='$_SESSION[edit_meeting_id]' AND meet_usn='$_SESSION[edit_meeting_usn]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("meeting edited successfully.");
	window.location.href = "teacher_dashboard.php";
</script>