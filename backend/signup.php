<?php 
	
	session_start();
	include "dbconnect.php";

	$name=$_POST["name"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$password=$_POST["password"];
	$cpassword=$_POST['user_cpassword'];
	$address=$_POST["address"];
	$photo=$_FILES["photo"];


	$_SESSION['old_name']=$name;
	$_SESSION['old_email']=$email;
	$_SESSION['old_phone']=$phone;
	$_SESSION['old_password']=$password;
	$_SESSION['old_cpassword']=$cpassword;
	$_SESSION['old_address']=$address;



	$basepath="img/";
	$fullpath=$basepath.$photo["name"];
	move_uploaded_file($photo['tmp_name'], $fullpath);


	if($name==null || $email==null || $phone==null || $address==null || $password==null || $cpassword==null || $photo['size']==0){

		if($photo['size']==0){
			$_SESSION['profile_error_msg']="User Profile is Require!";
		}elseif($name==null){
			$_SESSION['name_error_msg']="User Name is Require!";
		}elseif($email==null){
			$_SESSION['email_error_msg']="User email is Require!";
		}elseif($phone==null){
			$_SESSION['phone_error_msg']="User phone is Require!";
		}elseif($password==null){
			$_SESSION['password_error_msg']="User password is Require!";
		}elseif($cpassword==null){
			$_SESSION['cpassword_error_msg']="User cpassword is Require!";
		}else{
			$_SESSION['address_error_msg']="User address is Require!";
		}

		header("location:register.php");

	}elseif($password!=$cpassword){
		$_SESSION['password_error_msg']="Password and confirm password does not match!";
		header("location:register.php");
	}else{
		$password=sha1($password);

		$sql="INSERT INTO users (name,profile,email,password,phone,address) VALUES(:user_name,:user_profile,:user_email,:user_password,:user_phone,:user_address)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':user_name',$name);
		$stmt->bindParam(':user_profile',$fullpath);
		$stmt->bindParam(':user_email',$email);
		$stmt->bindParam(':user_password',$password);
		$stmt->bindParam(':user_phone',$phone);
		$stmt->bindParam(':user_address',$address);
		$stmt->execute();

		if ($stmt->rowCount()) {
			header("location:login.php");
		}else{
			echo "Error";
		}

		$sql="SELECT * FROM users ORDER BY id DESC LIMIT 1";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$user=$stmt->fetch(PDO::FETCH_ASSOC);

		$user_id=$user['id'];
		$role_id=1;

		$sql="INSERT INTO model_has_roles(user_id,role_id) VALUES(:user_id,:role_id)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindParam(':user_id',$user_id);
		$stmt->bindParam(':role_id',$role_id);
		$stmt->execute();
		if($stmt->rowCount()){
			header("location:login.php");
		}else{
			echo "Error";
		}

	}


	

 ?>