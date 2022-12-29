<?php
session_start();
include 'connection.php';

$username = htmlspecialchars($_POST['username']);
$password_plain = htmlspecialchars($_POST['password']);
$fullname = htmlspecialchars($_POST['fullname']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$occupation = htmlspecialchars($_POST['occupation']);
$dateOfBirth = date('Y-m-d');

$password = password_hash($password_plain, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "insert into user_table values('','$username','$password','volunteer','$fullname','$email','$phone')");
$query = mysqli_query($connection, "insert into volunteer_table values('','$username','$fullname','$dateOfBirth','$occupation')");

if ($query > 0) {
    echo "<script>;
            location.href='volunteer_dashboard.php';
        </script>";
} else {
    echo "<script>alert('Record Tester Failed');
            location.href='volunteer_register.php';
        </script>";
}
