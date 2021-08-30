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
              <a class="navbar-brand" href="admindash.html">ND's Kitchen</a>
        
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
                          <a class="nav-link" href="logout.php">Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <br><br>
<!------------------------------------------------------------------------------------------------------------------------------------->
    
    </body>
</html>
 <!-- ..............DISPLAYING DATA FROM DATABASE......... -->

<h1 align="center">Order</h1>
<?php
//$md=$_SESSION['mailid'];
//$dd=SELECT date(d/m/y);
$i=$_SESSION['id'];
$query="SELECT * from u_ord GROUP By setord DESC" ;
//$q="SELECT mail_id,mob,address from userdata where u_id=$i";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);
if ($total!=0)
 {

  ?>

  <div class="container">
  <TABLE class="table table-striped">
    <tr>
     <th>Token No.</th>      
     <!--  <th>uid</th> -->
      <th>Date</th>
     <th>User Name</th> 

      <th colspan="2" align="center">Operations</th>
    </tr>
  

  <?Php

  while ($result=mysqli_fetch_assoc($data))
   {   
  
    echo "<tr>
      
      <td>".$result['setord']."</td>
      
      <td>".$result['dmy']."</td>

      <td>".$result['username']."</td>

      <td><a href = 'vieworder.php?rn=$result[setord] & nm=$result[name] & desc=$result[quantity] & prs=$result[username] & st=$result[status]'><input type='submit' value='View Order..'class='btn btn-warning'></td>
      
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



<?php 
}else{
     header("Location: adminlogin.php");
     exit();
}
 ?>