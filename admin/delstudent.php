<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	error_reporting(0);
	
	//Function for Dropdown menu
	function abc(){
		$obDBRel = new DBRel;

		//Connecting PHP with DBMS and Obtaining Result of a query
		$conn = $obDBRel->DBConn();

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT User_ID FROM Student";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='STD'>";
		echo "<option value='userID' disabled selected>User ID</option>";

		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['User_ID'] . "'>" . $row['User_ID'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Delete Student - Admin</title>
		<link rel="stylesheet" type="text/css" href="delstudent.css">
		<link rel="stylesheet" type="text/css" href="delstudent1.css">
	</head>
	<body>
		<header>
			<a href='admin.php'><img src="../images/back.png"></a>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Delete a Record from Users:</h1>
			<form action="delstudent.php" method=POST>
				<div class=input>
					<?php abc(); ?>
					<button type=submit>Delete</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();

						$sql="SELECT * FROM Student order by User_ID";
							$result = $conn->query($sql);

						if($result->num_rows > 0){
							echo "<table class=slist>";
							echo "<tr>";
							echo 	"<th>User ID.</td>";
							echo 	"<th>User Name</td>";
							echo 	"<th>Password</td>";
							echo "</tr>";
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["User_ID"] . "</td>";
								echo 	"<td>" . $row["Name"] . "</td>";
								echo 	"<td>" . $row["Pass"] . "</td>";
								echo "</tr>";
							}	
						}
						else
							echo "<div align='center' style='font-size:20px'>No Records.</div>";

						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							
							$sql="Delete from Student where User_ID=".$_POST['STD'];
								$result = $conn->query($sql);

							if ($conn->query($sql) === TRUE){
								echo "<script> alert('Student Deleted!'); </script>";
								header('Location:delstudent.php');
							}
							else
								echo "Error: " . $sql . "<br>" . $conn->error;

						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>