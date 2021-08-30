
<?php
session_start();
include("connection.php");
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





<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>
  
</body>
</html>



	

	







<!-- ..............DISPLAYING DATA FROM DATABASE......... -->


<?php

$query="SELECT setord,username FROM u_ord ORDER BY setord DESC limit 1";
$n=$_SESSION['num'];

$data=mysqli_query($con,$query);

while($result=mysqli_fetch_assoc($data))
 {
$tkn= $result['setord'];
$usr= $result['username'];


}

?>


		<div class="container" style="text-align:center;">
		<h1><span class="s_summary" >Invoice</span></h1>

        <?php
    require 'connection.php';
    $ud=$_SESSION['id'];
    $n=$_SESSION['num'];

    $un=$_SESSION['username'];
    //echo $un;
    $d1=date('d/m/y');
    //echo $d1;

   

    echo "<br>";
    $query="SELECT name,price,quantity from u_ord where u_id=$ud and setord=$n ORDER by dmy ";
    // $query="SELECT userdata.username, u_ord.name, u_ord.dmy from (userdata,u_ord)where userdata.u_id=u_ord.u_id and u_ord.dmy=$d1" ;
         
      $data=mysqli_query($con,$query); 
?>   
 <div class="container">
  <div class="row">
      <div class="col-4 text-left text-uppercase">
      Name: <?php echo $un;?>
      </div>
        <div class="col-8 text-right">
          Date:<?php echo $d1;?>
          </div>
   </div>
  </div>  
<div class="container">
  <table class="table table-striped">
    <tr>
      
   <th>Menu</th>
          <th>Quantity</th>
          <th>Price</th>

     
    </tr>


<?php
$tp=$_SESSION['tp'];
//$gt=$_SESSION["gt"];

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
		<?php

//$gt=$_SESSION['g'];
    ?>
		<div class="order_holder">
			Total:<?php echo $tp?>
      <!-- Grand Total:<?php echo $gt?> -->
			<p class="summary_p">Thank you for your order <span class="text-uppercase font-weight-bold"> <?php echo $un; ?></span>. Your <span class="badge badge-pill badge-success text-uppercase"> Token number is: <?php echo $tkn; ?></span>. We will ensure that your order is delivered in time and we do hope that you continue patronizing us. Please it is important to take note that your order number should be kept safe</p>
			
		</div>
<a href="logout.php">Logout</a>
</div>
<!-- $total=mysqli_num_rows($data);
if ($total!=0 && isset($_SESSION['username']))

 {
 

 

  <div class="container">


  </div>

  

} -->

