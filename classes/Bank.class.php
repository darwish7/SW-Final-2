<?php 
//require_once "helpers.inc.php";

class Bank
{
    public function Validate($CardID, $Password)
    {
        $flag = 0;
        
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("SELECT Id,Password from Bank where Id = '$CardID' and Password = '$Password' ");
        $stmt->execute();
        $cardverif = $stmt->fetch();
        if ( $cardverif != null && $cardverif['Id'] != '' && $cardverif['Password'] != '')
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
        $flag = 0;
        
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        
        $stmt = $conn->prepare("SELECT Balance from bank where Id = '$CardID' ");
        $stmt->execute();
        $balanceverif = $stmt->fetch();
        if ( @$balanceverif['Balance'] >= $OrderPrice )
        {
            $flag = 1;
            $balance = $balanceverif['Balance'];
            $balance-=$OrderPrice;
            $stmt = $conn->prepare("update Bank set Balance = '$balance' where Id = '$CardID' ");
            $stmt->execute();
        }
        else
        {
            $flag = 0;
        }
        return $flag;
    }
      
}


?>