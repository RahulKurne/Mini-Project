<?php
include("connection.php");
$mid=$_GET['rn'];
$nm= $_GET['nm'];
$desc=$_GET['desc'];
$prs=$_GET['prs'];
$mimg=$_GET['mimg'];
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
<!----------------------------------------------------------------header---------------------------------------------------------------->
      
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
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
                          <a class="nav-link" href="#">Dashboard</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="adminmenu.php">Menu</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Offer Zone</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Sales</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Login</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  <br><br><br>
<!-------------------------------------------------------input form-----------------------------------------------------------> 
<div class="container">
  <h2>Menu form</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Dish Name" name="name" value="<?php echo "$nm"?>">
    </div>
    <div class="form-group">
      <label for="des">Description:</label>
      <input type="text" class="form-control" id="des" placeholder="description" name="des" value="<?php echo "$desc"?>">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" placeholder="price" name="price" value="<?php echo "$prs"?>">
    </div>
    <br>

    <div class="custom-file mb-3">
      
      <input type="file" class="custom-file-input" id="customFile" name="ufilename" value="<?php echo "$mimg"?>">
      <label class="custom-file-label" for="customFile">Upload image</label>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Update menu">
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

if (isset($_POST['submit']))
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

       $query="UPDATE menu SET name='$name',description='$des', price= '$price', menuimage='$folder' WHERE m_id=$mid";
      $data=mysqli_query($con, $query);

      if($data)
      {
         echo " <script>alert('Data Updated Successfully')</script>";
         header('location:adminmenu.php');

      }

       

     } 

     else

     {

        echo " <script>alert('Failed to update')</script>";

     }

}


?>