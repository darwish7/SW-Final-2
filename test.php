<?php
require_once 'includes/Connection.inc.php';


	Function MAXID(){
			//RETURNS THE NUMBER OF PRODUCTS TO LOOP THROUGH THEN ****(HELPS TO SEARCH A PRODUCT A TIME IN THE SEARCH FUNCTION)******
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$stmt = $conn->prepare ("select MAX(Id) from product");
			$stmt->execute();
			$rows = $stmt->fetch();
			$MAXID = $rows["MAX(Id)"];
			Return $MAXID;		
		}

	 Function SearchProduct($Name){
			//Gets name from search field search in the whole table and send Id to ViewProduct;
			//ViewProduct send the data to get_card to show it 
			$ProductList = [];
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$maxid = MAXID();
			for ($id=1;$id<=$maxid;$id++){
				$stmt = $conn->prepare ("SELECT * FROM Product WHERE NAME LIKE '%$Name%' AND Id IN ('$id')");
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if($row!==false)
					array_push($ProductList,$row);
			}
			return $ProductList;
		}

			
		 Function getProductByCatID($CATID){
			//Search Products knowing the Category id for the seeAll page  
			//NOTICE ID = CATEGORY ID AND id = PRODUCT ID
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			//$maxid = ->MAXID();
			$stmt = $conn->prepare ("SELECT * FROM Product WHERE CategoryID = '$CATID'");
			$stmt->execute();
			$ProductList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			//print_r($ProductList);
			return $ProductList;
			}
	function getAllCategories(){
		$connect = Connection::getInstance();
      	$conn = $connect->getConnection();
		$stmt = $conn->prepare ("SELECT Name,Id FROM category");
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($rows);
		return $rows;
	}


	 function ShowProductsMainPage(){
	 $categories = getAllCategories();
	 foreach ($categories as $category) {
		echo		
		<<<EOT
		 		<hr>
		 		<h2 class="text-center">$category[Name]</h2>
		 		<div class="container">
		 		<div class="text-right my-2">
		 		<form action="seeAll.php" method="get">
		 		<input type="hidden" name="catg" value="$category[Id]">
		 		<input type="submit" class="btn btn-success my-2 my-sm-0" value="See all" name="view">
		 		</form>
		 		</div>
		 		<div class="row text-center">
		EOT;
        //gets category products
    	 $products= getProductByCatID($category['Id']);
    	 $i=0;
    	 while ($i<3 && @$products[$i]) {
    	 	//show 3 category products  
    	 	get_card_main($products[$i]['Name'],$products[$i]['Image'],$products[$i]['Description'],$products[$i]['Price'],$products[$i]['Id']);	
    	 	$i++;
    	 	 }
	 	}
	}
		function get_card_main($name,$img,$discreptions,$price,$id){
	echo
	    <<<EOT
	    <div class="col-md-4 pb-1 pb-md-0">
	        <div class="card">
	            <img class="card-img-top " src="$img" alt="Card image cap">
	            <div class="card-body">
	                <h5 class="card-title">$name</h5>
	                <p class="card-text">
	                    $discreptions
	                </p>
	                <p class="card-text">
	                $price
	                </p>
	                <form action="" method="post">
	              <input type="hidden" name="id" value="$id">
	              <input type="submit" class="btn btn-primary col-12" value="Add to Cart" name="add">
	              </form>
	            </div>
	        </div>
	    </div>
	EOT;
	}
	 
	
		 Function leftPanelInfo(){
			//GETS THE NAME OF CATEGORIES AND THE NUMBER TO SEND THEM TO SHOW PANEL INFO 
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			//$maxid=->MAXIDCAT();

			$CountArray = [];
			for($ID=1;$ID<=20;$ID++){
			$stmt1 = $conn->prepare ("select Name from category where Id='$ID'");
			$stmt1->execute();
			$rows = $stmt1->fetch();
			$catname = @$rows["Name"];
			$stmt2 = $conn->prepare ("Select COUNT(*) FROM product WHERE CategoryID = '$ID'");
			$stmt2->execute();
			$row = $stmt2->fetch(PDO::FETCH_NUM);
			if($row[0]!=0){
					$result = array_push($row,$catname);
					array_push($CountArray,$row);
			}
			}
			return $CountArray;
		}


/*$CategoryProducts = getProductByCatID(5);
print($CategoryProducts[0]['Name']);
*/
$Cats = leftPanelInfo();
print_r($Cats);
foreach ($Cats as $cat) {
	print($cat[1].' ');
	print($cat[0].' ');
}

  
  ?>