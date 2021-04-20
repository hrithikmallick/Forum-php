<?php

session_start();
include "forumfunctions.php";
include "allfunction.php";
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

    <title>Title</title>
</head>

<body>
    <?php include "_header.php"; ?>
    <?php
    $comment_id = $_GET['commentid'];
    $conn = dbConnect();
    $sql = "select *from comment where comment_id=$comment_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $comment_desc = $row['comment_desc'];
        $commentername = getusername($row['userid']);
    }

    ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"> <?php echo "$comment_desc"; ?>?</h1>
            <p class="lead ml-2">This Question is asked by <?php echo "$commentername"; ?></p>


        </div>
    </div>
    <div class="container">
        <h3>Discuss</h3>

        <form method="POST">

            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Enter your suggestion</label>
                <textarea class="form-control" name="anscomment" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="commentbtn" class="btn btn-primary">submit</button>
        </form>
        <?php
        if (isset($_POST["commentbtn"])) {

            $forumcomment = $_POST['anscomment'];
            $userid_commenter = $_SESSION['userid'];
            putanswers($comment_id, $forumcomment, $userid_commenter);
        }


        ?>

        <?php
        $sql = "select *from answres where comment_id=$comment_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $comment = $row["answer"];
            $userid_commenter = $row['userid'];
            $comment_id = $row['comment_id'];
            $username = getusername($userid_commenter);
            echo ' <div class="media mt-3 mb-5">
            <img class="mr-3" src="forumimg/defaultuser.png" width="54px" alt="placeholder image">
            <div class="media-body">
                <h5 class="mt-0">' . $username . '</h5>
                <p>' . $comment . '</p>
            </div>
        </div>';
        }

        ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>