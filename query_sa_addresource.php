<?php
session_start();
include 'connection.php';

$username = $_SESSION['username'];
$description = $_POST['description'];
$resource_type = $_POST['resource_type'];
$num_required = $_POST['num_required'];
$request_date = date('Y-m-d');

$user_id =  mysqli_query($connection, "SELECT * FROM schooladmin_table WHERE username = '$username'");
$row_id =  mysqli_fetch_assoc($user_id);
$school_name = $row_id["school_name"];

$school_id =  mysqli_query($connection, "SELECT * FROM school_table WHERE school_name = '$school_name'");
$row_id1 =  mysqli_fetch_assoc($school_id);
$school_city = $row_id1["school_city"];

$query = mysqli_query($connection, "insert into request_table values('','Resource','$request_date','NEW','$description','$school_name ','$school_city')");

    $last_id = mysqli_insert_id($connection);
    $resource =  mysqli_query($connection, "SELECT * FROM request_table  WHERE id = '$last_id'");
    $row_id2 =  mysqli_fetch_assoc($resource);
    $req_id = $row_id2["id"];


$query = mysqli_query($connection, "insert into resource_table values('','$req_id','$resource_type','$num_required','$description')");

if ($query > 0) {
    echo "<script>
            location.href='schooladm_request.php';
        </script>";
} else {
    echo "<script>alert('Failed to Register');
            location.href='schooladm_request.php';
        </script>";
        
}

