<?php
require("../config_db.php");
?>

<?php
if (count($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;
    // $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username'  AND password = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result)) {
        $fetch = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['status'] = "Active";
        echo "<br>";
        print_r($fetch);
        echo "<br>";
        $query2 = "select * from health where username='$username'";
        $result2 = mysqli_query($db, $query2);
        $fetch2 = mysqli_fetch_assoc($result2);
        print_r($fetch2);

        $_SESSION['BMI'] = $fetch2['bmi'];
        $_SESSION['BMR'] = $fetch2['bmr'];
        $_SESSION['gender'] = $fetch2['gender'];
        $_SESSION['required_calories'] = $fetch2['requiredcalories'];
        $_SESSION['height_centimeters'] = $fetch2['height'];
        $_SESSION['age'] = $fetch2['age'];
        $_SESSION['weight'] = $fetch2['weight'];
        echo "<br>";
        echo "<br>";
        echo "<br>";
        print_r($_SESSION);
        $queryx = "select * from cart where orderedby = '$username'";
        $resultx = mysqli_query($db, $queryx);
        //         echo "<br>";
        // echo "sf";
        $fetchx = mysqli_fetch_assoc($resultx);
        print_r($fetchx);

        $_SESSION['totalcartcalories'] = $fetchx['totalcartcalories'];
        echo "<br>";
        echo $username;

        echo $_SESSION['totalcartcalories'];
        header('location: user_homepage.php');
    } else {
        echo 'some error';
    }
}
?>