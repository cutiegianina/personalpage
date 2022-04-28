<?php include 'database/dbConnection.php';
	session_start();

	
	if(isset($_POST['submit'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$id = $_SESSION['id'];
        $countfiles = count($_FILES['files']['name']);
	        // Loop all files
	    for($i = 0; $i < $countfiles; $i++) {
	   
	        // File name
	        $filename = $_FILES['files']['name'][$i];
	       
	        // Location
	        $target_file = 'upload/'.$filename;
	       
	        // file extension
	        $file_extension = pathinfo(
	            $target_file, PATHINFO_EXTENSION);
	              
	        $file_extension = strtolower($file_extension);
	       
	        // Valid image extension
	        $valid_extension = array("png","jpeg","jpg");
	       
	        if(in_array($file_extension, $valid_extension)) {
	   
	            // Upload file
	            if(move_uploaded_file(
	                $_FILES['files']['tmp_name'][$i],
	                $target_file)
	            ) {
	  
	                // Execute query
	                $statement->execute(
	                    array($filename,$target_file));
	            }
	        }
	    }
		$user = [
			'first_name' => $first_name,
			'last_name'  => $last_name,
			'name'       => $filename,
			'image'      => $target_file
		];

		$sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, name = :name, image = :image WHERE id = $id";

		$statement = $conn->prepare($sql);
			// bind values
		$statement->bindParam(':first_name', $user['first_name']);
		$statement->bindParam(':last_name', $user['last_name']);
		$statement->bindParam(':name', $user['name']);
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


?>