<?php
require('../config_db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suggestion</title>
    <style>
        * {
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: bisque;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

        header {
            width: 100%;
            background-color: wheat;
            height: 80px;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 5px 5px 3px;
        }

        .detailsgrid {
            display: grid;
            flex-grow: 2;
            width: 90%;
            grid-template-columns: 45% 45%;
            margin: 50px 10px;
            /* background-color: skyblue; */
            justify-content: space-between;
        }

        .details {
            position: relative;
            background-color:skyblue;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            transition: all 500ms;
        }


        .motivation:hover,
        .details:hover {
            transform: scale(1.1);
        }

        /* .motivation p:hover{
            transform: scale(1.07);
        } */

        .motivation {
            display: flex;
            box-shadow: 10px 10px 15px;
            flex-direction: column;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            background-color: magenta;
            justify-content: space-evenly;
            align-items: center;
            transition: all 500ms;
            padding: 20px;
        }

        .element {
            border-radius: 25px;
            padding: 5px;
            width: 80%;
            display: block;
            margin: auto;
        }

        /* .motivation img{
        } */
        .motivation p {
            padding: 20px;
            transition: all 500ms;

        }
        .userType{
            display: flex;
            width: 60%;
            margin: auto;
            margin-bottom: 20px;
            padding: 30px;
            background-color: magenta;
            align-items: center;
            border-radius: 60px;
            justify-content: center;
            font-size: 20px;
            font-weight: 900;
        }

        .userType button{
            width: 100px;
            height: 50px;
            border-radius: 50%;
            margin: 0 20px;
            background-color: pink;
        }


    </style>
</head>

<body>
    <?php

    $BMI = $_SESSION['BMI'];
    $gender = $_SESSION['gender'];


    $BMR = $_SESSION['BMR'];
    ?>

    <header>
        <h2>Report</h2>
    </header>

    <?php
    $username = $_SESSION['username'];
    $BMI = $_SESSION['BMI'];
    $BMR = $_SESSION['BMR'];
    $gender = $_SESSION['gender'];
    $required_calories =  $_SESSION['required_calories'];
    $required_calories = number_format($required_calories);
    $age = $_SESSION['age'];
    $height_centimeters = $_SESSION['height_centimeters'];
    $weight = $_SESSION['weight'];
    ?>

    <div class="detailsgrid">
        <div class="details">
            <?php
            // echo $BMI;
            // echo $BMR;
            ?>
            <h1>Hello <?= $username ?> </h1>
            <hr style="width: 100%;">
            <h2 style="position: absolute;top:22%;left:5%">Your details:</h2>
            <h3>Age: <?= $age ?> yrs</h3>
            <h3>Gender: <?= $gender ?></h3>
            <h3>Weight:<?= $weight ?> kg</h3>
            <h3>Height:<?= number_format($height_centimeters) ?> cm</h3>
            <h3>BMI: <?= number_format($BMI, 2) ?></h3>
            <h3>BMR: <?= number_format($BMR, 2) ?></h3>
            <h2>Required Calories to maintain your weight: <?= $required_calories ?></h2>

        </div>
        <?php
        if ($BMI < 18.5) {
            $imgsrc = ($gender == "male") ? 'thinBoy' : 'thinGirl';
            $description = "It seems You are very thin to your height. It's not bad time now to start growing your muscles and personality. Join as a guided user for Omnifood where we provide you a dite to follow with very tasty and healthy food.  ";
        } elseif ((18.5 < $BMI) && ($BMI < 24.9)) {
            $imgsrc = ($gender == "male") ? 'NormalBoy' : 'NormalGirl';
            $description = "Great! Your BMI looks good, Your are exactly at a point where your weight needs your height and your height needs your weight. <br> To maintain your weight take " . $required_calories . " calories per day. We at omnifood give the calories provided by an item as description and suggest you a tasty and healthy food to gain your muscles and even maintain your weight";
        } elseif ((24.9 < $BMI) && ($BMI < 29.9)) {
            $imgsrc = ($gender == "male") ? 'fatBoy' : 'fatGirl';
            $description = "It seems Your are a bit chubby and your weight needs to be a bit less than your current weight when compared to your height. It's not bad time now to start decreasing your weight for managing your health.  Join as a guided user for Omnifood where we provide you a dite to follow with very tasty and healthy food.";
        } elseif ($BMI > 30.0) {
            $imgsrc = ($gender == "male") ? 'obesedboy1' : 'obesedGirl';
            $description = "It seems your chubby and you are trying to decrease your weight. No worry! you are at the right place we at omnifood guid you to take a proper dite to maintain your body healthy at the same time to decrease your weight. Join as a guided user for Omnifood where we provide you tasty and healthy food with low calorie intake which helps you in reaching your goal.";
        }
        ?>

        <div class="motivation">
            <img src="personalityImages/<?= $imgsrc ?>.jpg" alt="personalityImages/<?= $imgsrc ?>">
            <p>
                <?= $description ?>
            </p>
        </div>
    </div>

    <form class="userType" action="addUsertype.php" method="post" required>
        Do you want to Join Omnifood as a Guided user? 
        <button type="submit" name='submit' value="guideduser">Yes</button>
        <button type="submit" name='submit' value="generaluser">No</button>
    </form>

    

</body>

</html>