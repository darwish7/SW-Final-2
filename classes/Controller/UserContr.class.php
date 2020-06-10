<?php
require_once 'classes/Model/User.class.php';
/**
 *
 */
class UserContr extends User
{
    public $UserID;
    public $UserTypeID;
    public $FName;
    public $LName;
    public $Email;
    public $PhoneNum;
    public $Address;
    public $Password;
    public $ConfirmPassword;
    public $Reg_errors = array ( 'firstname' => '', 'lastname' => '', 'email' => '', 'phonenum' => '', 'address' => '', 'password' => '', 'confirmpassword' => '' );
    public $Login_errors = array ('email' => '' , 'password'=> '');
    public $ProductID;
    function __construct()
    {

    }


    Public function VerifyLogin(){
        if(isset($_SESSION["UserID"])){

        }
        else{
            echo("<script>alert('You Must LogIn or Register
                Redirecting to the Login Page')</script>");
          echo "<meta http-equiv='refresh' content='0 url=Loginpage.php'>";
    }
    }

    

  Public function Login()
  { if (isset($_POST['login'])){
      $Email = $_POST['email'];
      $Password = $_POST['password'];
      $flag = 0;
      if (Empty($Email))
      {
          $this->Login_errors['email'] = 'email is required <br />';
      }
      else
      {

          $this->Email = htmlspecialchars($Email);
      }
      if (Empty($Password))
      {
          $this->Login_errors['password'] = 'password is required <br />';
      }
      else
      {
          $this->Password = htmlspecialchars($Password);
      }
      if(array_filter($this->Login_errors))
      {
          echo "<script> alert ('data is not correct !')</script>";      }
      else
      {            
          $userverif = $this->getUser($Email,$Password);
          if ( $userverif != null && $userverif['Email'] != '' 
            && $userverif['Password'] != '')
          {
              $_SESSION['UserID'] = $userverif['Id'];
              $_SESSION['Email'] = $this->Email;
              $this->UserTypeID = $userverif['UserTypeId']; 
              $this->DirectUser();
          }
          else
              echo "<script> alert ('data is not correct !')</script>"; }
        }
  }

    


    public function DirectUser(){
 
        if($this->UserTypeID==1)
            header('location: add.php');
        elseif ($this->UserTypeID==0) 
            header('location: mainPage.php');
        }

    Public function Logout()
        {
            if(isset($_GET['Logout']))
            {
            if($this->UserTypeID==0)
            echo "<meta http-equiv='refresh' content='0 url=Loginpage.php'>";
            elseif ($this->UserTypeID==1){
            echo "<meta http-equiv='refresh' content='0 url=Loginpage.php'>";
            }
            session_destroy();
        }

        }


        Public function CheckRegistration($FName, $LName, $Email, $PhoneNum, $Address, $Password,$ConfirmPassword)
        {
            $flag = 0;

            if (Empty(trim($FName)))
            {
                $this->Reg_errors['firstname'] = 'first name is required <br />';
            }
            else
            {
                $this->FName = htmlspecialchars($FName);
            }

            if (Empty(trim($LName)))
            {
                $this->Reg_errors['lastname'] = 'last name is required <br />';
            }
            else
            {
                $this->LName = htmlspecialchars($LName);
            }

            if (Empty(trim($Email)))
            {
                $this->Reg_errors['email'] = 'an email is required <br />';
            }
            else if (! $this->VerifyEmail($Email))
            {
                $this->Reg_errors['email'] = 'This email is already registered on this site <br />';
            }
            else
            {
                $this->Email = htmlspecialchars($Email);
            }

            if (Empty(trim($PhoneNum)))
            {
                $this->Reg_errors['phonenum'] = 'phone number is required <br />';
            }
            else
            {
                $this->PhoneNum = htmlspecialchars($PhoneNum);
            }

            if (Empty(trim($Address)))
            {
                $this->Reg_errors['address'] = 'address is required <br />';
            }
            else
            {
                $this->Address = htmlspecialchars($Address);
            }

            if (Empty($Password))
            {
                $this->Reg_errors['password'] = 'password is required <br />';
            }
            else
            {

            }

            if (Empty($ConfirmPassword))
            {
                $this->Reg_errors['confirmpassword'] = 'confirming your password is required <br />';
            }
            else
            {
                $this->ConfirmPassword = htmlspecialchars($ConfirmPassword);
                if ($Password != $this->ConfirmPassword )
                {
                    $this->Reg_errors['confirmpassword'] = 'password doesnot match';
                }
                else
                {
                    $this->Password = htmlspecialchars($Password);
                }
            }


            if(array_filter($this->Reg_errors))
            {
                $flag = 0;
            }
            else
            {
                $flag = 1;
            }

            return $flag;

        }
    public function CreateAccount(){
            if (isset($_POST['Register']))
            {   
                
                if ( $this->CheckRegistration($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phonenum'], $_POST['address'], $_POST['password'],$_POST['confirmpassword']))
                {
                    $this->Register($this->FName,$this->LName,$this->Email,$this->PhoneNum,$this->Address,$this->Password);
                    $to = $_POST['email'];
                    $subject = "Agzakhana Registeration";
                    $body = "Thank You For Registering in our Awesome Website You Can Make Orders Now";
                    $headers = "Conformation Email";
                        if(mail($to, $subject, $body, $headers)){
                            echo "<script> alert ('Check Email For Confirmation')</script>";
                        }elseif(mail($to, $subject, $body, $headers)){
                            echo '<script> alert("Check Email For Confirmation")</script>';
                        }
                        else {
                            echo '<script> alert("E-mail was not sent to this mail")</script>';
                        }
                    header('location: Loginpage.php');
                }
                else
                {
                    echo "<script> alert ('data is not correct !')</script>";
                }
            }
            }
        public function AdminAddProduct(){
            if (isset($_POST['AddProduct']))
            {   
                $file = $_FILES['Image'];
                $this->InsertProduct($_POST['ProductName'], 
                  $_POST['Quantity'], $_POST['price'], $_POST['Category'], 
                  $_POST['ExpirationDate'], $_POST['Description'],$file);
            }
        }


        public function AdminUpdateProduct(){
            $ProductID = $_GET['ProductID'];
            if (isset($_POST['UpdateProduct'])){
            $flag = $this->UpdateProduct($ProductID,$_POST['ProductName'], $_POST['Quantity'], $_POST['price'], $_POST['Category'], $_POST['ExpirationDate'], $_POST['Description']);
            if($flag===false)
                echo "<script>alert('Product Not Found')</script>";
            else{
                 echo "<script>alert('Product has been Edited successfully')</script>";
                 echo "<meta http-equiv='refresh' content='1 ,url=Edit.php'>";
            }   
            }
        }


      Public function AdminDeleteProduct()
      {
        if (isset($_GET['EditProduct'])) {
            $productverif = $this->DeleteProduct($_GET['ProductID']);
          if ( $productverif === false)
          {
              echo "there is no element with this name";
          }
          else
          {
                echo "<script>alert('Product has been Deleted')</script>";
               echo "<meta http-equiv='refresh' content='0 url=delete.php'>";}
      
        }   
      }
      






    }


?>
