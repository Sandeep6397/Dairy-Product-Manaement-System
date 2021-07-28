<?php
$Username = $_POST['name'];
$Password =$_POST['password'];
if (!empty($Username) || !empty($Password)) {
	 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
     	die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
     }else{
     	$SELECT="SELECT Username,Password from admin where Username=? and Password=?";
     	$stmt = $conn->prepare($SELECT);
     	$stmt->bind_param("ss", $Username,$Password);
     	$stmt->execute();
     	//$stmt->bind_result();
     	if($stmt->fetch())
     		header("Location:http://localhost/miniproject/inventory1.html") ;
     	else{
     		echo "Invalid Username or Password";
     	}
     	$stmt->close();
        $conn->close();
     }
}else{
	echo "All field are required";
 die();
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
          <a href="adminlogin.html">
              <button type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>
