<?php 
	include "include/header.php";
	include "backend/dbconnect.php";

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name, categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id ORDER BY items.id DESC LIMIT 8";

	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();

 ?>

	<div class="container arrival my-5 pt-5">
		<h1 class="text-center">Our Products</h1>
		<div class="row pt-1">
			<?php 

			foreach($items as $item){

				?>
				<div class="col-md-4 col-sm-6 col-lg-3 mt-5">
					<div class="card">
						<div class="card_img">
							<img src="backend/<?= $item['photo'] ?>" class="card-img-top border image" alt="...">
							<a href="item_detail.php" class="detail view_detail" data-id="<?=$item['id'] ?>" data-name="<?=$item['name'] ?>" data-price="<?=$item['price'] ?>" data-discount="<?=$item['discount'] ?>" data-brand="<?=$item['brand_name'] ?>" data-subcategory="<?=$item['sub_name'] ?>" data-description="<?=$item['description'] ?>" data-photo="<?=$item['photo'] ?>">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fas fa-eye fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</div>
						<div class="card-body text-justify item-card-body">
							<p class="text-muted py-1 my-0"><b>Category: </b><?=trim($item['c_name'])?></p>
							<p class="text-muted py-1 my-0"><b>Name: </b><?=$item['name']?></p>
							<p class="text-muted py-1 my-0">
								<b>Price: </b>
								<?php 
								if($item['discount']){
									echo $item['discount']."MMK";

									?>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<del><?= $item['price']." MMK"; ?></del>
									<?php 
								}else{
									echo $item['price']." MMK";
								}
								?>
							</p>

						</div>
						<a href="javascript:void(0)" class="btn btn-outline-secondary btn-block addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>">Add to Cart</a>
					</div>

				</div>

			<?php } ?>

			<div class="col-md-12 col-sm-12 col-lg-12 text-center pt-4 mt-3">
				<a href="products.php"><button class="btn btn-outline-secondary" style="width: 180px;">View More</button></a>
			</div>	
		</div>
	</div>


	<?php 
		include "include/footer.php";
	 ?>
