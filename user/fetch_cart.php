<?php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
    <div class="table-responsive" id="order_table">
        <table class="table table-bordered table-striped">
            <tr>
                <th style="width:40%">Product Name</th>
                <th style="width:10%">Quantity</th>
                <th style="width:20%">Price</th>
                <th style="width:15%">Total</th>
                <th style="width:5%">Action</th>
            </tr>
';

if(!empty($_SESSION["shopping_cart"]))
{
    foreach($_SESSION["shopping_cart"] as $key => $values)
    {
        $output .= '
            <tr>
                <td>'.$values["product_name"].'</td>
                <td>'.$values["product_quantity"].'</td>
                <td style="text-align:right">Rs: '.$values["product_price"].'</td>
                <td style="text-align:right">Rs: '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>
                <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></td>
            </tr>
        ';
        $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
        
        $total_item = $total_item + 1;
    }
    
    $output .= '
        <tr>
            <td colspan="3" style="text-align:right;">Total</td>
            <td style="text-align:right;">Rs: '.number_format($total_price, 2).'</td>
            <td></td>
        </tr>
    ';
}
else
{
    $output .= '
        <tr>
            <td colspan="5" style="text-align:center">
                Your Cart Is Empty !
            </td>
        </tr>
    ';
}
$_SESSION['tp']=$total_price;
$output .= '</table></div>';

$data = array(
    'cart_details' => $output,
    'total_price' => '$' .number_format($total_price, 2),
    'total_item' => $total_item
);

echo json_encode($data);
?>