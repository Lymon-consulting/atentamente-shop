<?php
session_start(); //start session
include_once("config.inc.php"); //include config file
############# add products to session #########################
header("Content-Type: text/html;charset=utf-8");
if(isset($_GET["category"]))
{
	foreach($_GET as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}
	
	//we need to get product name and price from database.
   $acentos = $mysqli_conn->query("SET NAMES 'utf8'");
	$statement = $mysqli_conn->prepare("SELECT product_name, product_price FROM products_list WHERE category=?");
	$statement->bind_param('s', $new_product['id']);
	$statement->execute();
	$statement->bind_result($product_name, $product_price);
	

	while($statement->fetch()){ 
		$new_product["product_name"] = $product_name; //fetch product name from database
		$new_product["product_price"] = $product_price;  //fetch product price from database
		
		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['id']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['id']]); //unset old item
			}			
		}
		
		$_SESSION["products"][$new_product['id']] = $new_product;	//update products with new item array	
	}
	
 	$total_items = count($_SESSION["products"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json 

}

