<?php
	error_reporting(0);
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	
	//Values from the Form
	$name=$_POST['sname'];
	$pass=$_POST['pwd'];
	
	//Connection to DB
	$conn = $obDBRel->DBConn();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//Inserting values into Student Table
		if($name!='' || $pass!=''){
			$sql="INSERT INTO Student VALUES (NULL, '$name', '$pass')";
			
			if ($conn->query($sql) === TRUE)
				echo "<script>
				
				 </script>";
			else
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		//Saving resources
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Add User - Admin</title>
		<link rel="stylesheet" type="text/css" href="addstudent.css">
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
			<h1>Add a User:</h1>
			<form action=addstudent.php method=post>
				<div class=input>
					<input type=text name=sname placeholder="User Name" required>
					<input type=password name=pwd placeholder="User Password" required>
					<button type=submit>Append</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from Student order by User_ID asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
						echo 	"<th>User ID</td>";
						echo 	"<th>User Name</td>";
						echo 	"<th>Password</td>";
						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["User_ID"] . "</td>";
								echo 	"<td>" . $row["Name"] . "</td>";
								echo 	"<td>" . $row["Pass"] . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>
