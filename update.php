<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'Edit Product'));
require_once 'classes/Controller/UserContr.class.php';
require_once 'classes/View/UserView.class.php';
$userv =new UserView();
$userc = new UserContr();

$Product = $userv->AdminShowProduct();
$userc->AdminUpdateProduct();


?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="raw">
                <div class="col-md-9 offset-3 mt-5">
                    <form action="" method ="POST">
                        <div class="form-group row">
                            <label for="ProductName" class="col-md-12 col-form-label">Product Name</label>
                            <div class="col-md-10">
                                <input id="ProductName" type="text" class="form-control" name="ProductName" placeholder="Product Name" value = "<?php echo($Product['Name']); ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-md-12 col-form-label" style="color:black">Quantity</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control" id="quantity" name="Quantity" placeholder="Quantity" value = "<?php echo($Product['Quantity']);?>">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-12 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input id="price" type="text" class="form-control"  name="price" placeholder="Price" value = "<?php echo($Product['Price']); ?>" >
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
                         <div class="form-group row">
                            <label for="experation" class="form-label col-md-12">Expiration Date</label>
                            <div class="col-md-10">                            
                            <input type="text" class="form-control" id="experation" name="ExpirationDate" placeholder="YY/MM/DD" value="<?php echo($Product['Expiration']); ?>" aria-describedby="DateHelpBlock" >
                            <small id="DateHelpBlock">you must insert the date as year/month/day 
                            </small>
                                </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-12 form-label">Describtion</label>

                            <div class="col-md-10">
                                <textarea class="form-control" id="description" name="Description" rows="5"  ><?php echo($Product['Description']); ?></textarea>
                            </div>
                            </div>
                        <div class="form-group row">
                            <div class="mt-3 offset-md-8">
                                <button type="submit" class="btn btn-primary" name="UpdateProduct">
                                    Edit Product
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
