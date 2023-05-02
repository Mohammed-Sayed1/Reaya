<?php
session_start();
//connect to db 
$conn = mysqli_connect('localhost', 'root','', 'reaya');//get doctor name from ussers table 
require_once ("componant/CreateDb.php");
require_once ("componant/component.php");
//new object from db connectin 
$db = new CreateDb("reaya", "products");
// get id of doctor from appointment. 

$id=$_GET['orderbuy'];

$cartb=($_SESSION['cart']);
$product_id = array_column($cartb, 'product_id');
$result = $db->getData();
$row = mysqli_fetch_assoc($result);

    foreach ($product_id as $id){
        $ordername=$row['product_name'];
        $orderprice=$row['product_price'];
        $order_id=$row['product_id'];
        $insert = "INSERT INTO orders(product_Name,price,product_id)
        VALUES ('$ordername','$orderprice','$order_id')";
        $upload = mysqli_query($conn, $insert);
        
if ($upload) {
$message[] = 'New Order added successfully';
} else {
$message[] = 'Could not add the Order';
}
        }
    
?>