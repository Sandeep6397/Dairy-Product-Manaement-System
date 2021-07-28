<?php
$Date1=$_POST['Date'];
$Sid=$_POST['Sid'];
$Name=$_POST['Name'];
$Address=$_POST['Address'];
$Phone=intval($_POST['Phone']);
$Gender=$_POST['Gender'];
$Salary=intval($_POST['Salary']);
$Password = $_POST['Password'];

if ( !empty($Date1) || !empty($Sid) || !empty($Name) || !empty($Address) ||!empty($Phone) || !empty($Gender) || !empty($Salary) || (!empty($Password))) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    	}
    	else {
      $SELECT = "SELECT Sid From staff Where Sid= ?";
      $INSERT = "INSERT Into staff (Date1, Sid, Name, Address, Phone, Gender, Salary,Password ) values(?, ?, ?, ?, ?, ?, ?,?)";
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $Sid);	 
      $stmt->execute();
      $stmt->store_result();
      $stmt->fetch();
      $rnum = $stmt->num_rows;
      if ($rnum==0) {
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssssisis", $Date1, $Sid, $Name, $Address, $Phone, $Gender,$Salary,$Password);
          $stmt->execute();
          echo "Staff Added succussfully.";
    	}else {
    		  echo "Staff id is already used.";
    	}
    	$stmt->close();
      $conn->close();
   		}
	 } else {
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
          <a href="staff1.html">
              <button type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>

