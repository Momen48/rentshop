<?php 
require_once('database/config.php');
?>
<?php include('include/header.php');?>
<section class="on-sale">
<div class="container">
    <div class="title-box">
    <h2> Collections</h2>
    </div>
    <div class="row">
    <?php shop_Page() ?>
    </div>
</div>  
</section>


<?php include('include/web_feature.php');?>
<!------------Footer----------->
<?php include('include/footer.php');?>