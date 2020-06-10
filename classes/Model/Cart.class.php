<?php
//require_once 'Connection.inc.php';
/**
 *
 */
class Cart
{
	private $connect;
	private $conn;
	function __construct()
	{

	}

	protected function getProduct($productID){
		$connect = Connection::getinstance();
	  	$conn = $connect->getConnection();
		$stmt =	$conn->prepare("SELECT * FROM product WHERE Id ='$productID' ");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

}


?>
