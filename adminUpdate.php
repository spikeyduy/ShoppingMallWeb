<!DOCTYPE html>
<head>
    <style>
        table{
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<center>
    <h2>Update Product Details</h2>
</center>
<?php
include('session.php');
include('db_conn.php'); //db connection
$auth="SELECT * FROM tb_customer WHERE customer_id='$session_user'";
$authres=$mysqli->query($auth);
$authrow=$authres->fetch_array(MYSQL_ASSOC);
// authentication check
if($authrow['access']==2){
    $query="SELECT item_id, description, item_price, category, item_quantity FROM tb_item";
    $result=$mysqli->query($query);
    $printKey=false;
    // make sure items are in database
    if($row_cnt=$result->num_rows >= 1) {
        //		echo "<form method='post'>";
        //		echo "<table border='1px'>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Quantity</th></tr>";
        while($arr=$result->fetch_array(MYSQL_ASSOC)){
            echo "<tr><td>".$arr["item_id"]."</td><td>".$arr["description"]."</td><td>".$arr["item_price"]."</td><td>".$arr["category"]."</td><td>".$arr["item_quantity"]."</td></tr>";
        }
        echo "</table>";
    } else{
        echo "Sorry, no items available";
    }
    if(isset($_GET['name'])){
        $query2="UPDATE tb_item SET item_id='$_GET[id]',description='$_GET[name]',item_price='$_GET[price]',category='$_GET[desc]',item_quantity='$_GET[quant]' WHERE item_id='$_GET[id]'";
        $mysqli->query($query2);
        header("Location: adminUpdate.php");
        //	header("Refresh:0");
        //	return;
    }
    echo "<form method='get' action=''>ID:<input type='number' name='id'><br>Name:<input type='text' name='name'><br>Price:<input type='number' name='price'><br>Category:<input type='text' name='desc'><br>Quantity:<input type='number' name='quant'><br/><input type='submit' value='update   '><input type='reset' value='reset'><br><input type='submit' value='Go back to Main' formaction='admin.php'></form>";
} else {
    echo "Not allowed";
    echo "<form action='admin.php'><input type='submit' value='Go back to Main'></form>";
}
?>
</body>
</html>