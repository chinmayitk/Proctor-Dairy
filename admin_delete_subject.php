<?php
		
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"proctordiary");
		$query1 = "DELETE FROM `tsub_combine` WHERE `tsub_combine`.`sub_code` = '$_POST[delete_subject]'";
        $result1 = mysqli_query($connection,$query1);
        if($result1){
            $query2 = "DELETE FROM `internals` WHERE `internals`.`inter_sub_code` = '$_POST[delete_subject]'";
            $result2 = mysqli_query($connection,$query2);
            if($result2){
                $query3 = "DELETE FROM `subjects` WHERE `subjects`.`subject_code` = '$_POST[delete_subject]'";
                $result3 = mysqli_query($connection,$query3);
            
            
                if($result3){
                ?>
                            <script type="text/javascript">
								alert("all existing subject details deleted successfully.");
								window.location.href = "admin_dashboard.php";
							</script>

                <?php  
                }
                else{
                ?>
                            <script type="text/javascript">
								alert("check query3.");
								window.location.href = "admin_dashboard.php";
							</script>
                <?php            
                }
            }
            else{
                ?>
                            <script type="text/javascript">
								alert("check query2.");
								window.location.href = "admin_dashboard.php";
							</script>
                <?php            
            }        
        }
        else{
            ?>
                            <script type="text/javascript">
								alert("check query1 . sub code not found");
								window.location.href = "admin_dashboard.php";
							</script>
            <?php
        }

?>