<?php 
//require_once 'Connection.inc.php';
/**
 * 
 */
class Order 
{

	function __construct()
	{

	}

	public function getProductPrice($productID){
		$connect = Connection::getinstance();
		$conn = $connect->getConnection();
		$stmt =	$conn->prepare("SELECT price FROM product WHERE Id ='$productID' ");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	public function AddOrder($payment_method,$userID){	
			$connect = Connection::getinstance();
			$conn = $connect->getConnection();
			$conn->query('START TRANSACTION;');
			$stmt = $conn->prepare("INSERT INTO orders (Price,UserID,PaymentMethod) VALUES ('$this->totalPrice', '$userID','$payment_method')");
			$stmt->execute();
			$restult = $conn->query('SELECT * FROM orders ORDER BY Id DESC LIMIT 1;');	
			$row = $restult->fetch(PDO::FETCH_ASSOC);
			$orderId = $row['Id'];
			$conn->query('COMMIT;');
			return $orderId;
		}


	public function LinkProducts($ProductList,$OrderID){
		$i=0;
		$connect = Connection::getinstance();
		$conn = $connect->getConnection();
		$sql = "INSERT INTO orderproduct (OrderID,ProductID,Quantity) 
				VALUES (:OrderID,:ProductID,:Quantity) ON DUPLICATE KEY UPDATE Quantity=Quantity+1";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':OrderID',$OrderID); 
		$stmt->bindValue(':Quantity',1); 
		while ($i<count($ProductList)){
			$stmt->bindParam(':ProductID',$ProductList[$i]);
			$stmt->execute();
			$i++;
			}
			return true;
	}



}





?>