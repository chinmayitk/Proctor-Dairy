<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"proctordiary");
	$query1 = "INSERT INTO `internals`(`inter_usn`, `inter_sub_code`, `ia1`, `ia2`, `ia3`, `assignment`) VALUES ('$_POST[inter_usn]', '$_POST[inter_sub_code]', '$_POST[ia1]', '$_POST[ia2]', '$_POST[ia3]', '$_POST[assignment]')";
    $result1 = mysqli_query($connection,$query1);
    if($result1){
        $query2 = "CALL AVG_MARKS()";
        $result2 = mysqli_query($connection,$query2);
        
            ?>
            <script type="text/javascript">
            alert("Marks added successfully.");
            window.location.href = "teacher_dashboard.php";
            </script>
            <?php 
        
    }
    else{
        ?>
        <script type="text/javascript">
            alert("insert statement query has failed .");
            window.location.href = "teacher_dashboard.php";
        </script> 
        <?php
    }
?>    