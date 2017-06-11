<?php
include("db_conn.php");
//include("session.php");
// goes through the page and looks at page 'remove from cart'
// if pressed, removes the item from cart
if(isset($_GET['Glock17'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'Glock17'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['XDS'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'XDS'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['MPShield'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'MPShield'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['M16'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'M16'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['AK-47'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'AK-47'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['M4'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'M4'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Spas-12'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'Spas-12'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Benelli'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'Benelli'");
    header("Location: shoppingCart.php");
}
if(isset($_GET['Beretta391'])){
    $result = $mysqli -> query("DELETE FROM tb_cart WHERE description = 'Beretta391'");
    header("Location: shoppingCart.php");
}
// this counts the total amount of each item
$g1 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'Glock17'");
$Glock172 = $g1->num_rows;
$xd1 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'XDS'");
$XDS2 = $xd1->num_rows;
$sh1 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'MPShield'");
$MPShield2 = $sh1->num_rows;
$m11 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'M16'");
$M162 = $m11->num_rows;
$ak = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'AK-47'");
$AK472 = $ak->num_rows;
$m4 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'M4'");
$m42 = $m4->num_rows;
$spas1 = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'Spas-12'");
$Spas122 = $spas1->num_rows;
$ben = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'Benelli'");
$Benelli2 = $ben->num_rows;
$ber = $mysqli -> query("SELECT * FROM tb_cart WHERE description = 'Beretta391'");
$Beretta3912 = $ber->num_rows;
// show the total price and checkout button
$firstTot = $mysqli->query("SELECT item_price FROM tb_cart");
$rowTot = $firstTot->num_rows;
$total = 0;
if($rowTot>0){
	while($finTot = mysqli_fetch_array($firstTot)){
		$total += $finTot['item_price'];
	}	
} else {
	$total = 0;
}
echo "<div id='checkmeout'><form method='GET' action=''><input type='submit' name='checkmebutt' value='Check Out' style='width: auto;'></form></div><div id='price'><strong>Total:$$total</strong></div>";
?>