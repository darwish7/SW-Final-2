<?php 

/**
 * 
 */
class Product
{
	
	function __construct()
	{
		
	}

	protected Function MAXID(){
			//RETURNS THE NUMBER OF PRODUCTS TO LOOP THROUGH THEN ****(HELPS TO SEARCH A PRODUCT A TIME IN THE SEARCH FUNCTION)******
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$stmt = $conn->prepare ("select MAX(Id) from product");
			$stmt->execute();
			$rows = $stmt->fetch();
			$MAXID = $rows["MAX(Id)"];
			Return $MAXID;		
		}

	protected Function MAXIDCAT(){
			//RETURNS THE NUMBER OF CATEGORIES *************WARNING : DONT LEAVE EMPTY CATIGORIES ***************************
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$stmt = $conn->prepare ("select MAX(Id) from category");
			$stmt->execute();
			$rows = $stmt->fetch();
			$MAXID = $rows["MAX(Id)"];
			Return $MAXID;		
		}
	protected Function SearchProductCounter($Name){
			//Counts number of results that is found used in search result page
			$connect = Connection::getInstance();
	      	$conn = $connect->getConnection();
			$maxid = $this->MAXID();
			$resultcount = 0;
			//result count is incremented every time a result is found
			for ($id=1;$id<=$maxid;$id++){
  				$stmt = $conn->prepare("SELECT Id FROM Product WHERE NAME LIKE '%$Name%' AND Id IN ('$id')");
				$stmt->execute();
				$rows = $stmt->fetch(PDO::FETCH_ASSOC);
				//print_r($rows);
				$ID = @$rows['Id'];
  				if(!$ID == NULL || !$ID=="")
  				{
  					$resultcount ++;
  				}
			}
			return $resultcount;
		}	

	protected Function SearchProduct($Name){
			//Gets name from search field search in the whole table and send Id to ViewProduct;
			//ViewProduct send the data to get_card to show it 
			$ProductList = [];
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$maxid = $this->MAXID();
			for ($id=1;$id<=$maxid;$id++){
				$stmt = $conn->prepare ("SELECT * FROM Product WHERE NAME LIKE '%$Name%' AND Id IN ('$id')");
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if($row!==false)
					array_push($ProductList,$row);
			}
			return $ProductList;
		}


	protected Function getCatID($CATname){
			//gets category name from main page and send id for the SearchProductByCatID as the ID is the foreign key.
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$id = NULL;
			$stmt = $conn->prepare ("select Id from category where Name = '$CATname'");
			$stmt->execute();
			$rows = $stmt->fetch();
			$ID = $rows['Id'];
			Return $ID;		
		}
		//was search instead of get
	protected Function getProductByCatID($CATID){
			//Search Products knowing the Category id for the seeAll page  
			//NOTICE ID = CATEGORY ID AND id = PRODUCT ID
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$stmt = $conn->prepare ("SELECT * FROM Product WHERE CategoryID = '$CATID'");
			$stmt->execute();
			$ProductList = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $ProductList;
			}


	protected  Function leftPanelInfo(){
			//GETS THE NAME OF CATEGORIES AND THE NUMBER TO SEND THEM TO SHOW PANEL INFO 
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$maxid=$this->MAXIDCAT();
			$CountArray = [];
			for($ID=1;$ID<=$maxid;$ID++){
			$stmt1 = $conn->prepare ("select Name,Id from category where Id='$ID'");
			$stmt1->execute();
			$rows = $stmt1->fetch();
			$catname = @$rows["Name"];
			$catId = @$rows['Id'];
			$stmt2 = $conn->prepare ("Select COUNT(*) FROM product WHERE CategoryID = '$ID'");
			$stmt2->execute();
			$row = $stmt2->fetch(PDO::FETCH_NUM);
			if($row[0]!=0){
					$result = array_push($row,$catname,$catId);
					array_push($CountArray,$row);
			}
			}
			return $CountArray;
		}

	protected Function getProductByID($ID){
			$connect = Connection::getInstance();
      		$conn = $connect->getConnection();
			$stmt = $conn->prepare ("SELECT * FROM Product WHERE Id = '$ID'");
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
			}
	protected function getAllCategories(){
		$connect = Connection::getInstance();
      	$conn = $connect->getConnection();
		$stmt = $conn->prepare ("SELECT * FROM category");
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}





}



?>