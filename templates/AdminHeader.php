<?php 
session_start();
require_once 'classes/Controller/UserContr.class.php';
require_once 'classes/view/UserView.class.php';
$user = new UserContr(); 
$user->VerifyLogin();
$user->LogOut();
$user = new UserView();
?>
<!doctype html>
<html lang="en">

<head>
    <title><?php echo (htmlspecialchars($title)); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Styles/Admin.css">
</head>

<body>
	    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/download.jpg);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(images/logo.png);"></div>
                    <h3><?php echo($user->ReturnUserName($_SESSION['UserID'])); ?></h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="<?php if($title=='Add Product') echo"active"; ?>">
                    <a href="./add.php"><span class="fa fa-plus mr-3"></span> Add Product</a>
                </li>
                <li class="<?php if($title=='Edit Product') echo"active"; ?>">
                    <a href="./Edit.php"><span class="fa fa-edit mr-3"></span> Edit Products</a>
                </li>
                <li class="<?php if($title=='Delete Product') echo"active"; ?>">
                    <a href="./delete.php"><span class="fa fa-trash mr-3"></span> Delete Product</a>
                </li>
                <li class="<?php if($title=='View Orders') echo"active"; ?>">
                    <a href="./orders.php"><span class="fa fa-shopping-cart mr-3"></span> View Orders</a>
                </li>
                <li class="<?php if($title=='View Users') echo"active"; ?>">
                    <a href="./users.php"><span class="fa fa-users mr-3"></span> View Users</a>
                </li>
                <li class="<?php if($title=='Export Products') echo"active"; ?>">
                    <a href="./ExportProductsPDF.php"><span class="fa fa-print mr-3"></span> Export Products In PDF</a>
                </li>
                <li>
                    <form action="" method="get">
                    <button type='submit' name='Logout' class="pr-5 py-2 btn btn-primary btn-block"><span><i class="fa fa-sign-out"></i></span> Log out</button>
                    </form>
                </li>
                
                
            </ul>

        </nav>
