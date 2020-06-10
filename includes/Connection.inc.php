<?php 
class Connection{
    private static $instance = null;
    private $conn;

private function __construct(){
  try {
    $this->conn = new PDO('mysql:host=localhost;dbname=OMSW',"sw","1234");
     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}

public static function getinstance(){
  if (self::$instance == null) {
    self::$instance = new Connection();
  }

  return self::$instance;

}

public function getConnection(){
  return $this->conn;
  }
}


?>