<?php 
require_once 'classes/model/Cart.class.php';
/**
 * 
 */
class CartView extends Cart
{
	
	function __construct()
	{
		
	}
	

	function Show_product_in_cart($ProductList){
		foreach ($ProductList as $productID) {
		$product = $this->getProduct($productID);
		echo
		<<<EOT
		    <tr>
		      <th scope='row' class='border-0'>
		<div class='ml-1 py-4'>
		  <div class='d-inline-block align-middle'>
		    <h5 class='mb-0'> <a href='#' class='text-dark d-inline-block align-middle'>$product[Name]</a></h5>
		  </div>
		    </div>
		  </th>
		  <td class='border-0 align-middle'><strong>$product[Price]</strong></td>
		  <td class='border-0 align-middle '>
		  <form action='' method='post'>
		  <input type='hidden' name='del_id' value='$product[Id]'>
		  <button type='submit' class='btn btn-danger' name='remove'>Delete  <span class='pl-3'><i class='fa fa-times fa-lg'></i></span></button>
		  </form>
		</td>
		  </tr>
		EOT;
		}
		
	}



}


?>