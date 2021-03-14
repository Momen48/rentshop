<?php
session_start();
include ('database/config.php'); 
include ('include/header.php'); 
$cart = $_SESSION['cart'];
?>
	
	<div class=""></div>


<div class="card">
<div class="card-body">
<h5 class="text-center text-dark">Cart Page</h5>

<p class="text-center">Products that are added to cart.</p>
</div>
</div>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
					</div>



					<div class="col-md-12">

<table class="cart-table table table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Rent Per Week</th>
						<th>Total Weeks</th>
						<th>Total</th>
                        <th>Image</th>
                        <th>remove</th>
						
					</tr>
				</thead>
				<tbody>
				<?php 
				$total = 0;
				foreach($cart as $key => $value){
					$sql="SELECT * FROM products WHERE id=$key";
					$cartres = mysqli_query($connection, $sql);
					$cartrow=mysqli_fetch_assoc($cartres);
					$price=$cartrow['price']*$value['quantity'];
					
					if($value['quantity']<=4){
						$discount_price= $price-($price*(($value['quantity']-1)*10)/100);
					}else{
						$discount_price= $price-($price*(4*10)/100);
					}
					$total+=$discount_price;
				?>
					<tr>
						<td>
							<a href="single.php?id=<?php echo $cartrow['id'];?>"> 
							<?php echo substr($cartrow['name'], 0 , 30);  ?></a>					
						</td>

						<td>
							<span class="amount">BDT <?php echo $cartrow['price'];?></span>					
						</td>

						<td>
							<div class="quantity"><?php echo $value['quantity']?></div>
						</td>
                                                
						<td>
						<span class="amount">BDT - <?php 
						
						echo $discount_price; ?> 
                        </span>					
						</td>
                                                <td>
							<a href="#"><img src="admin/<?php echo $cartrow['thumb'];?>" alt="" 
                                                        style="height: 90px; width:90px;" ></a>					
						</td>

                                                <td>
							<a class="remove" href="delcart.php?id=<?php echo $key;?>">
                                                        <i class="fa fa-trash" style="font-size: 23px"></i>
                                                        </a>
						</td>
					</tr>
				<?php 
			
				
				}
				?>
						<td colspan="6" class="actions">
						
							</div>
							<div class="col-md-6">
								<div class="cart-btn">
								<a href="checkout.php" class="btn btn-info" >Checkout</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>		

			<div class="cart_totals">
				<div class="col-md-6 pull-right">
					<h4 class="heading">Cart Totals</h4>
					<table class="table table-bordered col-md-6">
						<tbody>
							<tr>
								<th>Cart Subtotal</th>
								<td><span class="amount">BDT- <?php echo $total;?></span></td>
							</tr>
							<tr>
								<th>Shipping and Handling</th>
								<td>
									Free Shipping				
								</td>
							</tr>
							<tr>
								<th>Order Total</th>
								<td><strong><span class="amount">BDT- <?php echo $total;?></span></strong>
                                                        </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>			
							
					</div>
				</div>
			</div>
		</div>

   
	<div class="container">
    <div class="title-box">
    <h2>Similar</h2>
    </div>
    <div class="row">
    <?php rand_prod();?>
    
    </div>
</div>


	</section>
	
<?php include('include/footer.php')?>