<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
        }


        body {
            background-image: url('Images/bgimg_login_registraion.jpg');
            background-size: 100% 100%;
            /* background-color: aqua; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .login {
            /* background-color: skyblue; */
            flex-grow: 2;

            margin: 0px;
            /* height: 100vh; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }

        .card {
            min-height: 190px;
            width: 40%;
            background-color: rgba(0, 0, 0, 0.5);
            position: relative;
            margin: 30px;
            border-radius: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .card:hover {
            box-shadow: 0px 4px 25px 1px rgba(255, 255, 255, 1);
        }

        .form {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .element {
            border-radius: 10px;
            padding: 5px;
            margin: 5px;
            width: 60%;
        }

        .login {
            width: 100%;
        }

        .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
            cursor: pointer;
        }

        .icon {
            align-self: flex-start;
            padding: 9px;
            margin: 25px;
            border-radius: 50%;
            border: 3px solid white;
            position: absolute;
            top: -13px;
            left: 19px;
        }

        .home {
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="general_header.css">

</head>

<body>
    <?php
        require('general_header.php')
    ?>
    <div class="login">
        <div class="user card">
            <div class="icon">
                <a href="generalHome.html"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <h2 style="display: inline-block;background-color:rgba(255,255,255,0.7)">User Login</h2>
            <!-- method="post" -->
            <form action="User/checkLogin.php" class="form" method="POST">
                <input class="element" type="text" name="username" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <a class='element' style="text-align: center; font-size: large; color: #ffe000; text-decoration: none;" href="Register.php">New User?</a>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="Delivery_boy card">
            <div class="icon">
                <a href="generalHome.html"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <h2>Delivery boy Login</h2>
            <form action="Delivery_Boy/checkLoginDeliveryBoy.php" class="form" method="POST">
                <input class="element" type="text" name="deliveryboyUsername" placeholder="User Name" required>
                <input class="element" type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>