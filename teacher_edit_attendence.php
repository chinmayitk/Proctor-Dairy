<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query = "UPDATE attendence SET MIE='$_POST[MIE_atd]',CN='$_POST[CN_atd]',DBMS='$_POST[DBMS_atd]',ATC='$_POST[ATC_atd]',PYTHON='$_POST[PYTHON_atd]',UNIX='$_POST[UNIX_atd]' WHERE usn='$_POST[usn]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("attendence edited successfully.");
	window.location.href = "teacher_dashboard.php";
</script>