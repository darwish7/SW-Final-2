<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'Edit Product'));
require_once 'classes/View/UserView.class.php';
$user = new UserView();
?>
     



        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Expiration</th>

                    </tr>
                </thead>
                <tbody>
                <?php $Products = $user->AdminViewAllProducts("update","Edit","primary");  ?>
                </tbody>
            </table>
        </div>
    </div>

<?php 
    RenderAdminF();

?>
