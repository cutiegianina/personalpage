<?php include 'database/dbConnection.php';
    session_start();

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";  
    $stmt = $conn->prepare($sql);  
    $stmt->execute(  
         array(  
              'username'     =>     $_POST["username"],  
              'password'     =>     $_POST["password"]  
         )  
    );
    $count = $stmt->rowCount();

    if($count > 0)  
    {  
     while ($row = $stmt->fetch()) {
          $get_first = $row['first_name'];
          $get_first .= " "; 
          $get_first .= $row['last_name'];
          $_SESSION['id'] = $row['id'];
     }
         $_SESSION['full_name'] = $get_first;
         header("location:home.php");  
    }  
    else  
    {  
         $message = '<label>Wrong Data</label>';
         header("location:index.php"); 
    }  

?>