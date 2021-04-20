<?php
include("allfunction.php");
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href="signup.css" /> -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="Container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="signup.php">sign up <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">login <span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </form>
            </div>
        </nav>
    </div>
    <form class="container" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Enter your name</label>
            <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your information with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Enter a valid User Id</label>
            <input type="name" class="form-control" name="userid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Valid User Id" required>
            <small id="emailHelp" class="form-text text-muted">Your User Id has to be uniq.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Your Password</label>
            <input type="password" class="form-control" name="repassword" id="exampleInputPassword1" placeholder="Confirm Your Password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Enter Your Number</label>
            <input type="number" class="form-control" name="number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your number" required>

        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select your Country</label>
            <select class="form-control" name="country" id="exampleFormControlSelect1" required>
                <?php
                $countrynames = ["USA", "UK", "INDIA", "AUSTRALIA", "GERMANY", "PAKISTAN", "ISRAIL", "CANADA", "CHINA", "JAPAN", "UKRAIN"];
                for ($i = 0; $i <= count($countrynames); $i++) {
                    echo '<option value="' . $countrynames[$i] . '">' . $countrynames[$i] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Enter your State</label>
            <input type="name" name="statename" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  State name">
        </div>
        <br><button type="submit" class="btn btn-primary" name="btnSignup">Create</button>
        <button type="reset" class="btn btn-primary">Reset</button><br>
        Do you already have an account? <a href="login.php">Login</a>
    </form>
    <!-- <form class="frm" method="POST">
        <fieldset class="fld">
            <legend>Sign Up</legend>

            <label class="email"></label>
            <input type="name" class="email" name="name" size="30" id="name" placeholder="Enter Your name" maxlength="30" required /><br /><br />
            <label class="email"></label>
            <input type="email" class="username" name="name" size="30" id="email" placeholder="Enter a Valid User Name" maxlength="30" required /><br /><br />

            <label class="pass"></label>
            <input type="password" size="30" name="password" class="pass" id="pass" placeholder="Enter Password" maxlength="30" required /><br /><br />

            <label class="pass"></label>
            <input type="password" size="30" name="repassword" id="repeatpass" placeholder="Repeat Password" maxlength="40" required /><br /><br />

            Birthday: <input type="date" name="dob" /><br /><br /><br />


            <div>
                <div>
                    <span style="font-size: 17px"> Select gender :- </span>
                    <input id="male" type="radio" name="gender" value="male" />
                    <label for="male">Male</label>
                    <input id="female" type="radio" name="gender" value="female" />
                    <label for="female">Female</label>
                    <input id="LGBTI" type="radio" name="gender" value="LGBTI" />
                    <label for="LGBTI">LGBTI</label>
                </div>
                <br />


            </div>


            <input type="submit" name="btnSignup" value="Create Account" class="btn" />
            <input type="reset" value="Clear" class="btn" />
            <br /><br />
            Do you already have an account? <a href="login.php">Login</a><br /><br /><br />
        </fieldset>
    </form> -->
    <?php
    if (isset($_POST["btnSignup"])) {

        $userid = $_POST["userid"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $country = $_POST["country"];
        $statename = $_POST["statename"];
        $number = $_POST["number"];


        if ($password == $repassword) {

            // echo '<script>alert("New record Created successfully");</script>';
            $res = signup($userid, $name, $password, $number, $country,  $statename);
            if ($res == 1) {

                $_SESSION["userid"] = $userid;
                echo '<script>alert("New record Created successfully");</script>';
                $location = "index.php";
                header("location: $location");
            }
        } else {
            echo "<h1>password did not match</h1>";
        }
    }

    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>