
<!DOCTYPE html>
<html>
<head>
  <title>Sales Table</title>
   <link rel="stylesheet" href="button.css">
  
</head>
<body>
  <div class="dog">
      <h1>SALES DETAILS</h1>
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
    $SELECT="SELECT Date2,Bid,Sid,Proid,Quantity from sales"; 

    $stmt = $conn->query($SELECT);


    echo "<h2>";
    echo '<table cellpadding="10"  border="1">';
    echo "<tr>";
    echo "<td>"."Date"."</td>";
    echo "<td>"."Bill-id"."</td>";
    echo "<td>"."Sid"."</td>";
    echo "<td>"."Product-id"."</td>";
    echo "<td>"."Quantity"."</td>";
    echo "<td>"."Price"."</td>";
    
  
    while($res=mysqli_fetch_array($stmt)){
     
      $query = "SELECT Rate FROM inventory WHERE Proid = '{$res["Proid"]}'";
      $stmt1 = $conn->query($query);
      $res1 = $stmt1->fetch_assoc();

      echo "<tr>";
      echo "<td>".$res["Date2"]."</td>";
      echo "<td>".$res["Bid"]."</td>";
      echo "<td>".$res["Sid"]."</td>";
      echo "<td>".$res["Proid"]."</td>";
      echo "<td>".$res["Quantity"]."</td>";
      echo "<td>".($res1["Rate"]*$res['Quantity'])."</td>";
      echo "</tr>";
    

       }
       echo "</table>";
      echo "</h2>";
    }
    
    $stmt->close();
     $conn->close();


?>
          <a href="sales1.html">
              <button type="submit" name="submit">Back</button>
          </a>
      


</body>
</html>
