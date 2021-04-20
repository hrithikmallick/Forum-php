<?php
session_start();
include "forumfunctions.php";
ob_start();
if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <?php include "_header.php"; ?>
    <div class="container">
        <h2 class="text-center mt-2">LETS DISCUSS SOME TOPICS AND PROBLEMS</h2>
        <div class="row mt-4">

            <?php
            $result = getforum();
            while ($row = mysqli_fetch_assoc($result)) {
                $forumname = $row["forum_name"];
                $forumdesc = $row["forum_desc"];
                $forum_id = $row["forum_id"];
                $imgaddress = $row['imgaddress'];
                echo '<div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="' . $imgaddress . '" class="card-img-top" alt="catogory image" width="500" height="200">
                    <div class="card-body">
                        <h5 class="card-title">' . $forumname . '</h5>
                        <p class="card-text">' . substr($forumdesc, 0, 90) . '...</p>
                        <a href="thread.php?forum_id=' . $forum_id . '" class="btn btn-primary">Want to know</a>
                    </div>
                </div>
            </div>';
            }


            ?>




        </div>
    </div>



    <?php include "footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>