<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query1 = "INSERT INTO `subjects` (`subject_code`, `subject_name`, `subject_semester`, `subject_credits`, `subject_dept`) VALUES ('$_POST[subject_code]', '$_POST[subject_name]', '$_POST[subject_semester]', '$_POST[subject_credits]', '$_POST[subject_dept]')";
    $result1 = mysqli_query($connection,$query1);
    if($result1){
        $query2 = "INSERT INTO `tsub_combine` (`tsub_id`, `sub_code`) VALUES ('$_POST[teacher_id]', '$_POST[subject_code]');";
        $result2 = mysqli_query($connection,$query2);
        ?>
        <script type="text/javascript">
	        alert("subject added successfully.");
            window.location.href = "admin_dashboard.php";
        </script>
        <?php
    }
    else{
        ?>   
 <script type="text/javascript">
	alert("check query1 .");
    window.location.href = "admin_dashboard.php";
</script>
<?php
    }
    
 ?>   
 
			