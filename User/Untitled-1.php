<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta charset="UTF-8">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- <style>
        nav {
            width: 80%;
            margin: 0 auto;
            color: black;
            background-color: red;

        }

        .nav_after {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: white;
            box-shadow: 0 2px 2px #efefef;
            color: black;
            z-index: 99999;
        }

        .row {
            max-width: 1140px;
            margin: 0 auto;
        }


        .logo-black {
            display: block;
            height: 70px;
            width: auto;
            float: left;
            margin-top: 20px;
        }

        .display_class {
            display: none;
        }

        nav ul {
            float: right;
            list-style: none;
            margin-top: 55px;
            /* color: white; */
        }

        nav ul li {
            display: inline-block;
            margin-left: 40px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        nav ul li a {
            padding: 8px 0;
            color: inherit;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 20px;
            border-bottom: 2px solid transparent;
            -webkit-transition: border-bottom 0.2s;
            transition: border-bottom 0.2s;
        }

        nav ul li a:hover {
            border-bottom: 2px solid orange;
        }

        
    </style> -->
    <style>
        * {

            margin: 0px;
        }

        body {
            background-image: url('https://previews.123rf.com/images/milkos/milkos1903/milkos190300373/118032961-bowls-with-yogurt-granola-banana-and-almond-on-white-background-top-view-copy-space-homemade-granola.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100vh;
        }

        .login {
            /* background-color: skyblue; */
            margin: 0px;
            /* height: 100vh; */
            flex-grow: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            width: 100%;
        }

        .card {
            /* min-height: 100px; */
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
            box-shadow: 0px 4px 25px 1px rgb(194, 143, 143);
        }

        .form_result {
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }

        .element {
            border-radius: 10px;
            padding: 5px;
            margin: 5px;
            width: 80%;
            display: block;
            margin: auto;
        }

        /* .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;
            margin: auto;
        } */

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

        .form_button {
            font-size: 15px;
            border-radius: 25px;
            padding: 0.8rem 2rem;
            margin: 0rem 3rem 0.5rem 4rem;
            cursor: pointer;
        }

        .login {
            /* text-decoration: none; */
            padding: 10px 21px;
            /* margin: 10px; */
            color: #001ee1;
            font-size: 20px;
            font-weight: bold;
            /* background-color: #f7c852;
            transform: scale(1.1); */

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
            <div class="login">
                <form class="form_result" action="User/user_addto_db.php" method="POST" onsubmit="return matchpassword()">
                    <h1 style="text-align: center; margin:10px 0 ;color:white">Registration</h1> <br>
                    <input class="element" type="text" name="username" placeholder="USERNAME" required pattern="^[a-z0-9_-]{3,16}$"><br>
                    <input class="element" type="password" name="password" placeholder="PASSWORD" required><br>
                    <input class="element" type="password" name="password2" placeholder="CONFIRMPASSWORD" required><br>
                    <input class="element" type="text" name="phno" placeholder="PHONENUMBER" required pattern="[0-9]{10}"><br>
                    <input class="element" type="email" name="email" placeholder="EMAIL" required><br>
                    <input class="element" type="text" name="address" placeholder="ADDRESS" required><br>
                    <a class="login" href="login.php">Existing User?</a>
                    <div>
                        <button class="form_button" type="reset">Reset</button>
                        <button class="form_button" name="register" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function matchpassword() {
            var firstpassword = document.forms[0].querySelector('input[name="password"]').value;
            var secondpassword = document.forms[0].querySelector('input[name="password2"]').value;
            if (firstpassword == secondpassword) {
                return true;
            } else {
                alert('PASSWORD and CONFIRMPASSWORD must match');
                return false;

            }
        }
    </script>
</body>

</html>