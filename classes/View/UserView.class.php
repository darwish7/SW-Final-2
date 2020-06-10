<?php
require_once 'classes/Model/User.class.php';
require_once 'classes/orderMethods.class.php';
/**
 *
 */
class UserView extends User
{

	function __construct()
	{

	}


	Public function AdminViewCategroy()
	{ 
	    $Categories = $this->AdminGetCategries();
        foreach ($Categories as $Category) {
        	echo <<<EOT
				<option value=$Category[Id]>$Category[Name]</option>
			EOT;

          
		}
	}

	Public function AdminViewAllProducts($Page,$btn,$btnColor){ 
       $Products = $this->GetAllProducts();
       foreach ($Products as $Product) {    
                        echo <<<EOT
                        	<tr>
                            <td scope="row">$Product[Id]</td>
                            <td>$Product[Name]</td>
                            <td>$Product[CategoryID]</td>
                            <td>$Product[Price]</td>
                            <td>$Product[Quantity]</td>
                            <td>$Product[Expiration]</td>
                            <td>
                            <form action="$Page.php" method="get">
                            <input type="hidden" name="ProductID" value="$Product[Id]">
                            <button type="submit" name="EditProduct" class="btn btn-$btnColor rounded-pill">$btn</button>
                                   </form>
                            </td>
                            </tr>
                        EOT;
    	}
    }

        Public function AdminShowProduct(){
           if(isset($_GET['EditProduct'])){
            $ProductId = $_GET['ProductID'];
            return $this->GetProduct($ProductId);
        	}
    	}

    

    public function AdminViewOrders(){
        if(isset($_POST['search'])){
        $Ordermethod = new OrderMethod();
        $Orders = $Ordermethod->GetOrders($_POST['UserID']);
         if($Orders===false){ 
         echo "<script type='text/javascript'>alert('No Orders Found')</script>";
         }
        else { 
            echo 
            <<<EOT
                <table class="table table-striped">
                <thead>
                <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Price</th>
                <th scope="col">Order Data And Time</th>
                <th scope="col">Payment Method</th>
                </tr>
                </thead>
                <tbody>
            EOT;    
                 foreach($Orders as $Order){
            echo 
            <<<EOT
                <tr>
                <td scope="row">$Order[Id]</td>
                <td>$Order[UserID]</td>
                <td>$Order[Price]</td>
                <td>$Order[OrderDate]</td>
                <td>$Order[Name]</td>
                </tr>
            EOT;     
        
             }
            }
        }
    }


    public function CustomerViewOrders(){
        $Ordermethod = new OrderMethod();
        $Orders = $Ordermethod->GetOrders($_SESSION['UserID']);
                 foreach($Orders as $Order){
            echo 
            <<<EOT
                <tr>
                <td scope="row">$Order[Id]</td>
                <td>$Order[Price]</td>
                <td>$Order[OrderDate]</td>
                <td>$Order[Name]</td>
                </tr>
            EOT;     
         }   
            return count($Orders);
        }


    public function ViewAllUsers(){
        $users = $this->GetAllUsers();
        foreach ($users as $user) {
                            echo
                            <<<EOT
                                <tr>
                                <td scope="row">$user[Id]</td>
                                <td>$user[FName]</td>
                                <td>$user[LName]</td>
                                <td>$user[PhoneNo]</td>
                                <td>$user[Email]</td>
                                <td>$user[Address]</td>
                                </tr>
                            EOT;
                            }
    }

    public function returnUserName($ID){
       $user = $this->getUserByID($ID);
       return $user['FName'];
    }

    public function ViewOrdersCount(){
        $Ordermethod = new OrderMethod();
        $Orders = $Ordermethod->GetOrders($_SESSION['UserID']);
        if($Orders=='')
            return 0; 
        else
            return count($Orders);
    }



	}

?>
