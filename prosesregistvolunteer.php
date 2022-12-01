<?php
    session_start();
    include 'koneksi.php';
    
    $username= $_POST['username'];
    $email=$_POST['email'];
    $password_plain=$_POST['password'];

    $password= password_hash($password_plain, PASSWORD_DEFAULT);
    $query = mysqli_query($koneksi, "insert into volunteer_db values('','$username','$email','$password')");

    if($query>0){
        echo"<script>alert('Successfully registered');
            location.href='login.php';
        </script>";
    }

    else{
        echo"<script>alert('Failed register, try again');
            location.href='login.php';
        </script>";
    }
?>