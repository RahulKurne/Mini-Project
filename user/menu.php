
<?php
include("connection.php");

?>



<!DOCTYPE html>
<html lang="en">
    <head>
		 <title>ND's Kitchen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		 
   <title>Sanket's Kitchen</title>
   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



        
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
        
       <style>
   div.parallax {
  background-image: url("image/dish_2.jpg");
  background-attachment: fixed;
  height: 370px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  width: 100%;
    }
    div.parallax_head {
  background: #000;
  opacity: 0.8;
  color: #fff;
  text-align: center;
  height: 370px;
  padding: 10px;
    }
    div.parallax_head h2 {
  margin-top: 150px;
  font-family: lucida handwriting;
  text-transform: capitalize;
  font-size: 35px;
}

div.parallax_head h3 {
  font-size: 40px;
  font-family: sans-serif;
  font-weight: 200;
}


  </style>
    </head>
       
    <body>      
<!---------------------------------------------- Navigation Bar------------------------------------------------------->  
<nav class="navbar navbar-expand-sm bg-danger navbar-dark navbar-fixed-top"  >
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>  
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php">ND's Kitchen</a>
  
        <!-- Links -->
        <div class="collapse navbar-collapse" id="collapse_target" >
            <ul class="navbar-nav navbar-right ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="offerzone.php">Offer Zone</a>
                </li>
				<li>
						<a id="cart-popover" class="nav-link" data-placement="bottom" title="Shopping Cart">
							<span class="fas fa-shopping-cart"></span>
							<span class="badge badge-secondary"></span>
							<span class="total_price">$0.00</span>
						</a>
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!----------------------------------------------------Slideshow------------------------------------------------------------->
<div class="parallax" >
  
  <div class="parallax_head">
    
    <h2>Discover</h2>
    <h3>FOOD MENU</h3>
    
  </div>
  
</div>

<!-- ..............DISPLAYING DATA FROM DATABASE......... -->


 <div id="popover_content_wrapper" style="display:none;">
            <span id="cart_details"></span>
            <div style="text-align:right;">
                <a href="#" class="btn btn-primary" id="check_out_cart">
                    <span class="fas fa-shopping-cart"></span>
                    Check Out
                </a>
                <a href="#" class="btn btn-default" id="clear_cart">
                    <span class="fas fa-trash"></span>
                    Clear
                </a>
            </div>
        </div>

        <div id="display_item">

        </div>
             <!-- script -->
        <script>
            $(document).ready(function(){
                load_product();
                load_cart_data();
                

                function load_product()
                {
                    $.ajax({
                        url:"fetch_menu.php",
                        method:"POST",
                        success:function(data)
                        {
                            $("#display_item").html(data);
                        }
                    });
                }

                function load_cart_data()
                {
                    $.ajax({
                        url:"fetch_cart.php",
                        method:"POST",
                        dataType:"json",
                        success:function(data)
                        {
                            $("#cart_details").html(data.cart_details);
                            $(".total_price").text(data.total_price);
                            $(".badge").text(data.total_item);
                        }
                    });
                }
              


    


                $("#cart-popover").popover({
                    html : true,
                    container : 'body',
                    content:function(){
                        return $('#popover_content_wrapper').html();
                    }
                });

                $(document).on('click','.add_to_cart', function(){
                    var product_id = $(this).attr("id");
                    var product_name = $('#name'+product_id).val();
                    var product_price = $('#price'+product_id).val();
                    var product_quantity = $('#quantity'+product_id).val();
                    var action = "add";

                    if(product_quantity > 0)
                    {
                        $.ajax({
                            url:"action.php",
                            method:"POST",
                            data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
                            success:function()
                            {
                                load_cart_data();
                            }
                        });
                    }
                    else
                    {
                        alert("Please enter number of quantity");
                    }
                });

                $(document).on('click','.delete',function(){
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    if(confirm("Are you sure to remove this product ?"))
                    {
                        $.ajax({
                            url:"action.php",
                            method:"POST",
                            data:{product_id:product_id, action:action},
                            success:function()
                            {
                                load_cart_data();
                                $('#cart-popover').popover('hide');
                            }
                        });
                    }
                });
                
                $(document).on('click','#clear_cart',function(){
                    var action = "empty";
                    $.ajax({
                        url:"action.php",
                        method:"POST",
                        data:{action:action},
                        success:function()
                        {
                            load_cart_data();
                            $('#cart-popover').popover('hide');
                        }
                    });
                });

                $(document).on('click','#check_out_cart',function(){
                    var action = "check_out";
                    $.ajax({
                        url:"action.php",
                        method:"POST",
                        dataType:"json",
                        data:{action:action},
                        success:function(response)
                        {
                            console.log(response);
                            load_cart_data();
                            $('#cart-popover').popover('hide');
                            if(response['login'] == '0')
                            {
                                window.location.href = "signup.php";
                            }
                            if(response['status'] == '0')
                            {
                                alert("Please select any product");
                            }
                            if(response['status'] == '1')
                            {
                                window.location.href = "pay.php";
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>
