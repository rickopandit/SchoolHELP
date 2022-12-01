<?php
    session_start();
    include 'koneksi.php';
    
    $username= $_POST['username'];
    $password_plain=$_POST['password'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $position=$_POST['position'];
    $schoolname=$_POST['schoolname'];

    $password= password_hash($password_plain, PASSWORD_DEFAULT);
    $query = mysqli_query($koneksi, "insert into schooladmin_tb values('','$username','$password','$fullname','$email',' $phone', '$position', '$schoolname')");

    if($query>0){
        echo"<script>alert('New School Admin Added');
            location.href='manage_schooladmin.php';
        </script>";
    }
    else{
        echo"<script>alert('Failed to Add new Admin');
            location.href='manage_schooladmin.php';
        </script>";
    }
?>