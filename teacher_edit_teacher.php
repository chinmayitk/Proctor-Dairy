<?php
	$connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"proctordiary");
    session_start();
	$query = "update teachers T set T.teacher_id='$_SESSION[teacher_id]',T.teacher_name='$_POST[teacher_name]',T.teacher_email='$_POST[teacher_email]',T.teacher_password='$_POST[teacher_password]',T.teacher_dept='$_POST[teacher_dept]',T.teacher_mobile='$_POST[teacher_mobile]' where T.teacher_id='$_SESSION[teacher_id]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "teacher_dashboard.php";
</script>