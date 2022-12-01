<?php
    include 'koneksi.php';
    
    $schoolname=$_POST['schoolname'];
    $schooladdress=$_POST['schooladdress'];
    $schoolcity=$_POST['schoolcity'];

    $query = mysqli_query($koneksi, "insert into school_db values('','$schoolname', '$schooladdress', '$schoolcity')");

    if($query>0){
        echo"<script>alert('New School Added');
            location.href='school.php';
        </script>";
    }

    else{
        echo"<script>alert('Failed, Please Retry');
            location.href='school.php';
        </script>";
    }
?>