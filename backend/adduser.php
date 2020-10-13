<?php 
	
	include "dbconnect.php";

	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$photo=$_FILES["photo"];

	$basepath="img/";
	$fullpath=$basepath.$photo["name"];
	move_uploaded_file($photo['tmp_name'], $fullpath);


	$sql="INSERT INTO users (name,profile,phone,address,email,password) VALUES(:user_name,:user_profile,:user_phone,:user_address,:user_email,:user_password)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':user_name',$name);
	$stmt->bindParam(':user_profile',$fullpath);
	$stmt->bindParam(':user_phone',$phone);
	$stmt->bindParam(':user_address',$address);
	$stmt->bindParam(':user_email',$email);
	$stmt->bindParam(':user_password',$password);
	$stmt->execute();

	if ($stmt->rowCount()) {
		header("location:login.php");
	}else{
		header("location:register.php");
	}

 ?>