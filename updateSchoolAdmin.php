<?php
include 'koneksi.php';
if(isset($_GET['id']))    
{
    $staffID = $_GET['staffID'];
    $name= htmlspecialchars($_POST['name']);
    $testcentrename=htmlspecialchars($_POST['testcentrename']);

    $query = mysqli_query($koneksi, "UPDATE tbuser set name= '$name', testcentrename= '$testcentrename' WHERE id= $id");


    if($query>0){
        echo"<script>alert('Successfully update the data');
            location.href='manage_schooladmin.php';
        </script>";
    }

    else{
        echo"<script>alert('Failed to update the data');
            location.href='manage_schooladmin.php';
        </script>";
    }
}
?>