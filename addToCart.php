<?php
include("db_conn.php");
// will check if the button for the item is pressed
// if it is, add that to the cart database and go to cart
if(isset($_GET['Glock17'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('Glock17', '350', 'Handguns')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['XDS'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('XDS', '250', 'Handguns')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['MPShield'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('MPShield', '980', 'Handguns')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['M16'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('M16', '1600', 'AssaultRifles')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['AK-47'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('AK-47', '4500', 'AssaultRifles')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['M4'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('M4', '3600', 'AssaultRifles')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Spas-12'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('Spas-12', '7500', 'Shotguns')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Benelli'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('Benelli', '990', 'Shotguns')");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Beretta391'])){
    $result = $mysqli -> query("INSERT INTO tb_cart (description, item_price, category) VALUES ('Beretta391', '9000', 'Shotguns')");
    header("Location: shoppingCart.php");
}
?>