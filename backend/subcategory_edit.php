<?php 
	
	session_start();
  	if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {

	include "include/header.php";
	include "dbconnect.php";

	$id=$_GET['id'];

	$sql="SELECT * FROM subcategories WHERE subcategories.id=:subcategory_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':subcategory_id',$id);
	$stmt->execute();
	$subcategory=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>

 	<!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Subcategory Edit</h1>
	 	<a href="subcategory_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	 </div>

	 <!-- Form -->
	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="updatesubcategory.php" method="POST" enctype="multipart/form-data">
	 			<input type="hidden" name="id" value="<?php echo $subcategory['id']; ?>">
	 			<div class="form-group">
	 				<label for="name">Subcategory Name</label>
	 				<input type="text" name="name" id="name" class="form-control" value="<?php echo $subcategory['name']; ?>">
	 			</div>
	 			<div class="form-group">
	 				<label for="cat_id">Category Id</label>
	 				<input type="text" name="cat_id" id="cat_id" class="form-control" value="<?php echo $subcategory['category_id']; ?>">
	 			</div>

	 			<input type="submit" class="btn btn-primary float-right" value="Update">
	 		</form>
	 	</div>
	 </div>

<?php 
	include "include/footer.php";
	}else{
    header("location:../index.php");
  }

?>