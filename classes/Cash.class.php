<?php 
require_once 'Payment.interface.php';
require_once 'classes/controller/OrderContr.class.php';
/**
 * 
 */
class Cash implements Payment
{
	public $order;
	
	function __construct()
	{
		$this->order = new OrderContr();
	}

	function pay($totalPrice){
		$this->order->totalPrice = $totalPrice;
		$this->order->MakeOrder(1); 
		$_SESSION['cart']=null;
		echo "<meta http-equiv='refresh' content='0;url=success.php'>";
	}
}

?>