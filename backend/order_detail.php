<?php 
	
	session_start();
  	if (isset($_SESSION['loginuser']) && $_SESSION['loginuser']['role_name']=="Admin") {

	include "include/header.php";
	include "dbconnect.php";

	$id=$_GET['id'];

	$sql="SELECT item_order.*,items.name as item_name,items.price as item_price,orders.voucherno as vno,orders.orderdate as order_date,orders.total as Total,users.name as user_name FROM item_order INNER JOIN items ON item_order.item_id=items.id INNER JOIN orders ON item_order.order_id=orders.id INNER JOIN users ON orders.user_id=users.id WHERE item_order.order_id=:id";
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$orderdetails=$stmt->fetchAll();
	// var_dump($orderdetails);

	date_default_timezone_set('Asia/Yangon');
	$ordertime=date('h:i:sA');


 ?>
 <!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	 	<h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
	 	<a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Back</a>
	</div>

	<div class="container">
	 	<div class="row">
	 		<table class="table table-bordered">
	 			<thead>
	 				<?php  foreach ($orderdetails as $orderdetail) {

	 				}

	 				?>
	 				<tr>
	 					<td colspan="4">
	 						<table class="table table-borderless">
	 							<tr>
	 								<td scope="col">Casher</td>
	 								<td scope="col">:</td>
	 								<td scope="col"><?= $orderdetail['user_name']; ?></td>
	 								<td scope="col">Date</td>
	 								<td scope="col">:</td>
	 								<td scope="col"><?= $orderdetail['order_date']; ?></td>
	 							</tr>
	 							<tr>
	 								<td scope="col">Voucherno</td>
	 								<td scope="col">:</td>
	 								<td scope="col"><?= $orderdetail['vno']; ?></td>
	 								<td scope="col">Order Time</td>
	 								<td scope="col">:</td>
	 								<td scope="col"><?= $ordertime; ?></td>
	 							</tr>	
	 						</table>
	 					</td>
	 				</tr>
	 				<tr>
	 					<th>Item Name</th>
	 					<th>Price</th>
	 					<th>Qty</th>
	 					<th>Amount</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php  foreach ($orderdetails as $orderdetail) {

	 					$price=$orderdetail['item_price'];
	 					$qty=$orderdetail['qty'];
	 					$amount=$price*$qty;


	 					?>
	 					<tr>
	 						<td><?php echo $orderdetail['item_name']; ?></td>
	 						<td><?php echo $orderdetail['item_price']; ?></td>
	 						<td><?php echo $orderdetail['qty']; ?></td>
	 						<td><?php echo $amount; ?></td>
	 					</tr>

	 				<?php } ?>
				<!-- <tr>
					<td>
						<table class="table table-borderless">
							<tr>
								<td scope="col" colspan="3">Total Amount</td>
								<td scope="col">:</td>
								<td scope="col"><?= $orderdetail['Total']; ?></td>
							</tr>	
						</table>
					</td>
				</tr> -->
				<tr>		
					<td scope="col" colspan="3">Total Amount</td>
					<!-- <td scope="col">:</td> -->
					<td scope="col"><?= $orderdetail['Total']; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>

<?php 

	include "include/footer.php";

	}else{
    header("location:../index.php");
  }

 ?>


 