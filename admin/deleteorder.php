<?php
include("connection.php");
$tokenid=$_GET['rn'];
$query="DELETE from u_ord WHERE token_id='$tokenid'";
$data= mysqli_query($con,$query);

if ($data)
 {
	echo "<script>alert('menu deleted')</script>";
	header('location:admindash.php');
	
}

else
{
	echo "<script>alert('Failed to delete')</script>";
}

  ?>