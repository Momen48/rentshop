<?php 
	ob_start();
	session_start();
	require_once ('database/config.php');
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}

include ('include/header.php'); 

$uid = $_SESSION['customerid'];

?>
	
    <div class="card">
  <div class="card-body">
  <h5 class="text-center text-dark">Order Information</h5>

  <p class="text-center">My orders status!</p>
  </div>
</div>


	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						
					</div>
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				<?php
					$ordsql = "SELECT * FROM rents WHERE uid='$uid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							BDT <?php echo $ordr['totalprice']; ?>/-
						</td>
						<td>
							Ordered
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>		

			<br>
			<br>
			<br>

			

					</div>
				</div>
			</div>
		</div>
	</section>
<?php include ('include/footer.php') ?>
