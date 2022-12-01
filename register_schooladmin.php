<?php session_start();
$name = $_SESSION['username'];
include 'koneksi.php';
$name = $_SESSION['username'];
$row = mysqli_query($koneksi,"SELECT * FROM schooladmin_tb ");
$row = mysqli_query($koneksi,"SELECT schoolname FROM school_db");

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

    <title>Manage School Admin</title>
   
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
        <?=$name;?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
    </li> 
</nav>
<div id="wrapper" class="d-flex">
    <!-- Sidebar -->
    <div class=" border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">Hello, <?=$name?></div>
        <div class="list-group list-group-flush">
        <a href="dashboard_admin.php" class="list-group-item list-group-item-action text-center">Dashboard</a>
        <!--<a href="test_report.php" class="list-group-item list-group-item-action text-center">Test Report</a>-->
        <a href="logout.php" class="list-group-item list-group-item-action text-center">Logout</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container">
            <div class="card my-5 p-3">
                <div class="card-heading ">
                    <!-- Button trigger modal -->
                    <h2 class="card-title text-center">Add School Admin</h2>
                </div>
                <div class="card-body">
                    <form action="prosesrecordschooladmin.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" aria-describedby="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="testername">Full Name</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="testername">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="testername">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="testername">Position</label>
                            <input type="text" class="form-control" name="position" placeholder="Position e.g. Staff" required>
                        </div>
                        <div class="form-group">
                            <label for="testcentre">School</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="schoolname" >
                            <?php foreach($row as $r): ?>
                                <option value="<?= $r['schoolname']; ?>"><?= $r['schoolname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
