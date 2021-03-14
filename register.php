<?php 
session_start();
require_once ('database/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  </head>
  <body>

<?php if(isset($_GET['message'])){ 
	if($_GET['message'] == 2){
?>
<div class="alert alert-danger" role="alert"> 
<?php echo "Failed to Register"; ?> 
</div>
<?php } } ?>


  <form class="text-center" action="registerprocess.php" method="post" enctype="multipart/form-data">
  <div class="container">
  <div class="jumbotron">
    <h1>Register Here!</h1>
  </div>
   
</div>
            
                <div class="form-group"><label for="">
                    Email<input type="email" name="email" class="form-control" required></label>
                </div>
                <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" required></label>
                </div>

                <div class="form-group"><label for="password">
                   Re-enter Password<input type="password" name="password" class="form-control" required></label>
                </div>

                <div class="form-group">
                <button type="submit" name="submit" class="btn btn-dark" > Register</button>
                </div>
                
            </form>
  </body>
</html>
