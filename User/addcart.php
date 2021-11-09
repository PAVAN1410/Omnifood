<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
    <style>
        * {
            margin: 0;
        }

        body {
            /* background-image: url(homepage/homepage.jpg); */
            background-image: url(../Images/home.jpg);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 100vh;
        }

        .popup {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: all 200ms;
            border: 1px solid black;
            border-radius: 10px;
            background-color: wheat;
            width: 500px;
            max-width: 80%;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            z-index: 999;
            padding: 10px;
        }

        .popup.active {
            transform: translate(-50%, -50%) scale(1);
        }

        .popup_header {
            padding: 5px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup_submit {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        #yes,
        #no {
            background-color: #f3b414;
            margin: 3px;
            border: 1px solid;
            padding: 5px 21px;
            border-radius: 20px;
        }


        .close-button {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        #overlay {
            opacity: 0;
            position: fixed;
            background-color: rgba(0, 0, 0, .5);
            transition: 200ms ease-in-out;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
        }

        #overlay.active {
            opacity: 1;
            pointer-events: all;
        }
    </style>
</head>

<body>
    <?php
    require("../config_db.php");
    // print_r($_POST);
    if (count($_POST)) {
        $pid = $_POST['pid'];
        $quantity = $_POST['quantity'];
        $username = $_SESSION['username'];
        $calories = $_POST['calories'];
        $totalcartcalories = $_SESSION['totalcartcalories'];
    }
    ?>

    <div class="popup" id="popup">
        <div class="popup_header">
            <div class="title">You have crossed Your daily limit of intake of calories </div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <hr style="color: black;">

        <div class="popup_submit">
            Do you really want to add these calories to your dite?
            <form action="updateOrNoUpdate.php" method="post">
                <input type="hidden" name="quantity" value="<?= $quantity ?>">
                <input type="hidden" name="pid" value="<?= $pid ?>">
                <input type="hidden" name="calories" value="<?= $calories ?>">
                <button type="submit" id="yes" name="submit" value="yes">Yes</button>
                <button type="submit" id="no" name="submit" value="no">No</button>
            </form>
            <!-- <button id="yes">Yes</button>
            <button id="no">No</button> -->
        </div>
    </div>
    <div id="overlay">
    </div>
    <?php
    require("../config_db.php");
    // print_r($_POST);
    if (count($_POST)) {
        $pid = $_POST['pid'];
        $quantity = $_POST['quantity'];
        $username = $_SESSION['username'];
        $calories = $_POST['calories'];
        $totalcartcalories = $_SESSION['totalcartcalories'];

        // echo $totalcartcalories;
        // echo "<br>";
        $query = "SELECT * FROM cart WHERE orderedby='$username' AND pid = '$pid'";
        $result = mysqli_query($db, $query);
        $fetch = mysqli_fetch_assoc($result);
        // echo "dsaf<br>";
        // print_r($fetch);
        // echo "dsaf";
        // echo "<br>";

        $required_calories = $_SESSION['required_calories'];
        $username = $_SESSION['username'];

        $query3 = "select consumedcalories from calories where username = '$username'";
        $result3 = mysqli_query($db, $query3);
        $fetch3 = mysqli_fetch_assoc($result3);
        // echo $fetch3["consumedcalories"];
        $consumedcalories = $fetch3["consumedcalories"];

        function calories()
        {
            $GLOBALS['addtoconsumedcalories'] = $GLOBALS['consumedcalories'] + $_SESSION['totalcartcalories'] + $GLOBALS['quantity'] * $GLOBALS['calories'];
            // echo "<br>";
            // echo $GLOBALS['addtoconsumedcalories'];

            if ($GLOBALS['addtoconsumedcalories'] > $GLOBALS['required_calories']) {
                // echo "sdf";
    ?><script>
                    // console.log('object')
                    popup.classList.add('active');
                    overlay.classList.add('active');
                </script>
    <?Php
            } else {
                $_SESSION['totalcartcalories'] = $_SESSION['totalcartcalories'] + $GLOBALS['quantity'] * $GLOBALS['calories'];
            }
        }


        if (empty($fetch)) {

            calories();

            if ($GLOBALS['addtoconsumedcalories'] < $required_calories) {
                $query2 = "INSERT INTO cart (orderedby,pid,quantity) VALUES ('$username','$pid','$quantity')";
                mysqli_query($db, $query2);
            }
        } else {

            calories();
            if ($GLOBALS['addtoconsumedcalories'] < $required_calories) {
                $quantity = $fetch['quantity'] + $quantity;
                $id = $fetch['id'];

                $query = "UPDATE cart SET orderedat = CURRENT_TIMESTAMP ,quantity = '$quantity' WHERE cart.id ='$id' ";
                mysqli_query($db, $query);
            }
        }
        // $_SESSION['quantity'] = $quantity;

        // echo $_SESSION["page"]; 
        if ($GLOBALS['addtoconsumedcalories'] < $required_calories) {

            if ($_SESSION["page"] == 'description') {
                $_SESSION["success"] = "success";
                header('location: description.php');
            } else if ($_SESSION["page"] == 'user_homepage') {
                $_SESSION["success"] = "success";
                header('location:user_homepage.php');
            } else if ($_SESSION["page"] == 'searchExecution') {
                $_SESSION["success"] = "success";
                header('location:searchExecution.php');
            } else if ($_SESSION["page"] == 'typeBased') {
                $_SESSION["success"] = "success";
                // header('location:typeBased.php');
            }
        }
    }
    ?>
</body>

</html>