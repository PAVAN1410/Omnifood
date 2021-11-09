<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta charset="UTF-8">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


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
            border-radius: 25px;
            padding: 5px;
            width: 80%;
            display: block;
            margin: auto;
        }

        /* .login button {
            border: none;
            font-size: 1rem;
            width: 100px;
            border-radius: 25px;
            padding: 5px;F
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

        .registerRetailer {
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
    <style>
        nav {
            width: 100%;
            margin: 0 auto;
            color: black;
            background-color: white;

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
            width: 100%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        nav ul li {
            display: inline-block;
            margin-left: 40px;
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



        .logo-black {
            display: block;
            height: 70px;
            width: auto;
            float: left;
            margin-top: 20px;
        }

        .success {
            display: flex;
            /* visibility: hidden; */
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            height: 40px;
            /* position: absolute; */
            background-color: orange;
        }

        .height_user {
            display: flex;
            justify-content: space-between;
            width: 80%;
            padding: 5px;
        }

        .height_user input {
            border-radius: 10px;
            padding: 5px;
            margin: 0 5px;
            display: block;
            width: 45%;
            margin: auto;
        }

        .radio {
            font-size: 22px;
            font-weight: bold;
            width: 82%;
            display: flex;
            background-color: white;
            margin: auto;
            border-radius: 25px;
            justify-content: space-evenly;
            border: 0.5px solid;
        }

        select option {
            text-align: center;
        }

        
        
    </style>

</head>

<body>
    <header>
        <nav id='nav'>
            <div class="row">
                <img class='logo-black' src="Images/logo.png" alt="">
                <ul>
                    <li><a href="">Food Delivery</a></li>
                    <li><a href="">How It Works</a></li>
                    <li><a href="">Sign UP</a></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="success" id='success'>
        We are happy to see you registering for omnifood
    </div>

    <div class="login">
        <div class="user card">
            <div class="icon">
                <a href="generalHome.html"><i style="color:white; display: inline-block;" class="fas fa-home home"></i></a>
            </div>
            <div class="login">
                <form class="form_result" action="health_details_to_db.php" method="POST" onsubmit="return matchpassword()">
                    <h1 style="text-align: center; margin:10px 0 ;color:white">General Details</h1> <br>
                    <input class="element" type="text" name="name" placeholder="YOUR NAME" required><br>
                    <input class="element" type="number" name="weight" placeholder="Weight in kg" required><br>
                    <div class="height_user ">
                        <input type="number" name="h_feet" placeholder="H-feet(5')" required><br>
                        <input type="number" name="h_inches" placeholder="H-inches(7')" required><br>
                    </div>
                    <br>
                    <div class="radio">
                        Gender
                        <label>
                            <input type="radio" name="gender" value="male" required>Male
                        </label>
                        <label>
                            <input type="radio" name="gender" value="female" required>Female
                        </label>

                    </div>
                    <br>
                   
                    
                    <input placeholder="Date-of-Birth" name="DOB" class="element" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required />
                    <br>
                    <select class="element" style="font-weight: bold;" name="activity" place id="" required>
                        <option style="font-weight: bold;" value="">Activity</option>
                        <option value="Sedentary">Little or no exercise, desk job</option>
                        <option value="Lightly_active">Light exercise/ sports 1-3 days/week</option>
                        <option value="Moderately_active">Moderate exercise/ sports 6-7 days/week</option>
                        <option value="Very_active">Hard exercise every day</option>
                        <option value="Extra_active">Hard exercise 2 or more times per day</option>
                    </select>
                    <br>


                    <div>
                        <button class="form_button" type="reset">Reset</button>
                        <button class="form_button" name="register" type="submit">Add Details</button>
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

        setTimeout(() => {
            console.log('object');
            success = document.getElementById('success');
            success.style.visibility = "hidden";
        }, 3000);
    </script>
</body>

</html>