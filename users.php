<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'View Users'));
require_once 'classes/View/UserView.class.php';
$userobj = new UserView();
?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">address</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $Users = $userobj->ViewAllUsers(); ?>
                    </tbody>
                </table>
            
        </div>
    

<?php 
    RenderAdminF();

?>
