<?php
include('db_conn.php');
//include('session.php');
if(isset($_GET['checkmebutt'])){
	if($session_user==''){
?>
	<script>
		alert('Please Sign In');
	</script>
<?php
} else {
	$firstTot = $mysqli->query("SELECT item_price FROM tb_cart");
	$rowTot = $firstTot->num_rows;
	// total price
	if($rowTot>0){
		while($finTot = mysqli_fetch_array($firstTot)){
			$total += $finTot['item_price'];
		}	
	} else {
		$total = 0;
	}
	$firstpurse = $mysqli->query("SELECT credit_balance FROM tb_customer WHERE customer_id = '$session_user'");
	$finpurs = mysqli_fetch_array($firstpurse);
	// make sure user can pay for item
	if($finpurs['credit_balance']>$total){
		$newbal = $finpurs['credit_balance'] - $total;
		$mysqli->query("UPDATE tb_customer SET credit_balance = $newbal WHERE customer_id = '$session_user'");
		$mysqli->query("DELETE FROM tb_cart WHERE remove='0'");
//        header("Location: shoppingCart.php");
		?>
		<script>
			alert('Your Order will be Shipped Later Today!');
            window.location.href='shoppingCart.php';
//			location.reload();
//			break;
		</script>
		<?php
	} else {
		?>
		<script>
			alert('Insufficient Funds');
		</script>
		<?php
	}
}
}
?>