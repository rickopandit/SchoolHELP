<?php
session_start();
include 'connection.php';

$username = $_SESSION['username'];
$description = $_POST['description'];
$tutorial_date = htmlspecialchars($_POST['tutorial_date']);
$tutorial_time = htmlspecialchars($_POST['tutorial_time']);
$numOfStudent = $_POST['numOfStudent'];
$studentLevel = $_POST['studentLevel'];
$request_date = date('Y-m-d');

$user_id =  mysqli_query($connection, "SELECT * FROM schooladmin_table WHERE username = '$username'");
$row_id =  mysqli_fetch_assoc($user_id);
$school_name = $row_id["school_name"];

$school_id =  mysqli_query($connection, "SELECT * FROM school_table WHERE school_name = '$school_name'");
$row_id1 =  mysqli_fetch_assoc($school_id);
$school_city = $row_id1["school_city"];

$query = "insert into request_table values('','Tutorial','$request_date','NEW','$description','$school_name ','$school_city')";
if(mysqli_query($connection, $query)){
    $last_id = mysqli_insert_id($connection);
    $tutorial =  mysqli_query($connection, "SELECT * FROM request_table WHERE id = '$last_id'");
    $row_id2 =  mysqli_fetch_assoc($tutorial);
    $req_id = $row_id2["id"];
}

$query = mysqli_query($connection, "insert into tutorial_table values('','$req_id','$tutorial_date','$tutorial_time','$studentLevel','$numOfStudent')");

if ($query > 0) {
    echo "<script>
            location.href='schooladm_request.php';
        </script>";
} else {
    echo "<script>alert('Failed to Register');
            location.href='schooladm_request.php';
        </script>";
        
}

