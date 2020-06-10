<?php
require_once "includes/helpers.inc.php";
RenderHeader(array('title' => 'View Orders'));
require_once ('classes/view/UserView.class.php');
$user = new UserView();
$ordersCount = $user->ViewOrdersCount();
?>





			<!-- PAGE CONTENT -->
<div class="container mt-5 p-5 text-center">
	<h1 class="text-dark">Your Previous Orders</h1>

</div>

<div class="container-fluid my-5 pb-5">
<div class="row">
<div class="col-3 mb-5 pb-5">
	<h5 class="p-2"><span><i class="fa fa-user pr-2"></i></span> Your Orders</h5>
	<ul class="list-group">
	    <li class="col-10 list-group-item list-group-flush d-flex justify-content-between align-items-center">
	      Orders  <span class="badge badge-primary badge-pill"><?php echo("$ordersCount"); ?></span>
	    </li>
	</ul>


</div>
<div class="col-9 mt-5 pt-5">
<table class="table table-borderless table-striped">
	<?php
	
                 if($ordersCount==0){?>
                  <h3 class="text-dark">you haven't made any Orders yet</h3>
                <?php }
                else {?>
	<thead>
		<tr>
                 <th scope="col">Order ID</th>
                 <th scope="col">Price</th>
                 <th scope="col">Order Data And Time</th>
                 <th scope="col">Payment Method</th>

         </tr>

	</thead>
	<tbody>
		<?php  $user->CustomerViewOrders(); } ?> 

	</tbody>


</table>
</div>
</div>
	
</div>





<?php 
RenderFooter();
?>