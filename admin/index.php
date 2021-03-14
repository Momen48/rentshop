<?php 
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}

//include("inc/header.php")?>
<?php include('inc/nav.php')?>


<div class="close-btn fa fa-times"></div>

	
	<!-- SHOP CONTENT -->
	
  <div class="container text-center">
    <h1 class="display-4">E-Rent ADMIN Panel</h1>
    <p class="lead bg-info"> Providing best service in all around Bangladesh.</p>

    <hr>
    <p>"The greatest glory in living lies not in never falling, but in rising every time we fall." -Nelson Mandela</p>
  </div>

	<hr>

<?php include('inc/footer.php') ?>