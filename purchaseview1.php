
<!DOCTYPE html>
<html>
<head>
  <title>Purchase Table</title>
   <link rel="stylesheet" href="button.css">
  
</head>
<body>
      <h1>PURCHASE DETAILS</h1>


  <?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "dairy management";
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
      die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
  }else{
    $SELECT="SELECT Date3, Pid, Sid,Proid, Quantity, Rate from purchase"; 
    $stmt = $conn->query($SELECT);

    echo "<h2>";
    echo '<table cellpadding="10"  border="1">';
    echo "<tr>";
    echo "<td>"."Date"."</td>";
    echo "<td>"."Purchase-id"."</td>";
    echo "<td>"."Sid"."</td>";
    echo "<td>"."Product-id"."</td>";
    echo "<td>"."Quantity"."</td>";
    echo "<td>"."Rate"."</td>";
    
  
    while($res=mysqli_fetch_array($stmt)){
     
      
      echo "<tr>";
      echo "<td>".$res["Date3"]."</td>";
      echo "<td>".$res["Pid"]."</td>";
      echo "<td>".$res["Sid"]."</td>";
      echo "<td>".$res["Proid"]."</td>";
      echo "<td>".$res["Quantity"]."</td>";
      echo "<td>".$res["Rate"]."</td>";
      echo "</tr>";
    

       }
       echo "</table>";
      echo "</h2>";
    }
    
    $stmt->close();
     $conn->close();


?>
          <a href="purchase1.html">
              <button type="submit" name="submit">Back</button>
          </a>
      


</body>
</html>
