<?php 

/**
 * 
 */
class OrderMethod 
{
    
    function __construct()
    {
        
    }
    public function GetOrders($Id)
        {
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();

            $stmt = $conn->prepare("SELECT orders.Id ,orders.Price,orders.UserID,orders.OrderDate,paymentmethod.Name FROM (SELECT * from orders where UserID = '$Id') orders LEFT JOIN paymentmethod ON (orders.PaymentMethod = paymentmethod.Id)");
            $stmt->execute();
            $userverif = $stmt->fetch();
            if ( $userverif === false)
            {
                return false;
            }
            else
            {
                $stmt = $conn->prepare("SELECT orders.Id ,orders.Price,orders.UserID,orders.OrderDate,paymentmethod.Name FROM (SELECT * from orders where UserID = '$Id') orders LEFT JOIN paymentmethod ON (orders.PaymentMethod = paymentmethod.Id)");
                $stmt->execute();
                $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $Orders;
            }
        }
}
?>