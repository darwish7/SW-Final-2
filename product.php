<?php 
require_once "includes/helpers.inc.php";
RenderHeader(array('title' => 'Product Details' , 'css' =>'Styles/style.css')); 
require_once 'classes/View/ProductView.class.php';
require_once 'classes/controller/CartContr.class.php';
$PROD = new ProductView();  
$cart = new CartContr;
$cart->AddToCart();
$PROD->get_card_product($_GET['Product']);
Renderfooter();  ?>

