<?php
include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ND's Kitchen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    div.parallax {
     background-image: url("image/dish_2.jpg");
     background-attachment: fixed;
     height: 370px;
     background-repeat: no-repeat;
     background-position: center;
     background-size: cover;
     width: 100%;
     }
     div.parallax_head {
     background: #000;
     opacity: 0.8;
     color: #fff;
     text-align: center;
     height: 370px;
     padding: 10px;
     }
     div.parallax_head h2 {
     margin-top: 150px;
     font-family: lucida handwriting;
     text-transform: capitalize;
     font-size: 35px;
 }
 
 div.parallax_head h3 {
     font-size: 40px;
     font-family: sans-serif;
     font-weight: 200;
 }
 
 
   </style>
</head>
<body>
<!---------------------------------------------- Navigation Bar------------------------------------------------------->  
<header>
<nav class="navbar navbar-expand-sm bg-danger navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>  
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">ND's Kitchen</a>
  
        <!-- Links -->
        <div class="collapse navbar-collapse" id="collapse_target">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="offerzone.php">Offer Zone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Login</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="logout.php">LogOut</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>
<!----------------------------------------------------------------------------------------------------------------------------------->
<div class="parallax">
	
	<div class="parallax_head">
		
		<h2>Discover</h2>
		<h3>TODAY'S OFFER</h3>
		
	</div>
	
</div>
<!---------------------------------------------------------------------------------------------------------------------------------->

<?php

$query="SELECT * from offer";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);
if ($total!=0)
 {

  ?>

  <div class="container" style="text-align:center;">
  <TABLE class="table ">
    <tr>
      
     
      <th> Special Offer</th>
      
    </tr>
  

  <?Php

  while ($result=mysqli_fetch_assoc($data))
   {  

    echo "<tr>
      

      <td align='center'><img src='".$result['offerimage']."'height='500' width='400'/></td>
      
      
      

      
    </tr>";
    
  }
  
}
else
{
  echo "<script>alert('No Records Found')</script>";
}
?>
       </TABLE>
     </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------->	 
<div class="jumbotron text-center" style="margin-bottom:0; margin-top:30px">
    <div class="row">
        <div class="col-md-6">
			<h3>LOCATION</h3>
            <p>Buk New Site, New Campus</p>
            <p>Kano State</p>
        </div>
        <div class="col-md-6">
            <h3>CONTACT</h3>
            <p>08054645432, 07086898709</p>
            <p>Website@gmail.com</p>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
		<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png"  /></a>
		<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png"  /></a>
    </div>
  </div>
</body>
</html>