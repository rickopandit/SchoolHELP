<?php
include 'connection.php';

$school_name = $_POST['school_name'];
$school_address = $_POST['school_address'];
$school_city = $_POST['school_city'];

$query = mysqli_query($connection, "insert into school_table values('','$school_name','$school_address','$school_city')");

if ($query > 0) {
    echo "<script>
            location.href='schoolhelp_school.php';
        </script>";
} else {
    echo "<script>alert('Failed to Register');
            location.href='schoolhelp_school.php';
        </script>";
}
