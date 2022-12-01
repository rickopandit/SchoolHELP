<?php
include 'koneksi.php';
if(isset($_GET['id']))    
{
    $id = $_GET['id'];
    $schoolname= htmlspecialchars($_POST['schoolname']);

    $query = mysqli_query($koneksi, "UPDATE school_db set schoolname= '$schoolname' WHERE id= $id");


    if($query>0){
        echo"<script>alert('Successfully update the data');
            location.href='school.php';
        </script>";
    }

    else{
        echo"<script>alert('Failed to update the data');
            location.href='school.php';
        </script>";
    }
}
?>