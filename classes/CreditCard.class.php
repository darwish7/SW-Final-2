<?php 
require_once 'Payment.interface.php';
require_once 'classes/Bank.class.php';
require_once 'classes/controller/OrderContr.class.php';

/**
 * 
 */
class CreditCard implements Payment
{
	public $order;
	public $cardID;
    public $Password;
    public $OrderPrice;
    public $errors = array ( 'CardID' => '', 'Password' => '' );
	
	function __construct()
	{
		$this->order = new OrderContr();
	}

	public function Validate($CardID, $Password)
    {
        $bank = new Bank();
        $flag = 0;
        if ( $bank->Validate($CardID, $Password) )
        {
            $flag = 1;
        }
        else 
        {
            $flag = 0;
        }
        return $flag; 
    }

    public function CommitTransaction($CardID, $OrderPrice)
    {
        $bank = new Bank();
        $flag = 0;
        if ( $bank->CommitTransaction($CardID, $OrderPrice) )
        {
            $flag = 1;
        }
        else 
        {
            $flag = 0;
        }
        return $flag;
    }

	 function pay($price){
	 	 	$flag = 0;
	 	 if (isset($_POST['Confirm']))
	 	     		{
	                 if (Empty(trim($_POST['CardID'])))
	                 {
	                     $this->errors['CardID'] = 'The Card ID is required <br />';
	                 }
	                 else 
	                 {
	                     $this->cardID = htmlspecialchars($_POST['CardID']);
	                 }
	                 
	                 if (Empty(trim($_POST['Password'])))
	                 {
	                     $this->errors['Password'] = 'Password is required <br />';
	                 }
	                 else
	                 {
	                     $this->Password = htmlspecialchars($_POST['Password']);
	                 }

	             if ($this->errors == '' || $this->Validate($this->cardID, $this->Password))
	             {
	                 $flag = 1;
	                 if ( $this->CommitTransaction($this->cardID, $price) )
	                 {
	                 	 $this->order->totalPrice = $price;
	                     $this->order->MakeOrder(2); 
	                     $_SESSION['cart']=null;
	                     echo "<meta http-equiv='refresh' content='1;url=success.php'>";
	                 }
	                 else
	                 {
	                     echo "<script> alert('Your Credit is not enough !')</script>";
	                 }
	             }
	             else 
	             {
	                 $flag = 0;
	                 echo "<script> alert('Your CreditCard Id or Password is Wrong !')</script>";
	             }
	 	 }
	 	}


}


?>