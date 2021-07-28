<?php
$Proid1=$_POST['Proid'];


if (!empty($Proid1) ) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    	}
    	else {
      $SELECT = "SELECT Proid From inventory Where Proid= ?";
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $Proid1);	 
      $stmt->execute();
      $stmt->store_result();
      //$stmt->fetch();
      $rnum = $stmt->num_rows;
      //echo $rnum;
      if ($rnum==1) {
          //$stmt->close();
          $query1="DELETE FROM inventory where Proid=? ";
          $stmt = $conn->prepare($query1);
          $stmt->bind_param("s", $Proid1);
       	  $a=$stmt->execute();
          //echo $a;
          if($a){
             echo "Product Removed succussfully.";
          }else{

            echo "Failed.";
          }
    	}else {
    		echo "Invalid Product Id..";
    	}
    	//$stmt->close();
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
          <a href="invent1.html">
              <button type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>

