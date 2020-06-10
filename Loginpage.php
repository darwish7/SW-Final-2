<?php
session_start();
require_once "includes/helpers.inc.php";
require_once 'classes/Controller/UserContr.class.php'; 

$user = new UserContr();
$user->Login();
?>



        <!-- PAGE CONTENT -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="Styles/LoginStyle2.css" rel="stylesheet">   
</head>

<body>

    <div class="container mt-5 pt-5">
        <div class="">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <div class="container">
                    <div class="row row-header card-title mt-3 text-center text-white">
                        <div class="col-12">
                            <h2>  Login </h2>
                        </div>
                        <div class="col-12">
                            <p class="text-center ">Don't have an account? Sign up <a href="Registration.php">here</a></p>
                            <div class="col-12">
                                <p class="divider-text">
                                    <span class="bg-light"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action = "loginpage.php" method ="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="form-control" value = "<?php echo $user->Email ?>">
                        <div class = "col-12 error"  ><p class="text-white"> <?php echo $user->Login_errors['email']; ?>  </div>
                    </div>
                    
                    <div class="form-group input-group mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <div class = "col-12 error"  ><p class="text-white"> <?php echo $user->Login_errors['password']; ?>  </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" name="login" class="btn btn-success btn-block ">Log in</button>
                    </div>
                </form>
            </article>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
</body>

</html>