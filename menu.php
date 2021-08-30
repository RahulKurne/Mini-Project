
<?php
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
           .carousel-inner img 
           {
             width: 100%;
             height: 100%;
            }
        </style>
    </head>

    <body>      
<!---------------------------------------------- Navigation Bar------------------------------------------------------->  
<nav class="navbar navbar-expand-sm bg-danger navbar-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>  
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Sanket's Kitchen</a>
  
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
                    <a class="nav-link" href="#">Offer Zone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


</body>
</html>





<?php



if(isset($_POST['submit'])) 
{
  $name=$_POST['name'];
  $des=$_POST['des'];
  $price=$_POST['price'];

  $filename = $_FILES["ufilename"]["name"];
  $tempname=$_FILES["ufilename"]["tmp_name"];
  $folder="menuimages/".$filename;
  move_uploaded_file($tempname, $folder);






    if ($name!="" && $des!="" && $price!="" && $filename!="")
     {

       $query="INSERT INTO menu (name,description,price,menuimage) VALUES ('$name', '$des', '$price','$folder')";
      $data=mysqli_query($con, $query);

      if($data)
      {
         echo " <script>alert('Data Saved Successfully')</script>";

      }

       

     } 

     else

     {

        echo " <script>alert('All fields are required')</script>";

     }

}

?>



<!----------------------------------------------------Slideshow------------------------------------------------------------->
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/FoodPics/1.jpg" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div> 
        </div>
        <div class="carousel-item">
            <img src="image/FoodPics/2.jpg" alt="Chicago" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img src="image/FoodPics/3.jpg" alt="New York" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div>   
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>



<hr color=red width="80%" ><br>


<!-- ..............DISPLAYING DATA FROM DATABASE......... -->


<?php

$query="SELECT * from menu";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);
if ($total!=0)
 {

  ?>

  <div class="container">
  <TABLE class="table table-hover">
    <tr>
      
      <th>Menu Name</th>
      <th> Description</th>
      <th>Price</th>
      <th>Menu Image</th>
      <th colspan="2" align="center">Operations</th>
    </tr>
  

  <?Php
  while ($result=mysqli_fetch_assoc($data))
   {   
    echo "<tr>
      
      <td>".$result['name']."</td>
      <td>".$result['description']."</td>
      <td>".$result['price']."</td>
      <td><img src='".$result['menuimage']."'height='150' width='150'/></td>
         

      <td><a href = 'basket.php?fid=$result[m_id] & nm=$result[name] & desc=$result[description] & prs=$result[price] & mimg=$result[menuimage]'><input type='submit' value='Add to cart..'class='btn btn-warning'></td>

     
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



<script>
  function checkdelete()
  {
    return confirm ('Are you sure you want to delete this record..?');
  }
</script>






