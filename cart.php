<?php
require_once "includes/helpers.inc.php";
require_once 'classes/view/CartView.class.php';
require_once 'classes/controller/CartContr.class.php';
require_once 'classes/controller/orderContr.class.php';
RenderHeader(array('title' => 'cart page'));
$objv = new CartView();
$objc = new CartContr();
$obj2 = new OrderContr();
$objc->DeleteFromCart();
$objc->proceed_to_checkout($obj2);
?>
                          





                           <!-- PAGE CONTENT -->
<div class="px-4 px-md-0 mt-5">
    <div class="container text-center py-5">
        <h1 class="display-3">Your Cart <span><i class="fa fa-shopping-cart fa-lg"></i></span></h1>
    </div>
</div>
 <div class="pb-5">
<div class="container">
  <div class="row">
    <div class="col-12 col-md-9  p-5 bg-white rounded shadow mb-5">
      <div class="table-responsive">
        <table class="table">
          <?php
        if($objc->isCartEmpty()){  
        ?>
        <h5 class="text-center">Your Cart is Empty</h5>
        <?php }
          else { ?>                    
    <thead>
    <tr>
    <th scope="col" class="border-0 bg-light">
    <div class="py-2 text-uppercase">Product</div>
         </th>
        <th scope="col" class="border-0 bg-light">
         <div class="py-2 text-uppercase">Price</div>
          </th>
      <th scope="col" class="border-0 bg-light">
       <div class="py-2 ml-4 text-uppercase">Remove</div>
      </th>
      </tr>
      </thead>
    <tbody>
      <?php $products = $objc->getProductsID();
      $objv->Show_product_in_cart($products); } ?>
    </tbody>
      </table>
      </div>
    </div>
  <div class="col-12 col-md-3">
   <ul class="list-unstyled py-5 m-4">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
    <h5 class="font-weight-bold"><?php print($obj2->CalcPrice());  ?>$</h5>
            </li> 
       </ul>
                <div class="mt-auto">
                <button data-toggle="modal" data-target="#myModal" class="btn btn-success rounded-pill  btn-block">Proceed to checkout</button>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle"><em>Choose Payment Method</em> </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST" class="form">
                              <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="credit" value="Credit Card" name="payment_method">
                                        <label class="custom-control-label" for="credit">Credit Card</label><br>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input class="custom-control-input" type="radio" id="cash" value="cash" name="payment_method">
                                        <label class="custom-control-label" for="cash">Cash</label><br>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                           <button type="submit" name="ProceedToCheckout" class="btn btn-primary rounded-pill">continue...</button>
                                      </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   

            </div>

        </div>
    </div>
</div>
 

<?php Renderfooter();  ?>
    