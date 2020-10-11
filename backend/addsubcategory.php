<?php 
	
	include "dbconnect.php";

	$name=$_POST["name"];
	$cat_id=$_POST["cat_id"];
	

	$sql="INSERT INTO subcategories (name,category_id) VALUES(:subcategory_name,:subcategory_cat_id)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':subcategory_name',$name);
	$stmt->bindParam(':subcategory_cat_id',$cat_id);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:subcategory_list.php");
	}else{
		echo "Error";
	}

 ?>