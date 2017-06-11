<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catalog</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/catalog.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="scripts/display.js"></script>
</head>

<body>
  	<?php
	include("session.php");
	include("db_conn.php");
	include("addToCart.php");
	$auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
	$authres=$mysqli->query($auth);
	$authrow=$authres->fetch_array(MYSQL_ASSOC);
	?>
    <header>
        <?php
        // header, depends on if user has admin access or not
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
    <nav>
        <form>
<!-- Radio button to show only certain categories -->
            <input id="allrad" type="radio" name="select" value="all" onClick="showAll();" checked>All<br/>
            <input id="handrad" type="radio" name="select" value="handguns" onClick="hideHand();">Handguns<br/>
            <input id="assrad" type="radio" name="select" value="assault" onClick="hideAssaultRifles();">Assault Rifles<br>
            <input id="shotrad" type="radio" name="select" value="shotgun" onClick="hideShotguns();">Shotguns
        </form>
    </nav>
    <?php
    $firstTry = $mysqli->query("SELECT * FROM tb_item");
    $firstNum = $firstTry->num_rows;
    while($firstRow = mysqli_fetch_array($firstTry)){
        echo "<div class='catalog'>";
        // spits out the items
        echo "<div class='$firstRow[description] $firstRow[category] common'><img src='images/$firstRow[description].png'><br>$firstRow[description]<form method='get' action=''><div class='amount'><strong>$$firstRow[item_price]</strong></div><br><input class='buttonGo' type='submit' value='Add to Cart' style='width: auto;' name='$firstRow[description]'></form></div>";
    }
    ?>
    <footer><strong>Michael Phan 455008</strong></footer>
</body>
</html>
