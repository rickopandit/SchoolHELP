<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tbuser where username = '$username'");


    if (mysqli_num_rows($query) == 1) {
        $levelakun = mysqli_fetch_assoc($query);
        $id = $levelakun['id'];
        session_start();
        if (password_verify($password, $levelakun['password'])) {
            if ($levelakun['levelakun'] == "admin") {
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['levelakun'] = $password;
                // alihkan ke halaman dashboard admin
                header("location:dashboard_admin.php");
            } else if ($levelakun['levelakun'] == "schooladmin") {
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['levelakun'] = $password;
                // alihkan ke halaman dashboard tester
                header("location:dashboard_tester.php");
            } else if ($levelakun['levelakun'] == "volunteer") {
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['levelakun'] = $password;
                // alihkan ke halaman dashboard patient
                header("location:dashboard_patient.php");
            }
        } else {

            echo "<script>alert('Incorrect Username or Password');
                location.href='login.php';
                </script>";
        }
    } else {
        echo "<script>alert('Username does not exist!');
                location.href='login.php';
                </script>";
    }
}
/*
    if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}*/

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

    <title>Login</title>

</head>

<body data-new-gr-c-s-check-loaded="8.872.0" data-gr-ext-installed="">

    <div class="container login-form">
        <div class="row shadow align-items-center">
            <div class="col-md-6 p-5 ">
                <h2>SchoolHELP</h2>
                <p>Please login with your account</p>
                <br>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary " value="Login" />
                    </div>
                    <br>
                    <p> Join as volunteer now </p>
                    <a href="regist_volunteer.php">Register now</p>
                </form>
            </div>
            <div class="col-md-6 bg-primary p-2">
                <!--<h2 class="text-center mt-2 text-light font-weight-bold">Welcome to <br> Covid Testing Information System</h2>-->
                <img src="img/home-logo.png" class="d-flex mx-auto my-4" alt="" style="width: 190%;">
            </div>
        </div>
    </div>
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

</body>

</html>