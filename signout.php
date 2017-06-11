<?php
include("session.php");
include("db_conn.php");
//destroy the sessions saved before.
session_destroy();
// make sure a user's cart does not interfere with another's
$mysqli->query("DELETE FROM tb_cart");
//automatically go back to signin form
header('Location: ./index.php');
?>
