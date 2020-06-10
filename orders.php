<?php
require_once "includes/helpers.inc.php";
RenderAdminH(array('title' => 'View Orders'));
require_once 'classes/View/UserView.class.php';
$user = new UserView();
?>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class="row pb-4">
                    <div class="col-12 mb-5">
                   <form class="form-inline" action="orders.php" method="post">
                       <div class="input-group col-6">
                           <input class="form-control" type="search" name="UserID" placeholder="Search Orders by User ID" aria-label="Search">
                       </div>
                       <button class="btn btn-dark mr-2" name="search" type="submit">Search</button>
                   </form>
            </div>        
                <div class="col-md-12">
                <?php $user->AdminViewOrders(); ?>
                </tbody>
                </table>
            </div>
             </div>
    </div>

            

 <?php 
    RenderAdminF();

?>

