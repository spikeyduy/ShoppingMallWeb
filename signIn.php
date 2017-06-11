<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign In</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/sign.css">
</head>

<body>
<?php
	include('db_conn.php'); //db connection
	include('session.php');
	$error = '';
	// looks through the credentials and sees if they are valid
	if(isset($_POST['submit'])){
		$user=$_POST['user'];
		$pass=MD5($_POST['password']);
		$query="SELECT * FROM tb_customer WHERE customer_id='$user'";
		$result = $mysqli->query($query);
		//convert the result to array (the key of the array will be the column names of the table)
		$row=$result->fetch_array(MYSQLI_ASSOC);
		//if the username from table/database is not same as the username data from the form(from signin_form.php)
		if($row['customer_id']!=$user || $user=="")
		{
			//automatically go back to signin_form and pass the error message
			$error = 'Invalid Username/Password';
		}//if the username is same as the username data from the form(from signin_form.php) 
		else {
			//if the password from table/database is same as the password data from the form(from signin_form.php)
			if($row['password']==$pass) {
				//save the username in the session
				$_SESSION['session_user']=$user;
				$session_user=$_SESSION['session_user'];
				header("Location: ./index.php");
			} else {$error = 'Invalid Username/Password';}
		}
	}
?>
	<header>
		<?php
        $auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
        $authres=$mysqli->query($auth);
        $authrow=$authres->fetch_array(MYSQL_ASSOC);
			if($session_user==''){
				echo "<a href='signIn.php'><input type='button' name='signin' value='Sign in'></a>";
			}
			echo "<a href='catalog.php'><input type='button' name='catalog' value='Catalog'></a>";
			if($authrow['access']==2) {
				echo "<a href='admin.php'><input type='button' name='admin' value='Admin'></a>";
			} else {
				echo "<a href='shoppingCart.php'><input type='button' name='cart' value='Cart'></a></div>";
			}
		?>
	</header>
	<div id='signin'><form method="post" action="">
		<h1>Sign In</h1><br>
		<?php echo $error;?><br>
		Username: <input autofocus type="text" name="user"><br>
		Password: <input type="password" name="password"><br>
		<!--Need to make this submit make the log in on index change into the username
		May have to use php for that -->
		<input type="submit" value="Sign In" name='submit'>
		<input type="submit" value="Sign up" formaction="signUp.php">
		<br><input type="submit" value="Home" formaction="index.php">
		</form></div>
	<footer><strong>Michael Phan 455008</strong></footer>
</body>
</html>
