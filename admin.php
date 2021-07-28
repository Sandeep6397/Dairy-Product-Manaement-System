<?php
$Sid = $_POST['Sid'];
$Password =$_POST['password'];
if (!empty($Sid) || !empty($Password)) {
	 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
     	die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
     }else{
     	$SELECT="SELECT Sid,Password from staff where Sid=? and Password = ?";
     	$stmt = $conn->prepare($SELECT);
     	$stmt->bind_param("ss", $Sid,$Password);
     	$stmt->execute();

     	//$stmt->bind_result();
     	if($stmt->fetch()){
     		header("Location:http://localhost/miniproject/inventory.html") ;
      }
     	else{
     		echo '<script> 
          alert("Invalid Username or Password")
        </script>';
      }
    }
     
  }else{
    echo "All fields are required";
  }
	
 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="button.css">
</head>
<body>
      <div class="">
          <a href="admin.html">
              <button type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>
