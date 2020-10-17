<?php 
	include "include/header.php";
 ?>
 	
	<div class="container my-5 pt-5">
		<h1 class="text-center py-3">Products Detail</h1>
		<div class="row pt-3">
			<div class="col-md-6 col-lg-6 col-sm-12">
				<div class="text-center border">
					<img src="images/Fooraabo Luxury.webp" class="img-fluid img1 ">
                    <img src="images/Amazon.jpg" class="img-fluid img1">
                    <img src="images/AXQ.jpg" class="img-fluid img1">
				</div>	
				<div class="text-center my-3">
				  	<img  onclick="currentDiv(1)" src="images/Fooraabo Luxury.webp" class="img-fluid demo" style="width: 30%; height: 30%" >
				  	<img  onclick="currentDiv(2)" src="images/Amazon.jpg" class="img-fluid demo" style="width: 30%; height: 30%">
				  	<img  onclick="currentDiv(3)" src="images/AXQ.jpg" class="img-fluid demo" style="width: 30%; height: 30%">
				</div>
				<script>
					var Index=1;
					showIndex(Index);
					function plusDivs(n){
						showIndex(Index +=n);
					}
					function currentDiv(n){
						showIndex(Index=n);
					}
					function showIndex(n){
						var i;
						var x=document.getElementsByClassName("img1");
						var dots=document.getElementsByClassName("demo");
						if(n>x.length){
							Index=1;
						}
						if(n<1){
							Index=x.length;
						}
						for(i=0; i<x.length;i++){
							x[i].style.display="none";
						}
						for(i=0;i<dots.length;i++){
							dots[i].className=dots[i].className.replace("");
						}
						x[Index-1].style.display="block";
						dots[Index-1].className="";




					}
				</script>
				 
			</div>

			<div class="col-md-6 col-lg-6 col-sm-12 mt-3">
				<h5 class="card-title">Shoe 1</h5>
				<p class="card-text">Price: 20000 MMK</p>
				<p class="card-text"><del>40000 MMK</del></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
				<div class="color-wrap">
					<p class="color-desc">
						Color: 
						<a href="#" class="color color-1"></a>
						<a href="#" class="color color-2"></a>
						<a href="#" class="color color-3"></a>
						<a href="#" class="color color-4"></a>
						<a href="#" class="color color-5"></a>
					</p>
				</div>
				<div class="size-wrap">
					<p class="size-desc">
						Size: 
						<a href="#" class="size size-1">38</a>
						<a href="#" class="size size-2">39</a>
						<a href="#" class="size size-3">40</a>
						<a href="#" class="size size-4">41</a>
						<a href="#" class="size size-5">42</a>
						<a href="#" class="size size-5">43</a>
					</p>
				</div>
				<div class="qty mb-4">
					<h5>QTY</h5>
					<button class="btn1">-</button><input type="text" class="mx-1 px-3" name="qty" value="1" style="width: 70px;"><button class="btn2">+</button>
				</div>
				<a href="#" class="btn btn-success" style="width: 120px;">Buy Now</a>
				<a href="#" class="btn btn-outline-secondary">Add to Cart</a>
			</div>
		</div>
	</div>

	
	<?php 
 		include "include/footer.php";
	 ?>

	
</body>
</html>