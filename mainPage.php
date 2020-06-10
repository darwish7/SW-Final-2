<?php
require_once "includes/helpers.inc.php";
RenderHeader(array('title' => 'akhzakhana main page'));
require_once 'classes/View/ProductView.class.php';
require_once 'classes/controller/CartContr.class.php';
$ProductObj= new productView;
$cart = new CartContr();
$cart->AddToCart();

?>




        <!-- PAGE CONTENT -->

        <div class="container mt-5 pt-4">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                            <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div style="width: 1130px; height:290px;">
                                    <img class="d-block img-fluid" src="images/makeupheader.jpg" alt="First slide">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>MAKEUP</h5>
                                    <p>The World's Finest Brands</p>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div style="width: 1130px; height:290px;">
                                    <img class="d-block img-fluid" src="images/medicinesheader.jpg" alt="All the Medicines">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 style="color:black">Protect Yourself From The Flu</h5>
                                    <h6 style='color:red'>Order Now</h6>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div style="width: 1130px; height:290px;">
                                    <img class="d-block img-fluid" src="images/FreeShipping.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 style="color:red"></h5>
                                    <h6 style="color:red">    For a limited time only</h6>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
                        <div class="col-lg-6 col-10 ml-1">
                            <h4>Free Shipping</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
                        <div class="col-lg-6 col-10 ml-1">
                            <h4>Free Returns</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
                        <div class="col-lg-6 col-10 ml-1">
                            <h4>Low Prices</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php   $ProductObj->ShowProductsMainPage();  ?>
                  
       </div>
                    </div>

            <?php    Renderfooter();  ?>