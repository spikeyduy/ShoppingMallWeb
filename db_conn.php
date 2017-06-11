<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'mdphan', '455008', 'mdphan');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>