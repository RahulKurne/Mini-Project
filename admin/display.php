<?php
include("connection.php");
$query="SELECT * from menu";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);
if ($total!=0)
 {

 	?>

 	<TABLE border='10px'>
 		<tr>
 			<th>Menu Name</th>
 			<th> Description</th>
 			<th>Price</th>
 		</tr>

 	

 	<?Php
	while ($result=mysqli_fetch_assoc($data))
	 {   
	 	echo "<tr>
 			<td>".$result['name']."</td>
 			<td>".$result['description']."</td>
 			<td>".$result['price']."</td>
 		</tr>";
		
	}
	
}
else
{
	echo "<script>alert('No Records Found')</script>";
}
?>
       </TABLE>