<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sanket's Kitchen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity=
        "sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 
  <style>
      *{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
        .hero
		{
			height: 100%;
			width: 100%;
			background-color: white;
			background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1));
			background-position: center;
			background-size: cover;
			position: absolute;

		}
        .form-box
		{

			background:#fff;
            text-align:center;
			max-width: 380px;
			height: 550px;
			border-radius: 20px;
			margin: auto;
			box-sizing: border-box;
			padding: 5px;
			color: #999;
			margin-top: 100px;
            position: relative;
            overflow: hidden;
		}
        .button-box
		{
			max-width: 220px;
			margin: 35px auto;
			position: relative;
			box-shadow: 0 0 20px 9px #ff31241f;
			border-radius: 30px;
		}	
        
        .tog-btn
		{
			padding: 10px;
            line-height: 200%;
			cursor: pointer;
			background: transparent;
			border: 0;
			outline: none;
			position: relative;
		}
        #btn
		{
			top: 0;
			left: 0;
			position:absolute;
			width: 110px;
			height: 100%;
			background: linear-gradient(to right, #ff105f,#ffad06);
			border-radius: 30px;
			transition: 0.5s;
            text-align: center;
		}
        .input-group
		{
			top: 150px;
			position: absolute;
			width: 280px;
		    transition: 0.5s;
		}
        .input-group1{
            top: 100px;
			position: absolute;
			width: 280px;
		    transition: 0.5s;
        }
        .input-field
		{
			width: 100%;
			padding: 10px ;
			margin: 5px ;
			border-left: 0;
			border-top: 0;
			border-right: 0;
			border-bottom: 1px solid #999;
			outline: none;
			background: transparent;
		}
        .submit-btn
		{
			width: 85%;
			padding: 10px 30px;
			cursor: pointer;
			display: block;
			margin: auto;
			background: linear-gradient(to right, #ff105f,#ffad06);
			border:0;
			outline: none;
			border-radius: 30px;
		}
        .check-box
		{
			margin: 10px;
		}
		#login
		{
			left: 50px;

		}

		#register
		{
			left: 450px;
		}


      
  </style>
</head>
<body>
<!---------------------------------------------- Navigation Bar-------------------------------------------------------> 
<nav class="navbar navbar-expand-sm bg-danger navbar-dark fixed-top">
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Offer Zone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<!----------------------------------------------------------login page-------------------------------------------------------------->
<div class = "hero">
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <span style="color:black;" class="tog-btn" onclick="login()">Log In</span>				
            <span style="color:black;" class="tog-btn" onclick="register()">Register</span>

        </div>

            

        <form id="login" class="input-group" method="POST" action="validation.php">
            <input type="text" class="input-field" name="username" placeholder="username" required>
            <input type="password" class="input-field" name="password " placeholder="Password" require>
            <input type="checkbox" class="check-box" name="chb_urempwd"><span>Remember Password</span>
            <button type="Submit" class="submit-btn" name="btn_login">Log In </button>
            
        </form>


         <form id="register" class="input-group1" method="POST" action="registration.php">
            <input type="text" class="input-field" name="txt_username" placeholder="username.." required>
            <input type="password" class="input-field" name="txt_regpwd " placeholder="Password.." required>
            
            <input type="email" class="input-field" name="txt_regemail" placeholder="E-Mail Id.." required>
            <textarea placeholder="Address" class="input-field" required name="txt_regadd"></textarea>
            <input type="number" class="input-field" name="txt_regmob" placeholder="mob no.." required>
            <input type="Checkbox" class="check-box" name="chb_regrempwd"><span>I agree to the terms & conditions.</span>
            <button type="Submit" class="submit-btn" name="btn_reg">Register </button>
            
        </form>
    </div>
</div>

<script type="text/javascript">
    var x= document.getElementById("login");
    var y= document.getElementById("register");
    var z= document.getElementById("btn");
    
    function register(){
        x.style.left="-400px";
        y.style.left="50px";
        z.style.left="110px";
    
    }
    
    function login(){
        x.style.left="50px";
        y.style.left="450px";
        z.style.left="0px";
    
    }
    
    
    </script>
    </body>
    </html>