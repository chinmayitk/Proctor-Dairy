<?php
		
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"proctordiary");
		$query1 = "DELETE FROM `tsub_combine` WHERE `tsub_combine`.`sub_code` = '$_POST[delete_teacher]'";
        $result1 = mysqli_query($connection,$query1);
        if($result1){
            $query2 = "DELETE FROM `ats_combine` WHERE `ats_combine`.`t_id` = '$_POST[delete_teacher]'";
            $result2 = mysqli_query($connection,$query2);
            if($result2){
                $query3 = "DELETE FROM `teachers` WHERE `teachers`.`teacher_id` = '$_POST[delete_teacher]'";
                $result3 = mysqli_query($connection,$query3);
                if($result3){
                    ?>
                    <script type="text/javascript">
                        alert("teacher deleted successfully");
                        window.location.href = "admin_dashboard.php";
                        </script>
                <?php
                    }
                
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert("teachers deletion failed");
                            window.location.href = "admin_dashboard.php";
                            </script>
                    <?php
                }  
            }
            else
            {
                ?>
                    <script type="text/javascript">
                        alert("ats_combine deletion failed");
                        window.location.href = "admin_dashboard.php";
                        </script>
                <?php
            }                
        }
        else
        {
            ?>
            <script type="text/javascript">
                alert("tsub_combine deletion failed");
                window.location.href = "admin_dashboard.php";
                </script>
            
            <?php
        } 
?>         
    
        