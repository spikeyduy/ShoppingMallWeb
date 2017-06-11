<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up!</title>
<link rel="stylesheet" href="styles/main.css">
<link rel="stylesheet" href="styles/signup.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
	function checkID() {
		// when user types in the username field, execute the following function
		  $("#user").keyup( function () {

				// get the value of username field and assign as username.
				var username = $("#user").val();

				// send the data 'username' as username to checker.php and execute the following function (if the data sending is successful)
				$.get( "checker.php", { username: username} )
					  .done(function( data ) {
							// print the data (output of checker.php) as a label for 'username' id='output'
							$("#useroutput").html(data);
				});
		  });     
   }
	function checkPass() {
	   $("#pass2").keyup( function() {
		   var pass = $("#pass").val();
		   var pass2 = $("#pass2").val();
		   if(pass2!=pass){
			   $("#passoutput").html("<br>Passwords don't match");
		   } else {
			   $('#passoutput').html("<br>Passwords match");
		   }
	   });
   }
   $(document).ready(checkID);
   $(document).ready(checkPass);
</script>
</head>

<body>
<header>
    <?php
    include('db_conn.php');
    include('session.php');
    $auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
    $authres=$mysqli->query($auth);
    $authrow=$authres->fetch_array(MYSQL_ASSOC);
    if($session_user==''){
        echo "<a href='signIn.php'><input type='button' name='signin' value='Sign in'></a>";
    }
    ?>
    <?php
    echo "<a href='catalog.php'><input type='button' name='catalog' value='Catalog'></a>";
    ?>
    <?php
    if($authrow['access']==2) {
        echo "<a href='admin.php'><input type='button' name='admin' value='Admin'></a>";
    } else {
        echo "
			<a href='shoppingCart.php'><input type='button' name='cart' value='Cart'>
			</a>
			</div>";
    }
    ?>
</header>
   <?php
	include('db_conn.php');
//	include('session.php');
	$query="SELECT customer_id FROM tb_customer";
	$result=$mysqli->query($query);
	$row=$result->fetch_array(MYSQL_ASSOC);
	if(isset($_POST['submit'])){
		$user=$_POST['user'];
		$password=$_POST['pass'];
		$password2=$_POST['pass2'];
		$name=$_POST['name'];
		$addy=$_POST['addy'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$post=$_POST['post'];
		$number=$_POST['numb'];
		$credit=$_POST['credit'];
		
		$query="SELECT customer_id FROM tb_customer WHERE customer_id LIKE '$user'";
		$result=$mysqli->query($query);
		//setting the error message
		$error="<div class='err'>";

		//name validation
		if($user==""){
			$error.="* Please type your username"."<br/>";
		} elseif($row=$result->num_rows > 0) {
			$error.="* Username already taken"."<br/>";
		}
		if($name==""){
			$error.="* Please type your name"."<br/>";
		}
		if($addy==""){
			$error.="* Please type your address"."<br/>";
		}
		if($city==""){
			$error.="* Please type your city"."<br/>";
		}
		if($state==""){
			$error.="* Please select your state"."<br/>";
		}
		if($post==""){
			$error.="* Please type your postcode"."<br/>";
		}
		if($number==""){
			$error.="* Please type your phone number"."<br/>";
		}
		if($credit==""){
			$error.="* Please enter your intial deposit"."<br/>";
		}
		//password validation
		if($password==""){
			$error.="* Please type the password"."<br/>";
		}
		if($password!=$password2){
			$error.="* Passwords do not match"."<br/>";
		}
		// elseif(strlen($password)<6 && strlen($password)>8){
		// 	//if the password is under 6 and over 8 characters
		// 	$error.="* The password must be 6-8 characters"."<br/>";
		// }
		// elseif(!preg_match("#[0-9]+#", $password)){
		// 	//if the password does not include any number
		// 	$error.="* Password must include at least one number!<br/>";
		// }
		// elseif(!preg_match("#[a-z]+#", $password)){
		// 	//if the password does not include any letter
		// 	$error.="* Password must include at least one lowercase letter!<br/>";
		// }
		// elseif(!preg_match("#[A-Z]+#", $password)){
		// 	//if the password does not include any uppercase letter
		// 	$error.="* Password must include at least one uppercase letter!<br/>";
		// }
		if($error=="<div class='err'>"){
			//encrypt password
			$encrypt_password=MD5($password);
			$insertquery="INSERT INTO tb_customer (ID, customer_id, password, customer_name, address, city, state, postcode, phone, credit_balance, access) VALUES (DEFAULT,'$user','$encrypt_password','$name','$addy','$city','$state','$post','$number','$credit',1)";
			$mysqli->query($insertquery);
			$_SESSION['session_user']=$user;
			$session_user=$_SESSION['session_user'];
			header('Location: ./index.php');
		}
		else {
			$error.="</div>";
			echo "yo";
			echo $error;
		}
	}
	?>
    <form method="post" action="">
    <h1>Sign Up</h1><br>
      	<table>
      		<tr>
				<th>Username:</th>
					<td><input autofocus type="text" name="user" id='user'><label id="useroutput" for="user"></label></td>
			</tr>
			<tr>
				<th>Password:</th>
					<td><input type="password" name="pass" id='pass'></td>
			</tr>
			<tr>
				<th>Retype Password:</th><td><input type="password" name="pass2" id='pass2'><label id="passoutput" for="pass2"></label></td>
			</tr>
			<tr>
				<th>Name:</th>
					<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>Address:</th>
					<td><input type="text" name="addy"></td>
			</tr>
			<tr>
				<th>City:</th>
					<td><input type="text" name="city"></td>
			</tr>
			<tr>
				<th>State:</th>
					<td>
						<select name=state>
							<option value='' selected="selected">Please Select State</option>
							<option value="NSW">New South Wales</option>
							<option value="QLD">Queensland</option>
							<option value="VIC">Victoria</option>
							<option value="WA">Western Australia</option>
							<option value="SA">South Australia</option>
							<option value="TAS">Tasmania</option>
						</select>
					</td>
			</tr>
			<tr>
				<th>Postcode:</th>
					<td><input type="number" name="post"></td>
			</tr>
			<tr>
				<th>Phone number:</th>
					<td><input type="tel" name="numb"></td>
			</tr>
			<tr>
				<th>Intial Credit Deposit:</th>
					<td><input type="number" name="credit"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Submit" name="submit"></td>
				<td><input type="reset" name='reset'></td>
			</tr>
			<tr>
				<td><input type="submit" value="Home" id='home' formaction="./index.php"></td>
			</tr>
		</table>
    </form>
    <footer><strong>Michael Phan 455008</strong></footer>
</body>
</html>
