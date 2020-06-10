<?php 
require_once 'classes/Model/Product.class.php';
/**
 * 
 */
class ProductView extends Product
{
	
	function __construct()
	{
		
	}
	//was ViewProduct
	public Function ViewSearchedProduct($Name){
		$products = $this->SearchProduct($Name);
			If($products==0){
				return 0;
			}
			foreach ($products as $product) {
			$NAME = $product['Name'];
			$IMAGE = $product['Image'];
			$PRICE = $product['Price'];
			$ID = $product['Id'];		
			$this->get_card($NAME,$IMAGE,$ID,$PRICE);
			}	
	}

	//for see all page
	public Function ViewCategoryProducts($CatgID){
		$products = $this->getProductByCatID($CatgID);
			If($products==0){
				return 0;
			}
			foreach ($products as $product) {
			$NAME = $product['Name'];
			$IMAGE = $product['Image'];
			$PRICE = $product['Price'];	
			$ID = $product['Id'];
			$this->get_card($NAME,$IMAGE,$ID,$PRICE);
			}	
	}
	public function ViewProductCounter($name){
	 	$count = $this->SearchProductCounter($name);
	 	return $count;
	}



		//See all and search result
	public	function get_card($name,$img,$id,$price){
			echo
		    <<<EOT
		  	<div class='col-md-3 pb-1 pt-2 pb-md-0'>
		   	   <div class='card rounded shadow-lg' style='width: 8rem,'>
		   	     <div class='containerimg'>
		   	       <img class='card-img-top img-fluid image' src='$img' alt=''>
		   	       <div class='middle'>
		   	         <form action='product.php' method='get'>
		   	         <input type='text' name='Product' style='display: none' value='$id'>
		   	         <input type='submit' class='btn btn-success' value='View Details' name='sendProduct'>
		   	         </form>
		        			</div>
		      			</div>
		          		<div class='card-body'>
		              <h6 class='card-title'>$name</h6>
		              <p>$price</p>
		              <form action='' method='post'>
		              <input type='hidden' name='id' value='$id'>
		              <input type='submit' class='btn btn-primary col-12' value='Add to Cart' name='add'>
		              </form>
		          </div>
		      </div>
		  </div>
		EOT;
		}


	//show all the products in categories  
	public  function ShowProductsMainPage(){
		 $categories = $this->getAllCategories();
		 foreach ($categories as $category) {
			echo		
			<<<EOT
					</div>
					</div>
			 		<hr>
			 		<h2 class='text-center'>$category[Name]</h2>
			 		<hr>
			 		<div class='container'>
			 		<div class='text-right my-2'>
			 		<form action='seeAll.php' method='get'>
			 		<input type='hidden' name='catg' value='$category[Id]'>
			 		<input type='hidden' name='name' value='$category[Name]'>
			 		<input type='submit' class='btn btn-success my-2 my-sm-0' value='See all' name='view'>
			 		</form>
			 		</div>
			 		<div class='row text-center'>
					
			EOT;
	        //gets category products
	    	 $products= $this->getProductByCatID($category['Id']);
	    	 $i=0;
	    	 while ($i<3 && @$products[$i]) {
	    	 	//show 3 category products  
	    	 	$this->get_card_main($products[$i]['Name'],$products[$i]['Image'],$products[$i]['Description'],$products[$i]['Price'],$products[$i]['Id']);	
	    	 	$i++;
	    	 	 }
		 	}
		}




	//MainPage
	public	function get_card_main($name,$img,$discreptions,$price,$id){
	echo
	    <<<EOT
	    <div class='col-md-4 pb-1 pb-md-0'>
	        <div class='card'>
	            <img class='card-img-top ' src='$img' alt='Card image cap'>
	            <div class='card-body'>
	                <h5 class='card-title'>$name</h5>
	                <p class='card-text'>
	                    $discreptions
	                </p>
	                <p class='card-text'>
	                $price
	                </p>
	                <form action='' method='post'>
	              <input type='hidden' name='id' value='$id'>
	              <input type='submit' class='btn btn-primary col-12' value='Add to Cart' name='add'>
	              </form>
	            </div>
	        </div>
	    </div>

	EOT;
	}
		 
	 //Product Details
	public  Function get_card_product($ID){
				$product = $this->getProductByID($ID);
				$name = $product['Name'];
				$img = $product['Image'];
				$discreptions = $product['Description'];
				$price = $product['Price'];
				$id = $product['Id'];
				echo 
				 <<<EOT
				<div class="container my-5 py-5">
				<div class="row my-5">
				<div class="col-4">
				<img src="$img" alt="..." class="img-thumbnail">
				</div>
				<div class="col-7 offset-1">
				<ul class="list-group list-group-flush pt-5">
				<li class="list-group-item py-4"><h5>$name</h5></li>
				<li class="list-group-item py-4"><h5>$price EGP</h5></li>
				<li class="list-group-item py-4"><h5>Description: $discreptions</h5></li>
				<form action="" method="post">
				<input type="hidden" name="id" value="$id">
				<input type="submit" class="btn btn-success my-2 m-sm-5 p-sm-3" value="Add to Cart" name="add">
				</form> 
				</ul>
				</div>
				</div>
				</div>
	EOT;
			}

	public	Function showLeftPanel(){
						$categories = $this->leftPanelInfo();
			foreach ($categories as $category) {
				?><a style = 'text-decoration: none' href='http://localhost/SW%20Final 2/seeAll.php?catg=<?php echo "$category[2]&name=$category[1]"?>&view=See+all'><li class='list-group-item list-group-flush d-flex justify-content-between align-items-center'>
	      	<?php echo($category[1]); ?>
	         <span class='badge badge-primary badge-pill'><?php echo($category[0]);?></span>
	           </li></a>
			<?php
			}
	}


}


?>