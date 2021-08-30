<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sanket's Kitchen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    .carousel-inner img {
    width: 100%;
    height: 100%;
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    padding: 0 4px;
  }
  
  /* Create four equal columns that sits next to each other */
  .column {
    flex: 25%;
    max-width: 33.3%;
    padding: 0 4px;
  }
  
  .column img {
    margin-top: 8px;
    vertical-align: middle;
    width: 100%;
    filter: grayscale(1) brightness(0.5);
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s linear;
  }
  .column img:hover {
    filter: grayscale(0);
  }
  @media screen and (max-width: 800px) {
    .column {
      flex: 50%;
      max-width: 50%;
    }
  }
  
  /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .column {
      flex: 100%;
      max-width: 100%;
    }
    .column img {
      filter: grayscale(0) brightness(1);
    }
  }

  html {
    box-sizing: border-box;
  }
  
  *, *:before, *:after {
    box-sizing: inherit;
  }
  
  .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
  }
  
  @media screen and (max-width: 650px) {
    .column {
      width: 100%;
      display: block;
    }
  }
  
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }
  
  .container {
    padding: 0 16px;
  }
  
  .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
  }
  
  .title {
    color: grey;
  }
  
  .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
  }
  
  .button:hover {
    background-color: #555;
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
        <a class="navbar-brand" href="index.php">Sanket's Kitchen</a>
  
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
                    <a class="nav-link" href="signup.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!----------------------------------------------------Slideshow------------------------------------------------------------->
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/FoodPics/1.jpg" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div> 
        </div>
        <div class="carousel-item">
            <img src="image/FoodPics/2.jpg" alt="Chicago" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img src="image/FoodPics/3.jpg" alt="New York" width="1100" height="500">
            <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
            </div>   
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<!------------------------------------------------------About Us---------------------------------------------------------------->
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-lg-4">
            <h1>About Us</h1>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, 
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco.</p>
        </div>
        <div class="col-sm-8">
            <img src="image/FoodPics/7.jpg" alt="New York" width="800" height="500">
        </div>
    </div>
</div>

<!---------------------------------------------------------Image Gallery------------------------------------------------------>

<div class="jumbotron text-center" style="margin-top:30px">
        
        <h1>IMAGE GALLERY</h1>
        
</div>
<div class="container">   
    <div class="row">
      <div class="column">
        <img src="image/Gallery/dish.jpg" />
        <img src="image/Gallery/dish_2.jpg" />
        <img src="image/Gallery/dish_3.jpg" />
      </div>
      <div class="column">
        <img src="image/Gallery/dish_6.jpg" />
        <img src="image/Gallery/dish_7.jpg" />
        <img src="image/Gallery/dish_8.jpg" />
      </div>
      <div class="column">
        <img src="image/Gallery/dish_4.jpg" />
        <img src="image/Gallery/dish_5.jpg" />
        <img src="image/Gallery/dish_9.jpg" />
      </div>
      <div class="column">
        <img src="image/Gallery/dish_4.jpg" />
        <img src="image/Gallery/dish_5.jpg" />
        <img src="image/Gallery/dish_9.jpg" />
      </div>
    </div>
</div>

<!-----------------------------------------------------Meet The Team------------------------------------------------------>
<div class="jumbotron text-center" style="margin-top:30px">
<h1>Meet The Team </h1>
</div>
<div class="container" style="margin-top:30px">
<div class="row">
  <div class="column">
    <div class="card">
      <img src="image/team/01.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image/team/02.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Mike Ross</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
        
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="image/team/03.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image/team/03.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
      </div>
    </div>
  </div>
</div>
</div>

<!------------------------------------------------Footer---------------------------------------------------------------------->
<div class="jumbotron text-center" style="margin-bottom:0; margin-top:30px">
    <div class="row">
        <div class="col-md-6">
			<h3>LOCATION</h3>
            <p>Buk New Site, New Campus</p>
            <p>Kano State</p>
        </div>
        <div class="col-md-6">
            <h3>CONTACT</h3>
            <p>08054645432, 07086898709</p>
            <p>Website@gmail.com</p>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
		<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png"  /></a>
		<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png"  /></a>
    </div>
  </div>
</body>
</html>
