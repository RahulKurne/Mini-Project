<?php 
include "connection.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard-CDT student</title>
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
<!------------------------------------------------------------------------------------------------------------------------------------->
         <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
          <div class="container">
              <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                  <span class="navbar-toggler-icon"></span>
              </button>  
              <!-- Brand/logo -->
              <a class="navbar-brand" href="admindash.html">Sanket's Kitchen</a>
        
              <!-- Links -->
              <div class="collapse navbar-collapse" id="collapse_target">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                          <a class="nav-link" href="admindash.php">Dashboard</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="adminmenu.php">Menu</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="adminoffer.php">Offer Zone</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="adminsales.php">Sales</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="logout.php">Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <br><br><br>
<!--------------------------------------------------------------------------------------------------------------------------------->
<div class="container">
    <h2>Offer form</h2>
    <form method="post" action="" enctype='multipart/form-data'>
  <div class="custom-file mb-3">
      
      <input type="file" class="custom-file-input" id="customFile" name="ufilename">
      <label class="custom-file-label" for="customFile">Upload image</label>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Save Menu">
</form>
  
<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  </script>


    </body>
</html>

<?php
if(isset($_POST['submit'])) 
{
 $filename = $_FILES["ufilename"]["name"];
  $tempname=$_FILES["ufilename"]["tmp_name"];
  $folder="offerimages/".$filename;
  move_uploaded_file($tempname, $folder);
    if ($filename!="")
     {
       $query="INSERT INTO offer (offerimage) VALUES ('$folder')";
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
<?php 
}else{
     header("Location: adminlogin.php");
     exit();
}
 ?>

