<?php
$conn = mysqli_connect("localhost", "root", "", "reaya");

if (!$conn) {
  echo mysqli_connect_error();
  exit;
}
$id = $_GET['edit'];
$update_data = "UPDATE orders SET order_status = 'Canseled'  WHERE order_id = '$id'";
mysqli_query($conn, $update_data);
header("Location: pharmacie_profile.php");