<?php

// use function PHPSTORM_META\type;

require("../config_db.php");
?>
<?php
// echo "sdf";
    if (count($_POST)) {
    print_r($_POST);
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $h_feet = $_POST['h_feet'];
    $h_inches = $_POST['h_inches'];

    $dob = $_POST["DOB"];
    $dob = strtotime($dob);
    $dob = date('d-m-Y',$dob);

    echo $dob;
    
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob), date_create($today));
    $age = $diff->format('%y');
    echo "----------------------------------<br>";
    print_r($diff);
    echo "----------------------------------<br>";
    $gender = $_POST['gender'];
    $activity = $_POST['activity'];
    $height_meters = (($h_feet * 12) + $h_inches) * 0.0254;
    $height_centimeters = $height_meters * 100;
    // echo $height_meters;
    $BMI = $weight / pow($height_meters, 2);
    echo $BMI;
    
    if ($gender == "male") {
        $BMR = 66.47 + (13.75 * $weight) + (5.003 * $height_centimeters) - (6.755 * $age);
    } else if ($gender == "female") {
        $BMR = 655.1 + (9.563  * $weight) + (1.85 * $height_centimeters) - (4.676 * $age);
    }
    echo "<br>";
    
    $activity_array = array('Sedentary'=>1.2,'Lightly_active'=>1.375,'Moderately_active'=>1.55,'Very_active'=>1.725,'Extra_active'=>1.9);
    $activity_value = $activity_array[$activity];
    $required_calories = $BMR * $activity_array[$activity];
    $username = $_SESSION['username']; 


    if ($BMI < 18.5) {
        $required_calories = $required_calories + 300;        
    } elseif ((18.5 < $BMI) && ($BMI < 24.9)) {
        $required_calories = $required_calories;        
    } elseif ((24.9 < $BMI) && ($BMI < 29.9)) {
        $required_calories = $required_calories - 400;        
    } elseif ($BMI > 30.0) {
        $required_calories = $required_calories - 500;        
    }


    $query = "INSERT INTO health (username,height,weight,age,gender,bmi,bmr,activity,requiredcalories) values('$username','$height_centimeters','$weight','$age','$gender','$BMI','$BMR','$activity_value','$required_calories')";
    mysqli_query($db, $query);
    $query2 = "Insert into calories (username,requiredcalories) values ('$username','$required_calories')";
    mysqli_query($db, $query2);

    $_SESSION['BMI'] = $BMI;
    $_SESSION['BMR'] = $BMR;
    $_SESSION['gender'] = $gender;
    $_SESSION['required_calories'] = $required_calories;
    $_SESSION['height_centimeters'] = $height_centimeters;
    $_SESSION['age'] = $age;
    $_SESSION['weight'] = $weight;
    $_SESSION['totalcartcalories'] = 0;
    

    header('location: suggestion.php');
}
?>