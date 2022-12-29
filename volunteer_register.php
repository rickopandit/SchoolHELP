<?php session_start();
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

    <title>Volunteer Registration</title>
   
</head>
<body data-new-gr-c-s-check-loaded="8.872.0" data-gr-ext-installed="">
<!-- Just an image -->

<div id="wrapper" class="d-flex">

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container">
            <div class="card my-5 p-3">
                <div class="card-heading ">
                    <!-- Button trigger modal -->
                </div>
                <div class="card-body">
                    <h2 class="text-center">Registration Form</h2>
                    <form action="query_vol_register.php" method="post">
                        <div class="form-group">
                            <label for="test_centre">Username</label>
                            <input type="text" class="form-control" name="username" aria-describedby="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="test_centre">Full Name</label>
                            <input type="text" class="form-control" name="fullname" aria-describedby="fullname" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="test_centre">Email</label>
                            <input type="text" class="form-control" name="email" aria-describedby="username" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="test_centre">Phone</label>
                            <input type="int" class="form-control" name="phone" placeholder="e.g. 089805848222" required>
                        </div>
                        <div class="form-group">
                            <label for="test_centre">Password</label>
                            <input type="password" class="form-control" name="password" aria-describedby="password" placeholder="Password" required>
                        </div>      
                        <div class="form-group">
                            <label for="test_centre">Occupation</label>
                            <input type="text" class="form-control" name="occupation" aria-describedby="fullname" placeholder="Occupation" required>
                        </div> 
                        <div class="form-group">
                            <label for="test_centre">Birth of Date</label>
                            <input type="date" class="form-control" name="dateofbirth" aria-describedby="fullname" placeholder="DD-MM-YYYY" required>
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
      <a href="login.php">SchoolHELP</a>
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
