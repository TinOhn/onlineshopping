<?php 
	include "include/header.php";
	include "backend/dbconnect.php";

	$sql="SELECT items.*,brands.name as brand_name,subcategories.name as sub_name, categories.name as c_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id INNER JOIN categories ON subcategories.category_id=categories.id ORDER BY items.id DESC LIMIT 8";

	$stmt=$pdo->prepare($sql);
	$stmt->execute();
	$items=$stmt->fetchAll();


 ?>

	<!-- Carousel -->
	<div class="container-float carousel py-5">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/c1.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="images/c2.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrival -->
	<div class="container arrival py-3">
		<h1 class="text-center">New Arrival</h1>
		<div class="row pt-3">
			<?php 

			foreach($items as $item){

				?>
				<div class="col-md-4 col-sm-6 col-lg-3 mt-5">
					<div class="card">
						<div class="card_img">
							<img src="backend/<?= $item['photo'] ?>" class="card-img-top border image" alt="...">
							<a href="item_detail.php?id=<?=$item['id'] ?>" class="detail view_detail">
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
									<a href="javascript:void(0)" class="text-decoration-none text-dark item-add addtocart" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>" data-price="<?= $item['price'] ?>" data-discount="<?= $item['discount'] ?>">
										<i class="fas fa-cart-plus fa-lg py-3 item-add"></i>
									</a>
								</div>
							</div>
						</div>

					</div>

				</div>
			<?php } ?>
			<div class="col-md-12 col-sm-12 col-lg-12 text-center pt-4 mt-3">
				<a href="products.php"><button class="btn btn-outline-secondary" style="width: 180px;">View More</button></a>
			</div>	
		</div>
	</div>
	<div class="container py-5">
		<h1 class="text-center pb-3">About Us</h1>
		<div class="row">
			<div class="col-md-6 col-sm-12 col-lg-6">
				<img src="images/c1.jpg" class="img-fluid">
			</div>
			<div class="col-md-6 col-sm-12 col-lg-6">
				<p>While there once was a time when shopping online meant risky purchases and cheap quality, today is much different. Today you can find the biggest brands, and the best designer ranges just a click away on your screen. From sharp suits to the newest sneakers, you can shop all your fashion needs right from the comfort of your very own home. Here are the best online clothing stores you need to visit today.</p>
				<button class="btn btn-outline" style="width: 180px;">Learn More</button>
			</div>
		</div>
	</div>

	
	<?php 
 		include "include/footer.php";
	 ?>


