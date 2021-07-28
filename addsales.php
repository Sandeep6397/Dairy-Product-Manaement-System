<?php
$Date2=$_POST['Date'];
$Bid=$_POST['Bid'];
$Sid=$_POST['Sid'];
$Proid1=$_POST['Proid'];
$Quantity=$_POST['Quantity'];

if ( !empty($Date2) || !empty($Bid) || !empty($Sid) ||!empty($Proid1) || !empty($Quantity)) {
	  $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dairy management";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()) {
    	 die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    	}
    	else {
            
            $SELECT = "SELECT Sid From staff  Where Sid= ? ";
            $stmt = $conn->prepare($SELECT);
         $stmt->bind_param("s", $Sid);   
         $stmt->execute();
         $stmt->store_result();

          $stmt->fetch();
         $rnum = $stmt->num_rows;
    
          if ($rnum==1) {

            $SELECT1 = "SELECT Bid From sales Where Bid= ? ";
            $SELECT2 = "SELECT Proid From inventory Where Proid= ? ";
            $INSERT = "INSERT Into sales (Date2, Bid, Sid,Proid, Quantity ) values(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($SELECT1);
            $stmt->bind_param("s", $Bid);	 
            $stmt->execute();
            $stmt->store_result();
            $stmt->fetch();
            $rnum1 = $stmt->num_rows;
        

            if ($rnum1==0) {
              $stmt->close();
              $stmt = $conn->prepare($SELECT2);
              $stmt->bind_param("s", $Proid1);  
              $stmt->execute();
              $stmt->store_result();
              $stmt->fetch();
              $rnum2 = $stmt->num_rows;
        

              if ($rnum2==1) {
               /* $stmt->close(); 
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssi", $Date2, $Bid, $Sid, $Proid1, $Quantity, $Rate);
       	        $a=$stmt->execute();
                $stmt->store_result();*/
              
               
                //if($a){
                   $SELECT3 = "SELECT Quantity From inventory Where Proid='$Proid1' ";
                   $stmt->close();
                   $query=mysqli_query($conn,$SELECT3);
                   //while ($res=mysqli_fetch_array($query)) {
                   $res=mysqli_fetch_array($query);
                   //echo $res['Quantity'];
                   $b=$res['Quantity']-$Quantity;
                   //echo $b;

                   if($b >=0){
                      //$stmt->close(); 
                      $stmt = $conn->prepare($INSERT);
                      $stmt->bind_param("sssss", $Date2, $Bid, $Sid, $Proid1, $Quantity);
                      $a=$stmt->execute();
                      $stmt->store_result();
                      if($a){
                          $UPDATE = "UPDATE inventory SET Quantity='$b' where Proid='$Proid1' ";
                          $stmt = $conn->prepare($UPDATE);
                          $stmt->execute();
                          echo "Successfull.";
                      }else{
                          echo "Unsuccessfull.";
                      }
                  }else {
                    echo "Out Of Stock!!";
                   }
                /*}else {
                        echo "..";
                   }*/


    	       }else {
    		        echo "Invalid Product Id.";
        	   }
           } 

           else{
                echo " Bill Id is Already used.";
            }

        }else{
            echo "Invalid Staff Id.";
          }
    }
    	 //$stmt->close();
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
          <a href="sales.html">
              <button  type="submit" name="button">Back</button>
          </a>
       </div> 
</body>
</html>

