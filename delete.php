<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'Delete Product'));
require_once ('classes/Controller/UserContr.class.php');
require_once ('classes/View/UserView.class.php');
$userc = new UserContr();
$userv = new UserView();

$userc->AdminDeleteProduct();

?>    
       


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Expiration</th>

                    </tr>
                </thead>
                <tbody>
                     <?php  $userv->AdminViewAllProducts("delete","Delete","danger");  ?>
                </tbody>
            </table>
        </div>
    </div>

 <?php 
    RenderAdminF();

?>
