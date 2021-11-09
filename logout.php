<?php
session_start();
require('config_db.php');
$username = $_SESSION['username'];
$totalcartcalories = $_SESSION['totalcartcalories'];
echo $totalcartcalories;
$query = "update cart set totalcartcalories = '$totalcartcalories' where orderedby = '$username' ";
mysqli_query($db,$query);

session_unset();
session_destroy();
header('location:generalHome.html')

?>