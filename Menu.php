<!DOCTYPE html>
<html lang = en>
<h1>Menu For Reyes' Lazy Cafe <br></h1>
<form method="POST" action="">

<?php

$menu=array(
    "Main Dish"=>array("Pastas"=>array("Spaghetti" => 180, "Carbonara" => 200, "Lasagna" => 165), 
                        "Meat"=>array("Beef Steak" => 239, "Grilled Porkchop" => 239, "Fried Chicken" => 189),
                        "Burgers" =>array("Quarter pounder" => 189, "Cheese Burger" => 199, "Chicken Burger" => 189)
                      ),

    "Drinks" => array("Coffee"=>array("Espresso" => 109, "Spanish Latte" => 129, "Black Coffee" => 99), 
                      "Tea"=> array("Jasmine Tea" => 99, "Oolong Tea" => 119, "Green Tea" => 139), 
                      "Milktea"=>array("Wintermelon" => 149,"Okinawa" => 149,"Salted Caramel" => 169)
                     ),

    "Dessert" => array("Cake"=>array("Red velvet Cake" => 239, "Strawberry cake" => 229,"Dark Chocolate Cake " =>  229), 
                       "Ice Cream" => array("Oreo Delight" => 199, "Sundae(Vanilla/Strawberry/Chocolate)" => 139, "Banana Split" => 249),
                       "Pastry"=>array("French Toast" =>  199,"Churros" => 209,"Chocolate chip cookies" => 89)
                      )
            );

    foreach($menu as $category => $subcategory){
    echo "<b>$category</b> <br>";
        foreach($subcategory as $entreechoices => $SpecChoices){
            echo"&nbsp&nbsp&nbsp&nbsp&nbsp
                $entreechoices <br>";
            foreach($SpecChoices as $Plate => $price){
            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type='number' name='qty[$Plate]' min='1' style='width: 20px;'>
                $Plate - PHP $price <br>";
            }
        }
    }

?>
<br>
<input type="submit" value="Order">
</form>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$total = 0;
$SubPrice = 0;
$count = 0;
echo "<h1>---ORDER SUMMARY---</h1>";

foreach ($_POST['qty'] as $plate => $qty) {
    if ($qty > 0) { 
        foreach ($menu as $category) {
            foreach ($category as $section) {
                foreach ($section as $Plate => $price) {
                    if ($Plate == $plate) {
                            $SubPrice= $qty * $price;
                            echo "-  $qty $plate | PHP $SubPrice <br>";
                            $total+= $SubPrice;
                            $count += $qty;
                    }
                }
            }
        }
    }
}
echo "<br><h2>Total Orders: $count.</h2>";
echo "<h2>Total Price of your order is PHP $total. Please Pay at the counter!<br></h2>";
}
?>
