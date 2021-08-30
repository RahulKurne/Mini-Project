<?php

session_start();
include("connection.php");

if(isset($_POST['action']))
{
    if($_POST["action"] == "add")
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $is_available = 0;
            foreach($_SESSION["shopping_cart"] as $key => $values)
            {
                if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST["product_id"])
                {
                    $is_available++;
                    $_SESSION["shopping_cart"][$key]['product_quantity'] = $_SESSION["shopping_cart"][$key]['product_quantity'] + $_POST["product_quantity"];
                }
            }
            if($is_available == 0)
            {
                $item_array = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_quantity' => $_POST['product_quantity']
                );
                $_SESSION["shopping_cart"][] = $item_array;
            }
        }
        else
        {
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_quantity' => $_POST['product_quantity']
            );
            $_SESSION["shopping_cart"][] = $item_array;
        }
    }

    if($_POST["action"] == "remove")
    {
        foreach($_SESSION["shopping_cart"] as $key => $values)
        {
            if($values["product_id"] == $_POST["product_id"])
            {
                unset($_SESSION["shopping_cart"][$key]);
            }
        }
    }

    if($_POST["action"] == "empty")
    {
        unset($_SESSION["shopping_cart"]);
    }

    $query="SELECT setord FROM u_ord ORDER BY token_id DESC LIMIT 1";
    $data=mysqli_query($con,$query);            
    while ($result=mysqli_fetch_assoc($data))
     {      
        $n=$result['setord'];
     }
     if($n==0){
        $n=1;
     }

   // $_SESSION['username'] = 'a';
    if($_POST["action"] == "check_out")
    {
        $status_array = "";
        $login = '0';
        if($_SESSION['username'] != "")
        {
            $login = '1';
            $nm = $_SESSION['username'];
            $mail=$_SESSION['id'];
        
            $_SESSION['num']=$n+1;
            $n=$_SESSION['num'];
            $status = '0';
            if(isset($_SESSION["shopping_cart"]))
            {
                foreach($_SESSION["shopping_cart"] as $key => $values)
                {
                    $id = $_SESSION["shopping_cart"][$key]['product_id'];
                    $name = $_SESSION["shopping_cart"][$key]['product_name'];
                    $price = $_SESSION["shopping_cart"][$key]['product_price'];
                    $quantity = $_SESSION["shopping_cart"][$key]['product_quantity'];
                    $da=date("d/m/y");


                    $qry = mysqli_query($con,"INSERT INTO u_ord VALUES('','$id','$mail','$name',' $price','$quantity','$nm','pending','$da','$n')");
                    if($qry)
                    {
                        $status = '1';


                    }
                }
            }
            $status_array = array(
                    'login' => $login
                );
            $status_array = array(
                    'status' => $status
                );
            echo json_encode($status_array);
            //unset($_SESSION["shopping_cart"]);
        }
        if($_SESSION['username'] == "")
        {
            $status_array = array(
                    'login' => $login
                );
            $status_array = array(
                    'status' => $status
                );
            echo json_encode($status_array);
        }
    }
}

?>