<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query = "insert into teachers values('$_POST[teacher_id]','$_POST[teacher_name]','$_POST[teacher_email]','$_POST[teacher_password]','$_POST[teacher_dept]','$_POST[teacher_mobile]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Teacher added successfully.");
	window.location.href = "admin_dashboard.php";
</script>