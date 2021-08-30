<?php
session_start();
header('location:signup.php');


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'signup');

        $rid=$_POST['txt_username'];
		$rp=$_POST['txt_regpwd'];
		$rmail=$_POST['txt_regemail'];
		$radd=$_POST['txt_regadd'];
		$rmob=$_POST['txt_regmob'];
		$rpwd=md5($rp);


		$s = "select * from userdata where username = '$rid'";
		$result= mysqli_query($con, $s);

		$num= mysqli_num_rows($result);

		if ($num == 1) {
		 	echo "<script>alert('Username already taker..')</script>";
		 } 
		else
		{

			$reg="Insert INTO userdata (username, pwd, mail_id, address, mob) VALUES ('$rid', '$rpwd', '$rmail', '$radd', '$rmob')";
			mysqli_query($con, $reg);
			echo " <script>alert('Data Saved Successfully')</script>";
			
		}
?>