
<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color:grey;
                height:100%;
            }

            .mx-auto{
                max-width:25rem;
                margin-left: auto;
                margin-right: auto;
            }
            
        </style>
    
    
    
    </head>

    <body>
        <div class="container">
            <div class="card mx-auto mt-5">
                <div class="card-header">Admin Login</div>
                <div class="card-body">
				<form action="login.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
     		    <p class="error"><?php echo $_GET['error']; ?></p>
     	        <?php } ?>
					<div class="input-group">
                          <input type="text" class="form-control input-lg " placeholder="Username" name="uname">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                      </div>
                      <br>
                      <div class="input-group">
                          <input type="password" class="form-control input-lg" placeholder="Password" name="password">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary btn-lg btn-block bg-dark">Login</a><br>
                 
                  </form>
                </div> 
                
              </div>
        </div>
    </body>
</html>