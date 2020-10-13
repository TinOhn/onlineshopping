<?php 

	include "include/header.php";
	include "dbconnect.php";

	$id=$_GET['id'];

	$sql="SELECT * FROM categories WHERE categories.id=:category_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':category_id',$id);
	$stmt->execute();
	$category=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>

 	<!-- Page Heading -->
	 <div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Category Edit</h1>
	 	<a href="category_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Go Back</a>
	 </div>

	 <!-- Form -->
	 <div class="row">
	 	<div class="offset-md-2 col-md-8">
	 		<form action="updatecategory.php" method="POST" enctype="multipart/form-data">
	 			<input type="hidden" name="id" value="<?php echo $category['id']; ?>">
	 			<div class="form-group">
	 				<label for="name">Category Name</label>
	 				<input type="text" name="name" id="name" class="form-control" value="<?php echo $category['name']; ?>">
	 			</div>

	 			<div class="form-group">
	 				<label for="logo">Category logo</label>
	 				<input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">
	 				<input type="hidden" name="oldphoto" value="<?php echo $category['logo']; ?>">
	 				<img src="<?php echo $category['logo']; ?>" width="150" height="150">
	 			</div>

	 			<input type="submit" class="btn btn-primary float-right" value="Update">
	 		</form>
	 	</div>
	 </div>

<?php 
	include "include/footer.php";
?>