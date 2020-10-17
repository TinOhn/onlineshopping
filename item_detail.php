<?php 
	include "include/header.php";
	include "backend/dbconnect.php";

	$id=$_GET['id'];
	
	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name, categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id WHERE items.id=:item_id";

	$stmt=$pdo->prepare($sql);
	$stmt->bindParam('item_id',$id);
	$stmt->execute();
	$items=$stmt->fetch(PDO::FETCH_ASSOC);

 ?>


	<div class="container arrival my-5 py-5">
		<h1 class="text-center py-5">Products Detail</h1>
		<div class="row mt-3">
			<div class="col-md-6 col-lg-6 col-sm-12 main_img">
				<img src="backend/<?php echo $items['photo'] ?>" class="img-fluid">	
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12">
				<p class="text-muted py-1 my-0"><b>Category: </b><?=trim($items['c_name'])?></p>
				<p class="text-muted py-1 my-0"><b>Name: </b><?=$items['name']?></p>
				<p class="text-muted py-1 my-0">
					<b>Price: </b>
					<?php 
					if($items['discount']){
						echo $items['discount']."MMK";

						?>
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<del><?= $items['price']." MMK"; ?></del>
						<?php 
					}else{
						echo $items['price']." MMK";
					}
					?>
				</p>
				<p class="text-muted py-1 my-0"><b>Description: </b><?=$items['description']?></p>
				<p class="text-muted py-1 my-0"><b>QTY: </b><input type="number" class="form-control" name="qty" value="1" style="width: 100px;"></p>
				
				<a href="javascript:void(0)" class="text-decoration-none text-dark  addtocart" data-id="<?= $items['id'] ?>" data-name="<?= $items['name'] ?>" data-price="<?= $items['price'] ?>" data-discount="<?= $items['discount'] ?>" style="width: 150px;">Add to Cart</a>
			</div>
		</div>
	</div>


	<?php 
 		include "include/footer.php";
	 ?>

</body>
</html>