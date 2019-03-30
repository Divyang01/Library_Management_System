<?php
	require_once 'connect.php';
	if(!ISSET($_POST['student_id'])){	
		echo '
			<script type = "text/javascript">
				alert("Select student name first");
				window.location = "borrowing.php";
			</script>
		';
	}else
	{
		if(!ISSET($_POST['selector'])){
			echo '
				<script type = "text/javascript">
					alert("Selet a book first!");
					window.location = "borrowing.php";
				</script>
			';
		}
		else
		{
			foreach($_POST['selector'] as $key=>$value){
				$book_qty = $value;
				$student_id = $_POST['student_id'];
				$book_id = $_POST['book_id'][$key];
				$date = date("Y-m-d", strtotime("+8 HOURS"));
				$conn->query("INSERT INTO `borrowing` VALUES('', '$book_id', '$student_id', '$book_qty', '$date', 'Borrowed')") or die(mysqli_error());
				$r=$conn->query("Select * from `borrowing` where `student_id`='$student_id' and status='Borrowed'");
				$cnt=$r->num_rows;
				if($cnt>3)
				{
					echo '
						<script type = "text/javascript">
							alert("Only 3 Books Per User Allowed!!!!");
							window.location = "borrowing.php";
						</script>
					';
					while($cnt>3)
					{	 
					$conn->query("Delete from borrowing order by borrow_id desc limit 1");	
					$r=$conn->query("Select * from `borrowing` where `student_id`='$student_id' and status='Borrowed'");
					$cnt=$r->num_rows;						
					}
				}
				else
				{
					echo '
						<script type = "text/javascript">
							alert("Successfully Borrowed");
							window.location = "borrowing.php";
						</script>
						';
				
				}
			}
		}	
	}	
?>
