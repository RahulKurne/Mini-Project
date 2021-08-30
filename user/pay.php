<?php 
include "connection.php";
session_start();



 ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard-CDT </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity=
        "sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        
            
        <style>
           
        </style>
    </head>

    <body>

<!-------------------------------------------------------input form-----------------------------------------------------------> 
<div class="container" style="text-align:center;">
  <h2>Payment</h2>
    <?php
    require 'connection.php';
    $ud=$_SESSION['id'];
    $n=$_SESSION['num'];

    $un=$_SESSION['username'];
   
   

    
    $query="SELECT name,price,quantity from u_ord where u_id=$ud and setord=$n";
    // $query="SELECT userdata.username, u_ord.name, u_ord.dmy from (userdata,u_ord)where userdata.u_id=u_ord.u_id and u_ord.dmy=$d1" ;
      $data=mysqli_query($con,$query); 
      ?>   
 <div class="container">
   Name:<?php echo $un;?>
  <table class="table table-striped">
    <tr>
      
   <th>Menu</th>
          <th>Quantity</th>
          <th>Price</th>

     
    </tr>


<?php
        while ($result=mysqli_fetch_assoc($data))
         {   
         
        
          
          
         echo "<tr>

           <td>".$result['name']."</td>
           <td>".$result['quantity']."</td>
           <td>".$result['price']."</td>
          
           
           </tr>";
}
?>
</table>
</div>

  <form action="" method="POST">
    
    <div class="form-group">
      <label for="total">Total:<?php $tp=$_SESSION['tp']; echo" $tp";?></label><br>
    <?php
$tp=$_SESSION['tp'];

if(isset($_POST['apply']) && isset($_SESSION['tp'])) 
{
  $code=$_POST['offer'];
$cd=0;
  $query="SELECT Percentage from offer where code='$code'";
 $data=mysqli_query($con,$query);            
  while ($result=mysqli_fetch_assoc($data))
   {      
     $cd=$result['Percentage'];
      //echo $cd;
   }

   if($cd!=0 && $cd!="")
   {
     $td=($cd/100)*$tp;
      $gt=$tp-$td;

     echo "Discount(in Rs.)".$td."<br>";
      echo "Grand Total(in Rs.)".$gt;

   }
   else
    echo '<script>alert("Please check the code")</script>';
 

}
// $_SESSION["gt"]="$gt";   
?>
    </div>
    <br>

  <div class="form-group">

      <input type="text"  id="offer" placeholder="offer_code" name="offer" value="0">
    <input type="submit" class="btn btn-success" name="apply" value="apply">
    </div>
 
    <input type="submit" class="btn btn-primary" name="submit" value="Pay">
  </form>
</div>
 

<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>

  
</body>
</html>



<?php

$tp=$_SESSION['tp'];

if(isset($_POST['submit']) && isset($_SESSION['username'])) 
{

 $un=$_SESSION['username'];






    if ($un!="")
     {

       $query="INSERT INTO payment (unm,total) VALUES ('$un','$tp')";
      $data=mysqli_query($con, $query);

      if($data)
      {
          header("Location:token.php");
          

      }

       

     } 

     else

     {

        echo " <script>alert('Please Pay First')</script>";

     }

}

?>
