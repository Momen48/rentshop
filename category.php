<?php 
require_once('database/config.php');
?>
<?php include('include/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Rent your product at best price!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
          
            </p>
        </header>

        <hr>

        <section class="on-sale">
<div class="container">
    <div class="title-box">
    <h2>Similar</h2>
    </div>
    <div class="row">
    <?php CatPage();?>
    </div>
</div>  
</section>



        <!-- Footer -->
        <?php include('include/footer.php');?>

    </div>