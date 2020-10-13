<?php 

	include "dbconnect.php";

	$id=$_POST["id"];
	$name=$_POST["name"];
	$fullpath=$_POST["oldphoto"];
	$logo=$_FILES["logo"];


	if ($logo['size']>0) {
		$basepath="img/category/";
		$fullpath=$basepath.$logo["name"];
		move_uploaded_file($logo['tmp_name'], $fullpath);
	}

	$sql="UPDATE categories SET name=:category_name, logo=:category_logo WHERE categories.id=:category_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':category_id',$id);
	$stmt->bindParam(':category_name',$name);
	$stmt->bindParam(':category_logo',$fullpath);
	$stmt->execute();
	
	header("location:category_list.php");

 ?>