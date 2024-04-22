<?php
		
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"proctordiary");
		$query1 = "DELETE FROM `sss_combine` WHERE `sss_combine`.`sss_usn` = '$_POST[delete_student]'";
        $result1 = mysqli_query($connection,$query1);
        if($result1){
            $query2 = "DELETE FROM `ats_combine` WHERE `ats_combine`.`usn` = '$_POST[delete_student]'";
            $result2 = mysqli_query($connection,$query2);
            if($result2){
                $query3 = "DELETE FROM `meetings` WHERE `meetings`.`meet_usn` = '$_POST[delete_student]'";
				$result3 = mysqli_query($connection,$query3);
				if($result3){
					$query4 = "DELETE FROM `internals` WHERE `internals`.`inter_usn` = '$_POST[delete_student]'";
					$result4 = mysqli_query($connection,$query4);
					if($result4){
						$query5 = "DELETE FROM `students` WHERE `students`.`student_usn` = '$_POST[delete_student]'";
						$result5 = mysqli_query($connection,$query5);
						if($result5){
							$query6 = "DELETE FROM `semsec` WHERE `semsec`.`ssd_id` = '$_POST[delete_student]'";
							$result6 = mysqli_query($connection,$query6);
							if($result6){
							?>
								<script type="text/javascript">
									alert("all existing student details deleted successfully.");
									window.location.href = "admin_dashboard.php";
								</script>

							<?php
							}
							else{
								?>
								<script type="text/javascript">
									alert("semsec table deletion failed.");
									window.location.href = "admin_dashboard.php";
								</script>
								<?php
							}
						}
						else{
							?>
							<script type="text/javascript">
									alert("students table deletion failed");
									window.location.href = "admin_dashboard.php";
								</script>
							<?php
						}
					}
					else{
						?>
						<script type="text/javascript">
									alert("internal table deletion failed");
									window.location.href = "admin_dashboard.php";
								</script>
						<?php
					}
				}
				else{
					?>
					<script type="text/javascript">
									alert(" meetings table deletion failed ");
									window.location.href = "admin_dashboard.php";
								</script>
							<?php

				}
			}
			else{
				?>
				<script type="text/javascript">
									alert("ats combine deletion failed");
									window.location.href = "admin_dashboard.php";
								</script>
							<?php

			}
		}
		else{
			?>
			<script type="text/javascript">
					alert("sss combine deletion failed");
					window.location.href = "admin_dashboard.php";
					</script>
			<?php

		}
            
   ?>             