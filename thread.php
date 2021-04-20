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

</head>

<body>
    <?php include "_header.php"; ?>


    <?php
    $forum_id = $_GET['forum_id'];
    $conn = dbConnect();
    $sql = "select *from forum where forum_id=$forum_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $forumname = $row["forum_name"];
        $forumdesc = $row["forum_desc"];
        $forumdetail = $row["forum_describe"];
    }


    ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to <?php echo "$forumname"; ?> forums</h1>
            <p class="lead ml-2"><?php echo $forumdesc ?></p>
            <h2><mark>Description:-</mark></h2>
            <p class="lead ml-2"><?php echo $forumdetail ?></p>
        </div>
    </div>
    <div class="container">
        <h3>Browse question</h3>

        <form method="POST">

            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Enter Your Question</label>
                <input type="text" class="form-control" name="forumcomment" id="exampleFormControlTextarea1" rows="3"></input>
            </div>
            <button type="submit" name="commentbtn" class="btn btn-primary">Ask</button>
        </form>
        <?php
        if (isset($_POST["commentbtn"])) {

            $forumcomment = $_POST['forumcomment'];
            $userid_commenter = $_SESSION['userid'];
            putcomment($forumcomment, $userid_commenter, $forum_id);
        }


        ?>

        <?php
        $sql = "select *from comment where forum_id=$forum_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $comment = $row["comment_desc"];
            $userid_commenter = $row['userid'];
            $comment_id = $row['comment_id'];
            $username = getusername($userid_commenter);
            echo ' <div class="media mt-3 mb-5">
            <img class="mr-3" src="forumimg/defaultuser.png" width="54px" alt="placeholder image">
            <div class="media-body">
                <h5 class="mt-0">' . $username . '</h5>
                <a href="threadlist.php?commentid=' . $comment_id . '">' . $comment . '</a>
            </div>
        </div>';
        }

        ?>

    </div>
    <?php include "footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>