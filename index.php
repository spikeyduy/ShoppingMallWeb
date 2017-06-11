<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Uncle Sam's Store</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<?php
	include("session.php");
	include("db_conn.php");
	$auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
	$authres=$mysqli->query($auth);
	$authrow=$authres->fetch_array(MYSQL_ASSOC);
?>
	<header>
		<?php
        // header item depends on user access
			if($session_user==''){
				echo "<a href='signIn.php'><input type='button' name='Sign in' value='Sign in'></a>";
			} else {
				echo "<div class='name'>Welcome ".$session_user."</div> <a href='./signout.php'><input type='button' name='logout' value='Logout'></a>";
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
    <h1 class="title"><a class="title"href='./index.php'>Uncle Sam's</a></h1>
    <div class='title'><form method="GET" action="catalog.php">
		<input type="submit" name="subber" value="Start Shopping!" class="barsearch">
	</form></div>
	<footer><strong>Michael Phan 455008</strong></footer>
</body>
</html>
