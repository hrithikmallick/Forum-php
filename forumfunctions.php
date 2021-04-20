<?php


function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "major";

    $conn = mysqli_connect($servername, $username, $pass, $dbname);

    return $conn;
}


function getforum()
{
    $conn = dbConnect();


    if ($conn) {
        // echo "Connection Successfully";
        $sql = "select *from forum";

        $result = mysqli_query($conn, $sql);
    }

    return $result;
}
function putcomment($forumcomment, $userid_commenter, $forum_id)
{
    $conn = dbConnect();
    if ($conn) {
        // echo "Connection Successfully";
        $sql = "insert into comment (comment_desc,forum_id,userid) values('$forumcomment', '$forum_id','$userid_commenter')";
        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    }
}
function insertforum($forumname, $forumsmalldesc, $forumdesc, $imgaddress)
{
    $conn = dbConnect();
    if ($conn) {
        // $sql = "insert into forum (forum_name,forum_desc,forum_describe,imgaddress) values('$forumname', '$forumsmalldesc','$forumdesc','$imgaddress')";
        $sql = "insert into forum (forum_name,forum_desc,forum_describe,imgaddress) values('$forumname', '$forumsmalldesc', '$forumdesc', '$imgaddress')";
        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    }
}
function putanswers($commnet_id, $anwsers, $userid_commenter)
{
    $conn = dbConnect();
    if ($conn) {
        // echo "Connection Successfully";
        $sql = "insert into answres (comment_id,answer,userid) values('$commnet_id', '$anwsers','$userid_commenter')";
        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    }
}
