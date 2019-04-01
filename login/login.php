<?php
	error_reporting(0);
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirectlogin();

	//Connecting to DB
	$conn = $obDBRel->DBConn();

	//Obtaining Values from Tables
	$sql = "SELECT * FROM student";
	$result = $conn->query($sql);

	$flag=0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$_SESSION['user']=$_POST['user'];
		$_SESSION['pass']=$_POST['pass'];

		//Checking the entered username (admin)
		if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'admin')
			header('location: ../admin/admin.php');
		
		//Checking the entered username (student)
		while($row = $result->fetch_assoc())
			if((trim($_POST['user']) == trim($row['Name'])) && (trim($_POST['pass']) == trim($row['Pass'])))
				$flag = 1;
			
		if($flag == 1)
			header('Location:../student/student.php');

		else
			echo "<script> alert('Wrong Username or Password!'); </script>";
	}
	
	$conn->close();
?>

<html>

<head>
    <title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div>
        <form action="login.php" method="post">
            <table>
				<label>
					<h2>Login Form</h2>
				</label>
                <tr>
                    <td>
                        <h3>Username</h3>
                    </td>
                    <td><input type=text name=user required></td>
                </tr>
                <tr>
                    <td>
                        <h3>Password</h3>
                    </td>
                    <td><input type=password name=pass required></td>
                </tr>
            </table>
            <button type=submit>Login</button>
        </form>
    </div>
</body>

</html>