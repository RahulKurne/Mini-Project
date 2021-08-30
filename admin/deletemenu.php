<?php
include("connection.php");
$mid=$_GET['rn'];
$query="DELETE from menu WHERE m_id='$mid'";
$data= mysqli_query($con,$query);

if ($data)
 {
	echo "<script>alert('menu deleted')</script>";
	header('location:adminmenu.php');
	
}

else
{
	echo "<script>alert('Failed to delete')</script>";
}

  ?>