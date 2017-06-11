<?php
	include('db_conn.php');
		
	//get the q parameter from URL
	$username=$_GET["username"];
	// make sure username is not taken
    $result=$mysqli->query("SELECT customer_id FROM tb_customer WHERE customer_id LIKE '$username'");
    $result_cnt = $result->num_rows;
	if ($result_cnt!=0) {
		echo "<br>username exists";
	} else {
		echo "<br>username available";		
	}

?> 
