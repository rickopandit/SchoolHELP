<?php
session_start();
include 'connection.php';
$fullname = $_SESSION['username'];
if (!isset($_SESSION["username"])) {
    echo "<script>alert('login first'); location.href='login.php'</script>";
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM request_table WHERE id= $id");
    $row = mysqli_fetch_assoc($query);
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Volunteer</title>
   
</head>
<body data-new-gr-c-s-check-loaded="8.872.0" data-gr-ext-installed="">
<!-- Just an image -->
<nav class="navbar navbar-light p-0 ml-4">
    <a class="navbar-brand" href="#">
       <img src="img/small.png" alt="CTIS" style="width: 60%;">
       <button class="btn btn-light" id="menu-toggle"><i class="fa fa-bars"></i></button>
    </a>  
    <li class="navbar navbar-light nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
        <?=$fullname;?>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
    </li> 
</nav>
<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">Hello, <?=$fullname?></div>
        <div class="list-group list-group-flush">
        <a href="volunteer_dashboard.php" class="list-group-item list-group-item-action text-center">Dashboard</a>
        <!--<a href="test_report.php" class="list-group-item list-group-item-action text-center">Test Report</a>-->
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container">
            <div class="card my-5 p-3">
                <div class="card-heading ">
                    <!-- Button trigger modal -->
                    <h2 class="card-title text-center">Requests Details</h2>
                </div>
                <div class="card-body ">
                    <!--<a href="add_kit.php" class="btn btn-primary mb-4">Record new test kit</a>-->
                    <div class="justify-content-center">
                        <div class="col-auto"> 
                            <div class="table-responsive">
                                <table class="table table-hover justify-content-center mx-auto border">
                                <?php
                                            include "connection.php";
                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                
                                                $query = mysqli_query($connection, "SELECT * FROM request_table WHERE id= $id");
                                                
                                                $row_id = mysqli_fetch_assoc($query);
                                                $get_tutorial = $row_id["request_type"];

                                                if($get_tutorial == "Tutorial"){
                                                    $row_id1 = mysqli_fetch_assoc($query);
                                                    $get_id = $row_id["id"];
                                                    $query1 = mysqli_query($connection, "SELECT * FROM tutorial_table WHERE req_id= $get_id");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>Tutorial Date</th>
                                                        <th>Tutorial Time</th>
                                                        <th>Student Level</th>
                                                        <th>Number of Students</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    while ($data = mysqli_fetch_assoc($query1)) {
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $data['tutorial_date']; ?></td>
                                                                <td><?php echo $data['tutorial_time']; ?></td>
                                                                <td><?php echo $data['studentLevel']; ?></td>
                                                                <td><?php echo $data['numOfStudent']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                        <form class="user" method="post" action="query_vol_offer.php?id=<?= $data['req_id']; ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="remarks" placeholder="Enter Remarks" required>
                                    </div>                             
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-sm btn-success mr-1">
                                            Submit Offer
                                        </button>
                                        <a href="patient_dashboard.php" class="btn btn-sm btn-secondary mr-1">Previous Page</a>
                                    </div>
                                </Form>
                                <br></br>
                                             <?php
                                                    }
                                                }
                                                elseif($get_tutorial == "Resource"){
                                                    $row_id1 = mysqli_fetch_assoc($query);
                                                    $get_id = $row_id["id"];
                                                    $query1 = mysqli_query($connection, "SELECT * FROM resource_table WHERE req_id= $get_id");
                                                ?>
                                                <thead>
                                                    <tr>
                                                        <th>Resource Type</th>
                                                        <th>Quantity Required</th>
                                                       
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    while ($data = mysqli_fetch_assoc($query1)) {
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $data['resource_type']; ?></td>
                                                                <td><?php echo $data['num_required']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                        <form class="user" method="post" action="query_vol_offer.php?id=<?= $data['req_id']; ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="remarks" placeholder="Enter Remarks" required>
                                    </div>                             
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-sm btn-success mr-1">
                                            Submit Offer
                                        </button>
                                        <a href="volunteer_dashboard.php" class="btn btn-sm btn-secondary mr-1">Previous Page</a>
                                    </div>
                                </Form>
                                <br></br>
                                             <?php
                                                    }
                                                }
                                                
                                            }
                                                ?>
                                       
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022
      <a href="#"> SchoolHELP</a>
    </div>
    <!-- Copyright -->
  
</footer>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

<!-- Footer -->
    <!--Footer-->
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


    <!-- MD Javascript -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    
</body>
</html>
