<?php
include "forumfunctions.php";
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
    <form method="post" action="upload.php" class="container mt-5" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputEmail1">Forum name</label>
            <input type="name" name="forumname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Small description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="forumdesc" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description in detail</label>
            <textarea class="form-control" name="forumsmalldesc" id="exampleFormControlTextarea1" required rows="3"></textarea>
        </div>
        <div> <label for="exampleFormControlTextarea1">Select image to upload:</label>
            <input type="file" name="fileToUpload" required id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </div>


    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>