<?php
$Sid=$_POST['Sid'];
$Name=$_POST['Name'];
$Address=$_POST['Address'];
$Phone=intval($_POST['Phone']);
$Salary=intval($_POST['Salary']);

if ( !empty($Sid) || !empty($Name) || !empty($Address) ||!empty($Phone) || !empty($Salary)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
      }
    	else {
        $SELECT = "SELECT * From staff Where Sid= ?";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $Sid);	 
        $a=$stmt->execute();
        $stmt->store_result();
        //$stmt->fetch();

        $rnum = $stmt->num_rows;
        //echo $rnum;
       
        if ($rnum==1) {
          $stmt->close();
          $UPDATE = "UPDATE staff SET Name=?,Address=?,Phone=?,Salary=? where Sid=?";
          $stmt = $conn->prepare($UPDATE);
          $stmt->bind_param("ssiis", $Name, $Address, $Phone,$Salary,$Sid);
       	  $stmt->execute();
          echo "Staff Updated succussfully.";
    	   }else {
    		    echo "Invalid Staff Id.";
    	   }
    	   $stmt->close();
      	 $conn->close();
   		}
	 } else {
 echo "All field are required.";
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

