<!DOCTYPE html>
<?php
	require_once 'valid.php';
	if(isset($_REQUEST['qid']))
	{
		$_SESSION['qid']=$_REQUEST['qid'];
		header("location:querylist.php");
	}
?>	
<html lang = "eng">
	<head>
		<title>Library System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<h4 class = "navbar-text navbar-right">Library System</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-lg-2 well" style = "margin-top:60px;">
				<div class = "container-fluid">
					<img src = "images/user.png" width = "50px" height = "50px"/>
					<br />
					<br />
					<label class = "text-muted"><?php require'account.php'; echo $name;?></label>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-home"></i> Home</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Accounts</a>
						<ul style = "list-style-type:none;">
							<li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Admin</a></li>
							<li><a href = "student.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Student</a></li>
						</ul>
					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Books</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Transaction</a>
						<ul style = "list-style-type:none;">
							<li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Borrowing</a></li>
							<li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Returning</a></li>
						</ul>
					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "querylist.php?qid=Query1"><i class = "glyphicon glyphicon-tasks"></i> Query </a></li>
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Settings</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a></li>
						</ul>
					</li>
					

				</ul>
			</div>
			
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:60px;">
				<div class = "alert alert-info">Quries</div>
					<a href="querylist.php?qid=Query1"><button id = "query1" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Query1 </button></a>
					<a href="querylist.php?qid=Query2"><button id = "query2" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Query2 </button></a>
					<a href="querylist.php?qid=Query3"><button id = "query3" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Query3 </button></a>
					<a href="querylist.php?qid=Query4"><button id = "query4" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Query4 </button></a>
					
					
					

					<?php 
						if($_SESSION['qid']=="Query1")
						{
							?>
					<br />
					<br />
					<h5><strong>RETRIVE THE DETAILS OF ALL BOOK IN LIBRARY WITH BOOK TITLE,BOOK AUTHOR AND AVAILABLE BOOKS...!!</strong></h5>
					
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Book Title</th>
									<th>Author</th>
									<th>Available</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$abook = $conn->query("SELECT * FROM book") or die(mysqli_error());
									while($bbook = $abook->fetch_array()){
										$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$bbook[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
										$new_qty = $q_borrow->fetch_array();
										
								?>
								<tr>
									<td><?php echo $bbook['book_title']?></td>
									<td><?php echo $bbook['book_author']?></td>
									<td><?php echo $bbook['qty']-$new_qty['0'];?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
			
				<?php
						}
						
						if($_SESSION['qid']=="Query2")
						{
							?>
					<br />
					<br />
					<h5><strong>Get the perticular of borrowers who have borrowed more than two book but from 01-jan-2017 to 01-july-2017</strong></h5>
					
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Student No</th>
									<th>Student Name</th>
									<th>Book Title</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$abook = $conn->query("SELECT student_no,firstname,book_title FROM borrowing b,student s,book bb where s.student_id=b.student_id AND bb.book_id=b.book_id AND b.date BETWEEN '2015-07-01' AND '2017-12-01' GROUP BY b.student_id HAVING COUNT(*)>2") or die(mysqli_error());
									while($bbook = $abook->fetch_array()){
								?>
								<tr>
									<td><?php echo $bbook['0']?></td>
									<td><?php echo $bbook['1']?></td>
									<td><?php echo $bbook['2']?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
			
				<?php
						}
						
						if($_SESSION['qid']=="Query3")
						{
							?>
					<br />
					<br />
					<h5><strong>Retrive FirstName,MiddleName,LastName Of All CSE Students</strong></h5>
					
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>First Name</th>
									<th>Middle Name</th>
									<th>Last Title</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$abook = $conn->query("SELECT firstname,middlename,lastname FROM student where course='cse'") or die(mysqli_error());
									while($bbook = $abook->fetch_array()){
								?>
								<tr>
									<td><?php echo $bbook['0']?></td>
									<td><?php echo $bbook['1']?></td>
									<td><?php echo $bbook['2']?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
			
				<?php
						}
						
						if($_SESSION['qid']=="Query4")
						{
							?>
					<br />
					<br />
					<h5><strong>Retrive the Quantity of all books written by padma reddy</strong></h5>
					
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Author</th>
									<th>Total Number Of Books</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$abook = $conn->query("SELECT sum(qty) FROM book where book_author='padma reddy'") or die(mysqli_error());
									while($bbook = $abook->fetch_array()){
								?>
								<tr>
									<td>padma reddy</td>
									<td><?php echo $bbook['0']?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
			
				
			
				<?php
						}
						
						?>
			
			
			
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
</html>