<?php 
	include "include/header.php";
	include "backend/dbconnect.php";

	$id=$_GET['id'];
	$sql="SELECT * FROM subcategories WHERE subcategories.category_id=:c_id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':c_id',$id);
	$stmt->execute();
	$subcategories=$stmt->fetchAll();

	

 ?>

	<div class="container my-5 pt-5">
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-12 py-3">
				<div class="card py-3">
					<ul class="list-group list-group-flush">
						<?php 
							foreach ($subcategories as $subcategory) {
								
						 ?>
						<a href="subcategories.php?id=<?=$subcategory['id']?>">	<li class="list-group-item"><?=$subcategory['name']?></li></a>

						<?php 
							}
						 ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-lg-9 col-sm-12 py-3">
				<div class="row">
					<?php
					foreach ($subcategories as $subcategory) {
						$sub_id=$subcategory['id'];

						$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name,categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id WHERE items.subcategory_id=:sub_id";
						$stmt=$pdo->prepare($sql);
						$stmt->bindParam(':sub_id',$sub_id);
						$stmt->execute();
						$items=$stmt->fetchAll();

						foreach ($items as $item) {		
							?>
					<div class="col-md-4 col-sm-6 col-lg-4 py-3">
						<div class="card">
							<div class="card_img">
								<img src="backend/<?= $item['photo'] ?>" class="card-img-top border image" alt="...">
								<a href="item_detail.php" class="detail view_detail">
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
							<div class="container-fluid p-0 m-0">
								<div class="row text-center p-0 m-0">
									<div class="col-md-6 bg-info mt-1">
										<a href="#" class="text-decoration-none text-dark item-save">
											<i class="fas fa-heart fa-lg py-3"></i>
										</a>
									</div>
									<div class="col-md-6 bg-success mt-1">
										<a href="" class="text-decoration-none text-dark item-add addtocart">
											<i class="fas fa-cart-plus fa-lg py-3 item-add"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php
				}
				}
				 ?>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 text-center pt-4 mt-3">
				<a href="products.php" class="btn btn-outline-secondary" style="width: 180px;">View More</a>
			</div>
			</div>

		</div>
				
	</div>


	<?php 
		include "include/footer.php";
	 ?>
