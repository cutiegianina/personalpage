<?php include 'database/dbConnection.php';
	session_start();

	
	if(isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$birth_date = $_POST['birth_date'];

		$sql = "INSERT INTO user (first_name,
			last_name,
			username,
			password,
			birth_date) VALUES (
			:first_name,
			:last_name,
			:username,
			:password,
			:birth_date)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);       
		$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR); 
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);

		$result = $stmt->execute();
		if ($result) {
			$_SESSION['successful'] = 'REGISTRATION SUCCESSFUL!';
			$_SESSION['result'] = '1';
			header('Location:login.php');
		}

	}

?>