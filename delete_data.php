<?php
include 'koneksi.php';
if(isset($_GET['id']))    
{
    $id = $_GET['id'];
    $table = $_GET['table'];
    $query = mysqli_query($koneksi, "DELETE FROM $table WHERE id= $id");


    if($query>0){
        if($table=="tbtestkit")
        {
            echo"<script>alert('Data Deleted');
                location.href='manage_kit.php';
            </script>";
        }
        elseif($table=="school_db")
        {
            echo"<script>alert('Data Deleted');
                location.href='school.php';
            </script>";      
        }
        elseif($table=="tbtestreport")
        {
            echo"<script>alert('Data Deleted');
                location.href='test_data.php';
            </script>";      
        }
        elseif($table=="volunteer_db")
        {
            echo"<script>alert('Data Deleted');
                location.href='volunteer.php';
            </script>";      
        }
        else
        {
            echo"<script>alert('Data Deleted');
            location.href='manage_schooladmin.php';
            </script>";
        }
    }

    else{
        if($table=="tbtestkit")
        {
            echo"<script>alert('Failed to delete the data');
                location.href='manage_kit.php';
            </script>";
        }
        elseif($table=="school_db")
        {
            echo"<script>alert('Failed to delete the data');
                location.href='school.php';
            </script>";      
        }
        elseif($table=="tbtestreport")
        {
            echo"<script>alert('Failed to delete the data');
                location.href='test_data.php';
            </script>";      
        }
        elseif($table=="volunteer_db")
        {
            echo"<script>alert('Failed to delete');
                location.href='volunteer.php';
            </script>";      
        }
        else
        {
            echo"<script>alert('Failed to delete the data');
                location.href='manage_schooladmin.php';
            </script>";
        }
    }
}
?>