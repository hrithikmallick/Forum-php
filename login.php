<?php
ob_start();
session_start();
include("allfunction.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    $userid = "";
    $pass = "";
    if (isset($_COOKIE['userid'])) {
        $userid = $_COOKIE['userid'];
    }
    if (isset($_COOKIE['password'])) {
        $pass = $_COOKIE['password'];
    }

    ?>
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


    <form class="container" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Enter Your User id</label>
            <input type="name" name="userid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter User Id" value="<?php echo $userid; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required value="<?php echo $pass; ?>">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="rememberpass" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <br> Do you already have an account? <a href="signup.php">sign up</a>
    </form>
    <!-- <form class="frm" method="POST">
        <fieldset class="fld">
            <legend>Log in</legend>
            <label class="email"></label>
            <input type="email" class="up" name="userid" size="30" id="email" value="<?php echo $userid; ?>" placeholder="Enter Your Email" maxlength="30" required /><br /><br />

            <label class="pass"></label>
            <input type="password" size="30" name="password" class="up" id="pass" value="<?php echo $pass; ?>" placeholder="Enter Your Password" maxlength="30" required /><br /><br />

            <label><input type="checkbox" name="rememberpass" />Remember password</label><br /><br /><br />

            <input type="submit" name="submit" value="Log in" class="btn" />
            <input type="reset" value="Clear" class="btn" />
            <br /><br />
            Do you already have an account? <a href="signup.php">sign up</a><br /><br /><br />
        </fieldset>
    </form> -->
    <?php

    if (isset($_POST["submit"])) {

        $userid = $_POST["userid"];
        $pass = $_POST["password"];
        echo $userid . $pass;
        $res = login($userid, $pass);
        if ($res == 1) {
            if (isset($_POST['rememberpass'])) {
                setcookie("userid", $userid, time() + (86400 * 30));
                setcookie("password", $pass, time() + (86400 * 30));
            }
            echo ("your are logged in");
            $_SESSION["userid"] = $userid;
            $location = "index.php";
            header("location: $location");
        } else {
            echo ("incorrect password or email");
        }
        // $res = login($userid, $pass);

        // if ($res == 1) {
        //     // if (isset($_POST['rememberpass'])) {
        //     //     setcookie("userid", $userid, time() + (86400 * 30));
        //     //     setcookie("password", $pass, time() + (86400 * 30));
        //     // }
        //     // $_SESSION["userid"] = $userid;
        //     echo ("your are logged in");
        //     $location = "index.php";
        //     header("location: $location");
        // } else {
        //     echo ("incorrect password or email");
        // }
    }

    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>