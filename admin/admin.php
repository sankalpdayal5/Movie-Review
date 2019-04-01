<?php 
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body>
		<header>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Admin's Utility Space:</h1>
			<div class=main>
				<div>
					<div class=lnkimg>
						<a href='addsub.php'><img src="../images/add.png"></a>
					</div>
					<div class=shorten>
						<h3>Add  Movie</h3>
						<p>Click to insert movies to the database for adding feedback.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='delsub.php'><img src="../images/delete.png"></a>
					</div>
					<div class=shorten>
						<h3>Delete  Movie</h3>
						<p>Click to delete movies from the database.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='addstudent.php'><img src="../images/add.png"></a>
					</div>
					<div class="shorten">
						<h3>Add  User</h3>
						<p>Click to insert users to the database.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='delstudent.php'><img src="../images/delete.png"></a>
					</div>
					<div class=shorten>
						<h3>Delete User</h3>
						<p>Click to delete users present in the database.</p>
					</div>
				</div>
				<div>
					<div class="lnkimg">
						<a href='feedback.php'><img src="../images/feedback.png"></input></a>
					</div>
					<div class="shorten">
						<h3>Get Feedback</h3>
						<p>Click to see all the feedback in the database.</p>
					</div>
				</div>
			</div>
		</article>
	</body>
</html>