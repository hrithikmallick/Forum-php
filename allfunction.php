<?php
function connectdb()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "major";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    return $conn;
}
// function signup($name, $email, $password, $gender, $language, $dob, $address)
// {
//     $conn = connectdb();
//     $ress = 0;
//     if ($conn) {
//         $sql = "insert into register values('$email','$name','$password','$gender','$language','$dob',$address)";
//         if (mysqli_query($conn, $sql)) {
//             $ress = 1;
//         } else {
//             $ress = 0;
//         }
//     } else {
//         $ress = 0;
//     }
//     return $ress;
// }
function signup($userid, $name, $password, $number, $country,  $statename)
{

    $conn = Connectdb();
    $response = 0;
    if ($conn) {
        //echo "Connection Successfully";
        $sql = "insert into register (userid,name,password,number,country,state) values('$userid', '$name', '$password', '$number', '$country', '$statename')";

        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    } else {
        //echo "Connection Failed";
        $response = 0;
    }
    return $response;
}
function login($userid, $password)
{

    $result  = checklog($userid, $password);

    $records = mysqli_num_rows($result);
    // echo $records;
    return $records;
}
function checklog($userid, $password)
{
    $conn = connectdb();

    if ($conn) {
        // echo "Connection Successfully";
        $sql = "select *from register where userid = '" . $userid . "' and password = '" . $password . "'";

        $result = mysqli_query($conn, $sql);
    }

    return $result;
}
function getusername($userid)
{
    $conn = connectdb();
    if ($conn) {
        // echo "Connection Successfully";
        $sql = "select *from register where userid = '" . $userid . "'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['name'];
    }
}
