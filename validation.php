<?php
session_start();



$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'signup');

        $rid= $_POST['username'];
        $rp= $_POST['password'];
        $pass= md5($rp);

		$s = "select * from userdata where username = '$rid' && pwd = '$pass'";
		$result= mysqli_query($con, $s);

		$num= mysqli_num_rows($result);

		if ($num == 1) {
			$_SESSION['username']= $rid;
		 	header('location:home.php');
		 } 
		else
		{
			header('location:signup.php');			
			
		}
?>