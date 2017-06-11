<?php
include ("session.php");
include("db_conn.php");
// wanted to add a search bar, but could not do it with my current implentation of the website
$_SESSION['search_term'] = $_GET['search'];
$search = $_SESSION['search_term'];
$result = $mysqli->query("SELECT `description` FROM `tb_item` WHERE `description` SOUNDS LIKE '$search'");
$resultrow = mysqli_fetch_array($result);
$result_cnt = $result->num_rows;
if ($result_cnt != 0) {
    echo $resultrow['description'];
} else {
    echo "<div class='searchres'><strong>Item not found</strong></div>";
}
?>