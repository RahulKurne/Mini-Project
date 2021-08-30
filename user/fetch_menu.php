<?php

include("connection.php");
$output = "";
$res = mysqli_query($con,"SELECT * FROM menu");
while($row = mysqli_fetch_array($res))
{
    $output .= '
        <div class="col-md-3" style="margin-top:20px">
            <div style="border:1px solid black;border-radius:5px;padding:15px;height:400px;text-align:center;">
                <img src="'.$row['menuimage'].'"height="180" width="200"/>
                <h4 class="text-info">'.$row["name"].'</h4>
                <h5 class="text-dark">'.$row["description"].'</h5>
                <h4 class="text-info">Rs. '.$row["price"].'</h4>
                
                <input type="text" name="quantity" id="quantity'.$row["m_id"].'" class="form-control" value="1" autocomplete="off">
                <input type="hidden" name="hidden_name" id="name'.$row["m_id"].'" value="'.$row["name"].'">
                <input type="hidden" name="hidden_name" id="description'.$row["m_id"].'" value="'.$row["description"].'">
                <input type="hidden" name="hidden_price" id="price'.$row["m_id"].'" value="'.$row["price"].'">

                <input type="button" name="add_to_cart" id="'.$row["m_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart">
            </div>
        </div>
    ';
}
echo $output;
?>