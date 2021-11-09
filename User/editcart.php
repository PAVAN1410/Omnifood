<?php
require('../config_db.php');
if (isset($_POST['delete'])) {

    $id = $_POST['delete'];
    $deletecalories = $_POST['deletecalories'];
    // echo $id;
    $query = "DELETE FROM cart WHERE id = $id";
    mysqli_query($db, $query);
    echo 'totalcartcalories'.$_SESSION['totalcartcalories'].'totalcartcalories';
    echo "<br>";
    // $query4 = "update calories set consumedcalories = '$addtoconsumedcalories' where calories.username = '$username' ";
    $_SESSION['totalcartcalories'] = $_SESSION['totalcartcalories'] - $deletecalories;
    $x = 5-1;
    echo $x;
    echo "<br>";

    echo $_SESSION['totalcartcalories'];
    header('location:cart.php');
}
?>