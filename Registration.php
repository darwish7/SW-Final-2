<?php
session_start();
include 'classes/Controller/UserContr.class.php';

$user = new UserContr();
$user->CreateAccount();
?>


            <!-- PAGE CONTENT -->

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register Page</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
        <!-- Bootstrap -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="Styles/LoginStyle.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class=" ">
            <article class="card-body mx-auto" style="max-width: 450px;">
                <div class="container">
                    <div class="row row-header card-title mt-3 text-center">
                        <div class="col-12">
                            <h4>  Create Account </h4>
                        </div>
                        <div class="col-12">
                            <p class="text-center">Get started with your free account</p>
                            <div class="col-12">
                                <p class="divider-text">
                                    <span class="bg-light"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form action = "Registration.php" method ="POST" >
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="firstname" placeholder="First Name" class="form-control" value = "<?php echo $user->FName ?>"/>
                        <div class = "col-12 error"  > <p class="text-danger"><?php echo $user->Reg_errors['firstname']; ?>  </div>

                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="lastname" placeholder="Last Name" class="form-control" value = "<?php echo $user->LName ?>"/>
                        <div class = "col-12 error" ><p class="text-danger"> <?php echo $user->Reg_errors['lastname']; ?>  </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="form-control" value = "<?php echo $user->Email ?>" />
                        <div class = "col-12 error" ><p class="text-danger"> <?php echo $user->Reg_errors['email']; ?>  </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="text" name="phonenum" placeholder="Telephone Number" class="form-control" value = "<?php echo $user->PhoneNum ?>" />
                        <div class = "col-12 error" ><p class="text-danger"> <?php echo $user->Reg_errors['phonenum']; ?>  </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-flag"></i></span>
                        </div>
                        <input class="form-control" type="text" placeholder="Address" name="address" value = "<?php echo $user->Address ?>" />
                        <div class = "col-12 error" > <p class="text-danger"><?php echo $user->Reg_errors['address']; ?>  </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" placeholder="password" class="form-control"/>
                        <div class = "col-12 error" ><p class="text-danger"><?php echo $user->Reg_errors['password']; ?>  </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" name="confirmpassword" placeholder="Confirm password" class="form-control"/>
                        <div class = "col-12 error" ><p class="text-danger"> <?php echo $user->Reg_errors['confirmpassword']; ?>  </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Register" class="btn btn-success btn-block ">Create Account</button>
                    </div>
                    <p class="text-center">
                        Have an Account? <a href="Loginpage.php">Log In</a>
                    </p>
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