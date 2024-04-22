<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query = "update teachers set t_id='$_POST[t_id]',name='$_POST[name]',email='$_POST[email]',password='$_POST[password]',dept='$_POST[dept]',mobile='$_POST[mobile]',subject='$_POST[subject]' where email = '$_POST[email]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "teacher_dashboard.php";
</script>
