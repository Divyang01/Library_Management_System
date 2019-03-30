<!DOCTYPE html>
<?php
	require_once 'valid.php';
	
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
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "query.php"><i class = "glyphicon glyphicon-tasks"></i> Query </a></li>
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
					<button id = "query1" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query1 </button>
					<button id = "query2" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query2 </button>
					<button id = "query3" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query3 </button>
					<button id = "query4" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query4 </button>
					<button id = "query5" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query5 </button>
					<button id = "query6" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query6 </button>
					<button id = "query7" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query7 </button>
					<button id = "query8" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> query8 </button>
					
					
					
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
									$abook = $conn->query("SELECT book_title,book_author,qty FROM `book`") or die(mysqli_error());
									while($bbook = $abook->fetch_array()){
								?>
								<tr>
									<td><?php echo $bbook['book_title']?></td>
									<td><?php echo $bbook['book_author']?></td>
									<td><?php echo $bbook['qty']?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
		<br />
		<br />
		<br />
			
			
			
			
			
		</div>

		<nav class = "navbar navbar-default navbar-fixed-bottom">
			
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
	
			$('.ebook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#show_book').show();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
				});
				$('#book_table').fadeOut();
				$('#add_book').hide();
				$('#edit_form').load('load_book.php?book_id=' + $book_id);
			});
		});
	</script>
</html>