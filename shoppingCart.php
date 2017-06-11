<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/cart.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<?php
	include("session.php");
	include("db_conn.php");
	include("removeFromCart.php");
	include("finishMe.php");
	$auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
	$authres=$mysqli->query($auth);
	$authrow=$authres->fetch_array(MYSQL_ASSOC);
	?>
    <header>
        <?php
        if($session_user==''){
            echo "<a href='signIn.php'><input type='button' name='Sign in' value='Sign in'></a>";
        } else {
            echo "<div class='name'>Welcome ".$session_user."</div><a href='./signout.php'><input type='button' name='logout' value='Logout'></a>";
        }
        ?>
        <?php
        echo "<a href='catalog.php'><input type='button' name='catalog' value='Catalog'></a>";
        ?>
        <?php
        if($authrow['access']==2) {
            echo "<a href='admin.php'><input type='button' name='admin' value='Admin'></a>";
        } else {
            echo "<a href='shoppingCart.php'><input type='button' name='cart' value='Cart'></a></div>";
        }
        ?>
    </header>
    <div class="title"><a href='./index.php'>Uncle Sam's</a>
    </div>
    <?php
    $firstTry = $mysqli->query("SELECT * FROM tb_cart");
    $firstNum = $firstTry->num_rows;
    if($firstNum>0) {
        // goes through database and displays the items that are in the cart
        while ($firstRow = mysqli_fetch_array($firstTry)) {
            $yo = $mysqli -> query("SELECT * FROM tb_cart WHERE description = '$firstRow[description]'");
            $amounter = $yo->num_rows;
            echo "<div class='catalog'>";
            echo "<div class='$firstRow[description] $firstRow[category] common'><img src='images/$firstRow[description].png'><br>$firstRow[description]<form method='get' action=''><div class='amount'><strong>$$firstRow[item_price]</strong></div><br><div class='totamount'>Amount: $amounter</div><input class='buttonGo' type='submit' value='Remove from Cart' style='width: auto;' name='$firstRow[description]'></form></div>";
        }
    }
    ?>
	<footer><strong>Michael Phan 455008</strong></footer>
</body>
</html>
