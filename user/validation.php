<?php
session_start();



$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'signup');

        $rid= $_POST['username'];
        $rp= $_POST['password'];
        $pass= md5($rp);

		$s = "select * from userdata where username = '$rid' && pwd = '$pass'";
		$result= mysqli_query($con, $s);

		//$num= mysqli_num_rows($result);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $rid && $row['pwd'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['mailid'] = $row['mail_id'];
            	$_SESSION['id'] = $row['u_id'];
            	header("Location: menu.php");
		        exit();
		 } 
		}
		else
		{
			header('location:signup.php');			
			
		}
?>