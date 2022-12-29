<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = $_GET['table'];
    $query = mysqli_query($connection, "DELETE FROM $table WHERE id= $id");


    if ($query > 0) {
        if ($table == "school_table") {
            echo "<script>alert('Data Deleted');
                location.href='schoolhelp_school.php';
            </script>";
        } elseif ($table == "user_table") {
            echo "<script>alert('Data Deleted');
                location.href='schoolhelp_admin.php';
            </script>";
        } else {
            echo "<script>alert('Data Deleted');
            location.href='tester_recordtest.php';
            </script>";
        }
    } else {
        if ($table == "school_table") {
            echo "<script>alert('Failed to delete the data');
                location.href='schoolhelp_school.php';
            </script>";
        } elseif ($table == "user_table") {
            echo "<script>alert('Failed to delete the data');
                location.href='schoolhelp_admin.php';
            </script>";
        } elseif ($table == "testreport_table") {
            echo "<script>alert('Failed to delete the data');
                location.href='tester_recordtest.php';
            </script>";
        } else {
            echo "<script>alert('Failed to delete the data');
                location.href='tcm_tester.php';
            </script>";
        }
    }
}
