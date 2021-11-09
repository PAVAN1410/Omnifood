<?php
require("../config_db.php");
?>
<?php
// echo "sdf";
if (count($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $typeofuser = 'generaluser';
    print_r($_POST);
    $query = "INSERT INTO user (username,email,password,phoneNumber,address,typeofuser) values('$username','$email','$password','$phonenumber','$address','$typeofuser')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    header('location: userFullDetails.php');
}
?>