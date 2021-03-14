<?php 
require_once('database/config.php');
?>
<?php include('include/header.php');?>

<?php include('include/side_nav.php');?>
<!-- slider -->
<?php include('include/slider.php');?>

<!---------------featured-categories---------------->
<?php include('include/feature_photo.php');?>
<!-----------------On Sale product------------------>
<section class="on-sale">
<div class="container">
    <div class="title-box">
    <h2>On Sale</h2>
    </div>
    <div class="row">
<?php get_product() ?>
    </div>
</div>  
</section>
    
<!-------------Men----------------->    
<section class="new-products">
    <div class="container">
    <div class="title-box">
    <h2>MEN</h2>
    </div>
    <div class="row">
<!--1st row for Salwars-->      
<?php men_product() ?>
    </div>
</div>
</section> 

<!--------------Women----------------->   
<section class="new-products">
    <div class="container">
    <div class="title-box">
    <h2>WOMEN</h2>
    </div>
    <div class="row">
<!--1st row for Salwars-->      
<?php women() ?>
    </div>
</div>
</section>
<!----------------Website features----------------->
<?php include('include/web_feature.php');?>

<!------------Footer----------->
<?php include('include/footer.php');?>










