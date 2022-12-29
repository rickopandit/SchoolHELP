<?php
session_start();
include 'connection.php';

if (isset($_GET['id'])) {
    $req_id = $_GET['id'];
    $username = $_SESSION['username'];
    $remarks = $_POST['remarks'];
    $offerDate = date('Y-m-d');
    $query = mysqli_query($connection, "insert into offer_table values('','$req_id','$username','$offerDate','$remarks','PENDING')");

    if ($query > 0) {
        echo "<script>
                location.href='volunteer_dashboard.php';
            </script>";
    } else {
        echo "<script>alert('Failed to Submit');
                location.href='volunteer_dashboard.php';
            </script>";
            
    }
    

    
}
