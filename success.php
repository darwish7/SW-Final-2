<?php 
require_once "includes/helpers.inc.php";
RenderHeader(array('title' => 'order has been made','css'=>'Styles/success.css'));
session_start();
require_once 'classes/view/UserView.class.php';
$user = new UserView();
$fname = $user->returnUserName($_SESSION['UserID']);
$to = $_SESSION['Email'];
$subject = "Order Confirmation";
$body = "Thank You For Ordering from our Awesome Website $fname ,\n  We Will Contact You As soon as the shipment is done ";
$headers = "Conformation Email";
    if(mail($to, $subject, $body, $headers)){
        echo "<script> alert ('Check You Email For Further Notice')</script>";
    }elseif(mail($to, $subject, $body, $headers)){
        echo '<script> alert("Check You Email For Further Notice")</script>';
    }
    else {
        echo '<script> alert("E-mail was not sent to this mail")</script>';
    }
?>



					<!-- PAGE CONTENT -->
<div class="wrapper mt-5 pt-5"> 

<div class="fixed">
<h1 class="text-center text-success">Your Order Has Been Made, <?php echo($fname); ?></h1>	
</div>

<div class="push">
	
</div>
</div>

<?php 
RenderFooter();

?>
