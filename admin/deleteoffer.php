<?php
include("connection.php");
$mid=$_GET['rn'];
$query="DELETE from offer WHERE id='$mid'";
$data= mysqli_query($con,$query);

if ($data)
 {
	echo "<script>alert('Offer deleted')</script>";
	header('location:adminoffer.php');
	
}

else
{
	echo "<script>alert('Failed to delete')</script>";
}

  ?>