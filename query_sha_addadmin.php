<?php
session_start();
include 'connection.php';

$username = htmlspecialchars($_POST['username']);
$password_plain = htmlspecialchars($_POST['password']);
$fullname = htmlspecialchars($_POST['fullname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$position = htmlspecialchars($_POST['position']);
$school_name = htmlspecialchars($_POST['school_name']);

$password = password_hash($password_plain, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "insert into user_table values('','$username','$password','schooladmin','$fullname','$email','$phone')");
$user_id =  mysqli_query($connection, "SELECT * FROM user_table WHERE username = '$username'");
$row_id =  mysqli_fetch_assoc($user_id);
$u_id = $row_id["id"];
$query = mysqli_query($connection, "insert into schooladmin_table values('','$u_id','$username','$fullname','$position','$school_name')");

if ($query > 0) {
    echo "<script>;
            location.href='schoolhelp_admin.php';
        </script>";
} else {
    echo "<script>alert('Register School Administrator Failed');
            location.href='schoolhelp_admin.php';
        </script>";
}
