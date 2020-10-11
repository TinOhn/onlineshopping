<?php 
	
	include "dbconnect.php";

	$name=$_POST["name"];
	$logo=$_FILES["logo"];

	$basepath="img/category/";
	$fullpath=$basepath.$logo["name"];
	move_uploaded_file($logo['tmp_name'], $fullpath);

	 // echo "$name <br>";
	 // print_r($photo);

	$sql="INSERT INTO categories (name,logo) VALUES(:category_name,:category_logo)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':category_name',$name);
	$stmt->bindParam(':category_logo',$fullpath);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:category_list.php");
	}else{
		echo "Error";
	}

 ?>