<?php 
session_start();
include 'classes/Controller/UserContr.class.php';
$user = new UserContr(); 
$user->VerifyLogin();
$user->Logout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo htmlspecialchars($title); ?>
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link href="Styles/style.css" rel="stylesheet">
    <link href="<?php echo (" $css "); ?>" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container">
            <a class="navbar-brand text-warning" href="mainPage.php"><span><i class=""></i></span> akhzkhana</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-4" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item  mr-5 pr-1 <?php if($title=='akhzakhana main page') echo"active"; ?>"> <a class="nav-link" href="mainPage.php"><span><em class="fa fa-home fa-lg"></em> Home</span> <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item">
                        <form name="form1" class="form-inline my-2 my-lg-0" action="SearchResult.php" method="POST" >
                            <input name="search" class="form-control mr-sm-2" type="text" placeholder="search" aria-label="search" >
                            <button name="submit" class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="nav-item mr-2 ml-5 pl-5 "> <a class="nav-link" href="#"><span><em class="fa fa-question-circle
fa-lg"></em></span> Help</a> </li>
                    <li class="nav-item  ml-5 <?php if($title=='cart page') echo"active"; ?>">
                        <a class="nav-link" href="cart.php"><span><i class="fa fa-shopping-cart fa-lg"></i></span> Cart</a>
                    </li>
                    <li class="nav-item dropdown ml-5 pl-5 <?php if($title=='View Orders') echo"active"; ?>">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-user fa-lg"></i></span> My Account</a>
                        <div class="dropdown-menu ml-5 bg-light" aria-labelledby="navbarDropdown">
                            <!--<a class="dropdown-item" href="#"><span><i class="fa fa-user-circle"></i></span> View Account</a>-->
                            <a class="dropdown-item" href="ViewOrders.php"><span><i class="fa fa-tags"></i></span> My orders</a>
                            <div class="dropdown-divider"></div>
                            <form action="" method="get">
                            <button type="submit" name="Logout" class="dropdown-item"><span><i class="fa fa-sign-out"></i></span> Log out</button>
                        </form>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
