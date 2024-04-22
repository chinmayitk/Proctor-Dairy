<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query = "INSERT INTO `meetings` (`meet_usn`, `meet_id`, `meet_date`, `meet_info`) VALUES ('$_POST[meet_usn]', '$_POST[meet_id]', '$_POST[meet_date]', '$_POST[meet_info]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("New meeting added successfully.");
	window.location.href = "student_dashboard.php";
</script>
