<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	session_start();
	$query1 = "UPDATE internals SET inter_usn = '$_SESSION[edit_marks_usn]',inter_sub_code = '$_SESSION[edit_marks_subcode]', ia1 = '$_POST[ia1]', ia2 = '$_POST[ia2]', ia3 = '$_POST[ia3]', assignment = '$_POST[assignment]' WHERE inter_usn='$_SESSION[edit_marks_usn]' AND inter_sub_code='$_SESSION[edit_marks_subcode]'";
	$result1 = mysqli_query($connection,$query1);
	if($result1){
		
		$query2 = "UPDATE internals SET total = null where inter_usn = '$_SESSION[edit_marks_usn]'";
		$result2 = mysqli_query($connection,$query2);
		if($result2){

		$query3 = "CALL AVG_MARKS()";
        $result3 = mysqli_query($connection,$query3);
			?>
			<script type="text/javascript">
				alert("Marks edited successfully.");
				window.location.href = "teacher_dashboard.php";
			</script>

			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert("set total to null failed");
				window.location.href = "teacher_dashboard.php";
			</script>

			<?php
		}
	}
	else
	{
		?>
<script type="text/javascript">
	alert("update failed.");
	window.location.href = "teacher_dashboard.php";
</script>

<?php
	}