
<!DOCTYPE html>
<html>
<head>
  <title>Inventory Table</title>
   <link rel="stylesheet" href="button.css">
  
</head>
<body>
  <div class="dog">
      <h1>INVENTORY DETAILS</h1>
  </div>

  <?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "dairy management";
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
      die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
  }else{
    $SELECT="SELECT Proid, Pname,Quantity,Rate from inventory"; 
    $stmt = $conn->query($SELECT);

    echo "<h2>";
    echo '<table cellpadding="10"  border="1">';
    echo "<tr>";
    echo "<td>"."Product Id"."</td>";
    echo "<td>"."Product Name"."</td>";
    echo "<td>"."Quantity(in Kg/Lt)"."</td>";
    echo "<td>"."Rate(per Kg/Lt)"."</td>";


    
  
    while($res=mysqli_fetch_array($stmt)){
     
      
      echo "<tr>";
      echo "<td>".$res["Proid"]."</td>";
      echo "<td>".$res["Pname"]."</td>";
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
          <a href="invent1.html">
              <button type="submit" name="submit">Back</button>
          </a>
      


</body>
</html>
