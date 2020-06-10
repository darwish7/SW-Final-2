<?php 
require_once  'classes/model/Cart.class.php';
require_once 'classes/model/order.class.php';
/**
 * 
 */
class CartContr extends Cart
{
	
	
	function __construct()
	{
		 
	}
	public function AddToCart(){
		if(isset($_POST['add'])){
        if(isset($_SESSION['cart']))
        {
            $items = array(
                'product_id'=>$_POST['id'],
            );
            $lastindex=count($_SESSION['cart']);
            $_SESSION['cart'][$lastindex]=$items;
        }
        
        else{
            $items = array(
                'product_id'=>$_POST['id']
            );
            $_SESSION['cart'][0]=$items;
        }
    }
    return true;

	} 

	
	function DeleteFromCart(){
		if(isset($_POST['remove'])){
		$ProductID = $_POST['del_id'];
		$key = array_search($ProductID,array_column($_SESSION['cart'],'product_id'));
		if(!($key===false)){
			array_splice($_SESSION['cart'],$key, 1);
			echo "<meta http-equiv='refresh' content='0'>";
		}

		else
			return $key;
	}
	}


	function getProductsID(){
		$productsID = array_column($_SESSION['cart'],'product_id');
		return $productsID;
	} 

	

	function isCartEmpty(){
		if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
			return true;
		else 
			return false;
	}

	function proceed_to_checkout(OrderContr $order){
			if(isset($_POST['ProceedToCheckout'])){
				if($order->Checkcart()){	
					$order->CalcPrice();
						if(isset($_POST['payment_method'])){
							if($_POST['payment_method']=='cash')
							{
								$_SESSION['PAYMENT_METHOD'] = 1;
							}
							else{
								$_SESSION['PAYMENT_METHOD'] = 2; 
							}
							echo "<meta http-equiv='refresh' content='0 url=CreditCard.php'>";
						}
						else{ 
							echo"<script>alert('please Choose Payment Method')</script>";
							echo "<meta http-equiv='refresh' content='0'>";
						}
					}
					
					else 
						echo"<script>alert('Your Cart Is Empty')</script>";
				}
					
			}	      

}
?>