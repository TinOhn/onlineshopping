<!DOCTYPE html>
<html>
<head>
	<title>My Store</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/main.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script type="text/javascript">

    $(document).ready(function(){
      $("#nav2").hide();
      $("#nav1").show();

      $("#search1").click(function(){
        $("#nav2").show();
        $("#nav1").hide();
      })

      $("#back").click(function(){
        $("#nav2").hide();
        $("#nav1").show();
      })

    })

  </script>

</head>
<body>

	<!-- Navbar -->
	<div class="container-float fixed-top" id="nav1">
		<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 menu">
			<div class="container">
				<a href="index.php"><h3 class="navlogo">Tin Store</h3></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="myNav" class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto px-5">
						<li class="nav-item"><a href="index.php" class="nav-link px-4">Home</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Products
							</a>
							<div class="dropdown-menu drop" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="shirts.php">Shirts</a>
								<a class="dropdown-item" href="suits.php">Suits</a>
								<a class="dropdown-item" href="pants.php">Pants</a>
								<a class="dropdown-item" href="shoes.php">Shoes</a>
								<a class="dropdown-item" href="newarrival.php">New Arrival</a>
							</div>
						</li>
						<li class="nav-item"><a href="about.php" class="nav-link px-4">About</a></li>
						<li class="nav-item"><a href="contact.php" class="nav-link px-4">Contact</a></li>
						<li><i class="fas fa-shopping-cart px-4"><span> 3</span></i></li>
						<li><i class="fas fa-search px-4" id="search1"></i></li>
					</ul>
				</div>
			</div>
		</nav>
  	</div>
  	<div class="container-float fixed-top" id="nav2">
  		<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 menu">
  			<input type="hidden" name="sid" id="sid">
  			<i class="fas fa-arrow-left" id="back"></i>
  			<div class="container" id="psize">
  				<div class="input-group my-2">
  					<input type="text" class="form-control" placeholder="Search This Site" aria-label="Search Products" aria-describedby="button-addon2" style="font-size: 1.2rem; color: black;">
  					<div class="input-group-append">
  						<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search px-4"></i></button>
  					</div>
  				</div>
  			</div>
  		</nav>
  	</div>