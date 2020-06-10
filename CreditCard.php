<?php 
require_once "includes/helpers.inc.php";
require_once 'classes/controller/OrderContr.class.php'; 
require_once 'classes/CreditCard.class.php';
require_once 'classes/Cash.class.php';
RenderHeader(array('title' => 'Insert Your Credit Card Info','css'=>'Styles/success.css'));
session_start();
$order = new OrderContr();
$totalPrice = $order->CalcPrice();
$creditCardPayment = new CreditCard();
if($_SESSION['PAYMENT_METHOD'] == 1)
{
        $payment = new Cash();
    }
    else{
        $payment = new CreditCard(); 
    }
    $payment->pay($totalPrice);
?>



    <!-- PAGE CONTENT -->

<div class="creditCardForm">
    <div class="heading">
        <h1>Confirm Purchase</h1>
    </div>
    <div class="payment">
        <form action="CreditCard.php" method="post">
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" name="CardID" id="cardNumber">
                <div class = "col-12 error"  > <?php echo $creditCardPayment->errors['CardID']; ?>  </div>
            </div>
            <div class="form-group owner">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="Password" id="password">
                <div class = "col-12 error"  > <?php echo $creditCardPayment->errors['Password']; ?>  </div>
            </div>
            
            <div class="form-group" id="credit_cards">
                <img src="images/visa.jpg" id="visa">
                <img src="images/mastercard.jpg" id="mastercard">
                <img src="images/amex.jpg" id="amex">
            </div>
            <div class="form-group" id="pay-now">
                <button type="submit" class="btn btn-default" name="Confirm" id="confirm-purchase">Confirm</button>
            </div>
        </form>
    </div>
</div>
<?php 

RenderFooter();
?>