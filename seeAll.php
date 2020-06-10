<?php
require_once "includes/helpers.inc.php";
RenderHeader(array('title' => 'See All page' , 'css' =>'Styles/style.css'));
require_once 'classes/View/ProductView.class.php';
require_once 'classes/controller/CartContr.class.php';
$cart = new CartContr;
$PROD = new ProductView;
$CategoryID=$_GET['catg'];
$CategoryName = $_GET['name'];
$cart->AddToCart();

?>




            <!-- PAGE CONTENT -->
        <div class="conatiner-fluid mt-5">
                <hr>
                <h2 class="text-center my-5"><?php echo $CategoryName ; ?></h2>
                <hr>
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-2 mt-5 pt-5">
                            <h5>Categories</h5>
                            <ul class="list-group">
                            <?php $PROD->showLeftPanel();?>
                            </ul>
                        </div>
                        <div class="col-10">
                            <div class="text-center p-5 row">
                            <?php
                            $PROD->ViewCategoryProducts($CategoryID);
                            ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php Renderfooter();  ?>
