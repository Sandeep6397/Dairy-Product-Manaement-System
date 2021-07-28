
<!DOCTYPE html>
<html>
<head>
  <title>Staff Table</title>
  <link rel="stylesheet" href="button.css">
  
</head>
<body>
  <h1>STAFF DETAILS </h1>

  <?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "dairy management";
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
  if (mysqli_connect_error()) {
      die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
  }else{
    $SELECT="SELECT Date1,Sid,Name,Address,Phone,Gender,Salary from staff"; 
    $stmt = $conn->query($SELECT);
    //$num= mysqli_num_rows($stmt);
    //$a =$num ;
  
     echo "<h2>";
    echo '<table cellpadding="10"  border="1">';
    echo "<tr>";
    echo "<td>"."Date"."</td>";
    echo "<td>"."Sid"."</td>";
    echo "<td>"."Name"."</td>";
    echo "<td>"."Address"."</td>";
    echo "<td>"."Phone"."</td>";
    echo "<td>"."Gender"."</td>";
    echo "<td>"."Salary"."</td>";
    while($res=mysqli_fetch_array($stmt)){
     
      
      echo "<tr>";
      echo "<td>".$res["Date1"]."</td>";
      echo "<td>".$res["Sid"]."</td>";
      echo "<td>".$res["Name"]."</td>";
      echo "<td>".$res["Address"]."</td>";
      echo "<td>".$res["Phone"]."</td>";
      echo "<td>".$res["Gender"]."</td>";
      echo "<td>".$res["Salary"]."</td>";
      echo "</tr>";
    

       }
       echo "</table>";
      echo "</h2>";
    }
    
    $stmt->close();
     $conn->close();


?>
   <div class="">
          <a href="staff1.html">
              <button  type="submit" name="button">Back</button>
          </a>
    </div> 


</body>
</html>
