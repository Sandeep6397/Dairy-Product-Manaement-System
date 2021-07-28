<?php
$Date3=$_POST['Date'];
$Pid=$_POST['Pid'];
$Sid=$_POST['Sid'];
$Proid2=$_POST['Proid'];
$Quantity=$_POST['Quantity'];
$Rate=intval($_POST['Rate']);

if ( !empty($Date3) || !empty($Pid) || !empty($Sid) ||!empty($Proid2) || !empty($Quantity) || !empty($Rate)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    	}
    	else {
            
         $SELECT3 = "SELECT Sid From staff  Where Sid= ? ";
         $stmt = $conn->prepare($SELECT3);
         $stmt->bind_param("s", $Sid);   
         $stmt->execute();
         $stmt->store_result();
         //$stmt->fetch();
         $rnum = $stmt->num_rows;
         //echo $rnum;
    
        if ($rnum==1) {
            //$stmt->close();
            $SELECT4 = "SELECT Pid From purchase Where Pid= ? ";

            $stmt=$conn->prepare($SELECT4); 

            $stmt->bind_param("s", $Pid);   
            $stmt->execute();
            $stmt->store_result();
            //$stmt->fetch();
            $rnum = $stmt->num_rows;
            //echo $rnum;

            if ($rnum==0) {

                //$stmt->close();
                 $SELECT2 = "SELECT Proid From inventory Where Proid= ? ";
                $stmt=$conn->prepare($SELECT2);
                $stmt->bind_param("s", $Proid2);  
                $stmt->execute();
                $stmt->store_result();
                //$stmt->fetch();
                $rnum = $stmt->num_rows;  

                if ($rnum==1) {
                   // $stmt->close();
                   /* $INSERT = "INSERT Into purchase (Date3, Pid, Sid,Proid, Quantity, Rate ) values(?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("sssssi", $Date3, $Pid, $Sid, $Proid2, $Quantity, $Rate);
       	            $stmt->execute();
                    //$stmt->store_result();
                    //$stmt->fetch();*/
                    $SELECT3 = "SELECT Quantity From inventory Where Proid='$Proid2' ";
                   $stmt->close();
                   $query=mysqli_query($conn,$SELECT3);
                   //while ($res=mysqli_fetch_array($query)) {
                   $res=mysqli_fetch_array($query);
                   //echo $res['Quantity'];
                   $b=$res['Quantity']+$Quantity;
                   //echo $b;


                    $INSERT = "INSERT Into purchase (Date3, Pid, Sid,Proid, Quantity, Rate ) values(?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("sssssi", $Date3, $Pid, $Sid, $Proid2, $Quantity, $Rate);
                    $x=$stmt->execute();
                    //$stmt->store_result();
                     if($x){
                          $UPDATE = "UPDATE inventory SET Quantity='$b' where Proid='$Proid2' ";
                          $stmt = $conn->prepare($UPDATE);
                          $stmt->execute();
                          echo "Successfull.";
                      }else{
                          echo "Unsuccessfull.";
                      }
                  }else {
    		            echo "Invalid Product Id.";
        	       }

            }else{
                  echo "Purchase Id is Already used.";
            }
        }else{
          echo "Invalid Staff Id";
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
          <a href="purchase.html">
              <button  type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>

