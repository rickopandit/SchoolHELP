<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connection, "UPDATE request_table set request_status = 'CLOSED' WHERE id= $id");

    if ($query > 0) {
        echo "<script>
        location.href='schooladm_request.php';
        </script>";
    } else {
        echo "<script>alert('Failed to Close');
        location.href='schooladm_request.php';
        </script>";
    }
}
