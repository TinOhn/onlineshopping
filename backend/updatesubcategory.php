<?php 

	include "dbconnect.php";

	$id=$_POST["id"];
	$name=$_POST["name"];
	$category_id=$_POST["cat_id"];


	$sql="UPDATE subcategories SET name=:subcategory_name, category_id=:subcategory_cat_id WHERE subcategories.id=:subcategory_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':subcategory_id',$id);
	$stmt->bindParam(':subcategory_name',$name);
	$stmt->bindParam(':subcategory_cat_id',$category_id);
	$stmt->execute();
	
	header("location:subcategory_list.php");

 ?>