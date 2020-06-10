<?php
require_once 'includes/helpers.inc.php';
/**
 *
 */
class User
{

    function __construct()
    {
    
    }

    protected function getUser($Email,$Password){
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("SELECT Email,Password,Id,UserTypeId from user where Email = '$Email' and Password = '$Password' ");
        $stmt->execute();
        $userverif = $stmt->fetch();
        return $userverif;
    }


    protected function VerifyEmail($Email)
    {
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("SELECT Email from user where Email = '$Email' ");
        $stmt->execute();
        $userverif = $stmt->fetch();
        if ( $userverif === false)
            return 1;
        else
            return 0;
    }

    protected function Register($FName,$LName,$Email,$PhoneNum,$Address,$Password)
    {
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("insert into User (FName,LName,Email,Phoneno,Address,Password) VALUES(?,?,?,?,?,?)");
        $stmt->execute([$FName,$LName,$Email,$PhoneNum,$Address,$Password]);
    }
    
    protected function AdminGetCategries()
    {  
        $connect = Connection::getinstance();
        $conn = $connect->getConnection();

        $stmt = $conn->prepare("SELECT * from Category ");
        $stmt->execute();
        $Categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $Categories;
    }

    
    protected function ImageUpload($file){
        $FileName = $file['name'];
        $FileType = $file['type'];
        $FileTmpName = $file['tmp_name'];
        $FileError = $file['error'];
        $FileSize = $file['size'];

        $fileExtTmp = explode('.', $FileName);
        $fileExt = strtolower(end($fileExtTmp));

        $allowed = array('jpg','png','jpeg');
        if(in_array($fileExt, $allowed)){
            if($FileError===0){
                if($FileSize<500000){
                    $FileNewName = uniqid('',true).".".$fileExt;
                    $FileDest = 'images/'.$FileNewName;
                    move_uploaded_file($FileTmpName, $FileDest);
                    return 'images/'.$FileNewName;
                    }
                else{
                    echo ("<script>alert('Your Image Is Too Big')</script>");
                    return false;
                }
            }
            else
            {   echo ("<script>alert('There Was an error uploading your image please try again')</script>");
                    return false;
            }
        }
        else
        {    echo ("<script>alert('File type is not supported')</script>");
            return false;
        }
    }

        

        protected function InsertProduct($ProductName,$Quantity,$Price,$Category,$ExpirationDate
            ,$Description,$file)
        {
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();
            $ImagePath = $this->ImageUpload($file);
            $stmt = $conn->prepare("SELECT Name from Product where Name = '$ProductName' ");
            $stmt->execute();
            $productverif = $stmt->fetch();
            if($ImagePath===false)
                echo "<meta http-equiv='refresh' content='0'>";
            else{
            if( $productverif === false)
            {
                $stmt = $conn->prepare("insert into Product (CategoryID,Name,Expiration,Quantity,Price,Description,Image) VALUES(?,?,?,?,?,?,?)");
               if($stmt->execute([$Category,$ProductName,$ExpirationDate,$Quantity,$Price,$Description,$ImagePath])){
               echo " <script>alert('Product has been added successfully')</script>";
                echo "<meta http-equiv='refresh' content='1 ,url=Edit.php'>";
            }
            }
            else
            {
                $stmt = $conn->prepare("SELECT Quantity from product where Name = '$ProductName' ");
                $stmt->execute();
                $Quantityverif = $stmt->fetch();
                if ( $Quantityverif === false)
                {}
                else
                {
                    $Quantity+=$Quantityverif['Quantity'];
                }

                $stmt = $conn->prepare("update product set Quantity=? , Price = ? where Name = ?");
                if($stmt->execute([$Quantity, $Price, $ProductName ])){
                    echo "<script>alert('Product has been added successfully')</script>";
                 echo "<meta http-equiv='refresh' content='1 ,url=Edit.php'>";
            }
            }
        }
        }
    

        protected function GetAllProducts(){
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();
            $result = $conn->query("SELECT * FROM product");
            $Products = $result->fetchAll(PDO::FETCH_ASSOC);
            return $Products;
        }


        protected function GetProduct($ProductId){
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();
            $stmt = $conn->prepare("SELECT * from product where Id = '$ProductId'");
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        }


        protected function UpdateProduct($ProductID,$ProductName,$Quantity,$Price,$Category,$ExpirationDate,$Description)
            {
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();
            $stmt = $conn->prepare("SELECT * from product where Id = '$ProductID'");
            $stmt->execute();
            $productverif = $stmt->fetch();
            if ( $productverif === false)
               return false;
            else
            {
            $stmt = $conn->prepare("update product set Name=? , Expiration = ? , Quantity = ? , Price = ? , Description = ?  where Id = ?");
           if($stmt->execute([$ProductName,$ExpirationDate, $Quantity, $Price, $Description, $ProductID ]))
            {
                   return true;
            }

            }
        }


        protected function DeleteProduct($Id)
        {
            $connect = Connection::getInstance();
            $conn = $connect->getConnection();
            $stmt = $conn->prepare("SELECT Name from Product where Id = '$Id' ");
            $stmt->execute();
            $productverif = $stmt->fetch();
            if ( $productverif === false)
                return false;
            else{
            $stmt = $conn->prepare("delete from Product where Id = ?");
            if($stmt->execute([$Id]))
                return true;
            }
        }

        


         protected function GetAllUsers()
        {
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("select * from User");
        $stmt->execute();
        $User = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $User;
        }


        protected function getUserByID($UserID)
        {
        $connect = Connection::getInstance();
        $conn = $connect->getConnection();
        $stmt = $conn->prepare("select * from User Where Id='$UserID'");
        $stmt->execute();
        $User = $stmt->fetch(PDO::FETCH_ASSOC);
        return $User;   
        }
      







}



?>
