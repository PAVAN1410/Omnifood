<?php

require('../config_db.php');

if (isset($_POST['submit'])) {
    echo $_POST['submit'];
    if ($_POST['submit'] == "guideduser") {
        $username = $_SESSION['username'];
        $query= " update user set typeofuser='guideduser' where username='$username'";
        mysqli_query($db,$query);
        $_SESSION['status']="Active";
        header('location:user_homepage.php');
    }
    else{
        $username = $_SESSION['username'];
        $query= " update user set typeofuser='generaluser' where username='$username'";
        mysqli_query($db,$query);
        $_SESSION['status']="Active";
        header('location:user_homepage.php');
    }
}
?>