<?php 
require_once 'classes/model/Order.class.php';

/**
 * 
 */
class OrderContr extends Order
{
	
	public $totalPrice;
	public $userID;
	

	function __construct()
	{
		$this->userID = $_SESSION['UserID'];
	}



	public function CheckCart(){
		if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
			return false;
		else 
			return true;
	}


	public function CalcPrice(){
		if($this->CheckCart()){
		$this->totalPrice=0;	
		$ProductList = array_column($_SESSION['cart'],'product_id');
		$i=0;
		while ($i<count($ProductList)) {
		$productID = $ProductList[$i];
		$price = $this->getProductPrice($productID);
		$this->totalPrice += $price['price'];
		$i++;	
		  }
		  return $this->totalPrice;
		}
		else 
			$this->totalPrice = 0;
	}

	public function MakeOrder($Payment_method){
		$orderId = $this->AddOrder($Payment_method,$this->userID);
		$arr = array_column($_SESSION['cart'],'product_id');
		$flag = $this->LinkProducts($arr,$orderId);
		return $flag;
	}




}




?>