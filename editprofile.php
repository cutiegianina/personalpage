<?php include 'database/dbConnection.php';
	  require_once('uploadImage.php');
	session_start();

	
	if(isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$id = $_SESSION['id'];

		if(isset($_FILES['txt_file']) && !empty($_FILES['txt_file']['name'])) {
			$image_file	= $_FILES["txt_file"]["name"];
			$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
			$size		= $_FILES["txt_file"]["size"];
			$temp		= $_FILES["txt_file"]["tmp_name"];
			
			$path="upload/".$image_file; //set upload folder path
			uploadImage($type, $path, $size, $temp, $image_file);
			
			
			$user = [
				'first_name' => $first_name,
				'last_name'  => $last_name,
				'image'      => $image_file
			];

			$sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, image = :image WHERE id = $id";

			$statement = $conn->prepare($sql);
				// bind values
			$statement->bindParam(':first_name', $user['first_name']);
			$statement->bindParam(':last_name', $user['last_name']);
			$statement->bindParam(':image', $user['image']);
			$result = $statement->execute();
			if($result) {
				$sql1 = "SELECT * FROM user WHERE id = $id";
				$stmt = $conn->prepare($sql1);
				$stmt->execute();
				while ($row = $stmt->fetch()) {
			          $get_first = $row['first_name'];
			          $get_first .= " "; 
			          $get_first .= $row['last_name'];
			          $_SESSION['id'] = $row['id'];
			     }
			    $_SESSION['full_name'] = $get_first;
				header('Location: profile.php');
			}
		}
		else {
			$user = [
				'first_name' => $first_name,
				'last_name'  => $last_name,
			];

			$sql = "UPDATE user SET first_name = :first_name, last_name = :last_name WHERE id = $id";

			$statement = $conn->prepare($sql);
				// bind values
			$statement->bindParam(':first_name', $user['first_name']);
			$statement->bindParam(':last_name', $user['last_name']);
			$result = $statement->execute();
			if($result) {
				$sql1 = "SELECT * FROM user WHERE id = $id";
				$stmt = $conn->prepare($sql1);
				$stmt->execute();
				while ($row = $stmt->fetch()) {
			          $get_first = $row['first_name'];
			          $get_first .= " "; 
			          $get_first .= $row['last_name'];
			          $_SESSION['id'] = $row['id'];
			          $_SESSION['image'] = $row['image'];
			     }
			    $_SESSION['full_name'] = $get_first;
				header('Location: profile.php');
			}
		}
		
	}


?>