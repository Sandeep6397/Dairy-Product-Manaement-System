<?php
$Proid3=$_POST['Proid'];
$Pname=$_POST['Pname'];
$Quantity=$_POST['Quantity'];
$Rate=$_POST['Rate'];
if ( !empty($Proid3) || !empty($Pname) || !empty($Quantity) || !empty($Rate)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    	}
    	else {
            
         $SELECT = "SELECT Proid From inventory Where Proid= ? ";
         $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $Proid3);   
         $stmt->execute();
         $stmt->store_result();
         $rnum = $stmt->num_rows;
    
          if ($rnum==0) {

            $INSERT = "INSERT Into inventory (Proid,Pname,Quantity,Rate ) values(?, ?, ?,?)";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssi", $Proid3,$Pname,$Quantity,$Rate);
            $stmt->execute();
              echo "Product added Successfully.";
         }else {
            echo "Product Id is Already used.";
           }

        
    }
      $stmt->close();
      $conn->close();
    
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
              <button  type="submit" name="button">Back</button>
          </a>
            
       </div> 
</body>
</html>

