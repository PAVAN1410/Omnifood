<?php
require('../config_db.php');
if (count($_POST)) {
    if ($_POST['submit'] == "yes") {
        echo "yes";
        echo $_POST['pid'];
        $pid = $_POST['pid'];
        $quantity = $_POST['quantity'];
        $calories = $_POST['calories'];
        $username = $_SESSION['username'];


        $_SESSION['totalcartcalories'] = $_SESSION['totalcartcalories'] + $GLOBALS['quantity'] * $GLOBALS['calories'];

        $query = "SELECT * FROM cart WHERE orderedby='$username' AND pid = '$pid'";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_assoc($result);



        if (empty($fetch)) {
            $query2 = "INSERT INTO cart (orderedby,pid,quantity) VALUES ('$username','$pid','$quantity')";
            mysqli_query($db, $query2);
        } else {
            $quantity = $fetch['quantity'] + $quantity;
            $id = $fetch['id'];
            $query = "UPDATE cart SET orderedat = CURRENT_TIMESTAMP ,quantity = '$quantity' WHERE cart.id ='$id' ";
            mysqli_query($db, $query);
        }

        echo $_SESSION["page"];

        if ($_SESSION["page"] == 'description') {
            $_SESSION["success"] = "success";
            header('location: description.php');
        } else if ($_SESSION["page"] == 'user_homepage') {
            $_SESSION["success"] = "success";
            header('location:user_homepage.php');
        } else if ($_SESSION["page"] == 'searchExecution') {
            $_SESSION["success"] = "success";
            header('location:searchExecution.php');
        }

    } else if ($_POST['submit'] == "no") {
        // echo "no";

        if ($_SESSION["page"] == 'description') {
            $_SESSION["success"] = "fail";
            header('location: description.php');
        } else if ($_SESSION["page"] == 'user_homepage') {
            $_SESSION["success"] = "fail";
            header('location:user_homepage.php');
        } else if ($_SESSION["page"] == 'searchExecution') {
            $_SESSION["success"] = "fail";
            header('location:searchExecution.php');
        }
    }
}
