<?php
require('../config_db.php');
?>

<?php
$username = $_SESSION['username'];
$date = date("Y-m-d H:i:s");
$query = "select * from cart where orderedby = '$username'";
$result = mysqli_query($db, $query);
$fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($fetch);

$finalorder = '';

foreach ($fetch as $cartitem) {
    $pid = $cartitem['pid'];
    $quantity = $cartitem['quantity'];
    $finalorder = $finalorder . $pid . ':' . $quantity . ',';
}
echo $finalorder;
$randomint = mt_rand(10000000, 99999999);
$query = "insert into history(orderedby,finalorder,status,randomint) values ('$username','$finalorder','updating','$randomint')";
mysqli_query($db, $query);
$query = "select * from history where orderedby = '$username' order by date desc";
$result = mysqli_query($db, $query);
$fetch = mysqli_fetch_assoc($result);
$hid = $fetch['id'];
echo $hid;
$query = "insert into orders(orderedby,finalorder,hid) values ('$username','$finalorder','$hid')";
mysqli_query($db, $query);
$query = "delete from cart where orderedby = '$username'";
mysqli_query($db, $query);
$_SESSION['success'] = "added";

$query = "select * from calories where username = '$username'";
$result = mysqli_query($db, $query);
$fetch = mysqli_fetch_assoc($result);
// $additionalcalories = $_POST['additionalcalories'];
$totalcartcalories = $_SESSION['totalcartcalories'];
$finalcalories = $fetch['consumedcalories'] + $totalcartcalories;

$query4 = "update calories set consumedcalories = '$finalcalories' where calories.username = '$username' ";
mysqli_query($db, $query4);

$_SESSION['totalcartcalories'] = 0;
echo "<br>";
echo "<br>";
echo "<br>";
echo $_SESSION['totalcartcalories'];
// $username = $GLOBALS['username'];
// $query4 = "update calories set consumedcalories = '$addtoconsumedcalories' where calories.username = '$username' ";
// mysqli_query($GLOBALS['db'], $query4);


header('location:cart.php');

// DELETE FROM `cart` WHERE `cart`.`id` = 82"

?>