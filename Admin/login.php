<?php
session_start();
include "includes/connect.php";

if(isset($_POST['submit'])){

    $username  = $_POST['username'];
    $password  = $_POST['password'];

    $sql       = "select * from tbl_login where username='$username' and password='$password' ";
    $exec      = mysqli_query($con,$sql);
    if(mysqli_num_rows($exec)>0){
        while($rows = mysqli_fetch_array($exec)){
            if($rows[3] == 'admin'){
                $_SESSION['uname']=$username;
                echo "<script>location.href='index.php'</script>";
            }
           
        }
    }
    else{
        echo"<script>alert('INVALID USERNAME OR PASSWORD')</script>";
        echo "<script>location.href='#'</script>";

    }

}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOGIN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">LOGIN TO CONTINUE</h3></div>
                                    <div class="card-body">
                                        <form action="#" method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Username</label><input class="form-control py-4" id="inputEmailAddress" name="username" type="text" placeholder="Enter Username" required/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" required /></div>
                                            <div class="form-group">
                                                <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0"><input type="submit" class="btn btn-primary" name="submit" value="LOGIN"></div>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
