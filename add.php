<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'Add Product'));
require_once ('classes/Controller/UserContr.class.php');
require_once 'classes/View/UserView.class.php';
$userc = new UserContr();
$userv =new UserView();

$userc->AdminAddProduct();


?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="raw">
                <div class="col-md-9 offset-3 mt-5">
                    <form action="add.php" method="POST" enctype="multipart/form-data" class="needs-validation" method ="POST" novalidate>
                        <div class="form-group row">
                            <label for="ProductName" class="col-md-12 col-form-label">Product Name</label>
                            <div class="col-md-10">
                                <input id="ProductName" type="text" class="form-control" name="ProductName" placeholder="Product Name" value = "" required>
                            <div class="invalid-feedback">
                                     Please Write The Product Name.
                                   </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-12 col-form-label" style="color:black">Quantity</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" id="quantity" name="Quantity" placeholder="Quantity" value = "" required >
                                <div class="invalid-feedback">
                                     Please choose a Quantity.
                                   </div>
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-12 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input id="price" type="text" class="form-control" required name="price" placeholder="Price" value = "" >
                            <div class="invalid-feedback">
                                     Please Enter The Product Price .
                                   </div>
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="Category" class="col-md-12 form-label">Category</label>
                            <div class="col-md-10">
                                <select class="form-control" name="Category">
                                   <?php $userv->AdminViewCategroy(); ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label class="mr-2">Upload Product Image</label>
                            <div class="col-md-10">
                            <input  type="file" name="Image" class="form-control" required >
                            <div class="invalid-feedback">
                                     Please Upload The Product Image.
                                   </div>
                                   <small id="DateHelpBlock" class="text-primary">The Image must be smaller than 5 mega 
                            </small>
                               </div>
                            </div>
                         <div class="form-group row">
                            <label for="experation" class="form-label col-md-12">Expiration Date</label>
                            <div class="col-md-10">                            
                            <input type="text" class="form-control" id="experation" name="ExpirationDate" placeholder="YY/MM/DD" aria-describedby="DateHelpBlock" required>
                            <div class="invalid-feedback">
                                     Please Fill the Exp. Date.
                                   </div>
                            <small id="DateHelpBlock" class="text-primary">you must insert the date as year/month/day 
                            </small>
                                </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-12 form-label">Describtion</label>

                            <div class="col-md-10">
                                <textarea class="form-control" id="description" name="Description" rows="5" required></textarea>
                                <div class="invalid-feedback">
                                     Please Fill The Description .
                                   </div>
                            </div>
                            </div>
                        <div class="form-group row">
                            <div class="mt-3 offset-md-8">
                                <button type="submit" class="btn btn-primary" name="AddProduct">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

<?php 
 RenderAdminF();

?>
