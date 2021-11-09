<?php
session_start();
$_SESSION['page'] = "adminhome_page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta class='element' name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin homePage</title>
    <link rel="stylesheet" href="a_header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            /* background-image: url('https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/AA43TKRJCY7PJGI3Y6PWFEF44I.jpg&w=1200'); */
            background-image: url('https://www.emerlyn.com/wp-content/uploads/2015/10/corporate-profile-background.jpg');
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            justify-content: center;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .product_container {
            flex-grow: 2;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .product {
            min-height: 500px;
            width: 40%;
            background-color: rgba(255, 255, 255, 0.4);
            position: relative;
            margin: 30px auto;
            border-radius: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .product_details {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .element {
            border-radius: 10px;
            padding: 5px;
            margin: 15px;
            width: 80%;
            display: block;
        }

        .product_details button {
            height: 40px;
            border-radius: 25px;
            background-color: #f7de52;
            color: black;
            font-size: 14px;
            margin: 5px 0;
            font-weight: bolder;
            cursor: pointer;
        }

        h2 {
            font-size: 25px;
            font-weight: bold;
            margin: 15px 0;
        }

        .success {
            display: flex;
            visibility: hidden;
            justify-content: center;
            text-align: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            height: 40px;
            /* position: absolute; */
            background-color: orange;
        }
    </style>
</head>

<body>
    <?php require('a_header.php');
    ?>
    <div class="success" id='success'>
        Successfully added the product
    </div>
    <div class="product_container">
        <div class="product">
            <h2>Add Item</h2>
            <form action="addProductdb.php" method="post" class="product_details" enctype="multipart/form-data">
                <input type="text" class='element' name="p_name" placeholder="Product Name" required>
                <input type="text" class='element' name="mrp" placeholder="MRP" required>
                <input type="text" class='element' name="price" placeholder="Your price" required>
                <input type="text" class='element' name="size" placeholder="Size" required>
                <!-- <input type="text" class='element' name="type" placeholder="Type of product eg:Biscuit,soap"  required> -->
                <input type="text" name="calories" class='element' placeholder="no.of Calories" required>
                <input type="text" name="typeofproduct" class='element' placeholder="Veg/Non Veg" required>
                <input type="file" name="imageFile" class='element' required>
                <button type="submit">Add product</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['success'])) {
    ?>
        <script>
            console.log('object');
            setTimeout(() => {
                document.getElementById('success').style.visibility = "hidden";
            }, 2000);
            document.getElementById('success').style.visibility = "visible";
        </script>
    <?php }
    unset($_SESSION['success']);
    ?>

</body>

</html>