<?php 
require_once('database/config.php');
?>
<?php include('include/header.php');

if (isset($_POST) & !empty($_POST)){
  $subject=mysqli_real_escape_string($connection, $_POST['subject']);
  $email=mysqli_real_escape_string($connection, $_POST['email']);
  $message=mysqli_real_escape_string($connection, $_POST['message']);

  $sql="INSERT INTO `contact` (subject,email,message) VALUES ('$subject','$email','$message')";
  $res=mysqli_query($connection, $sql);
  if($res){
      $smsg="Message Send!";
      header('location:index.php');
  }else{
      $fmsg="Failed to send message!";
  }
}


?>
<!--conatct form -->
<!-- Contact Section -->

<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading ">
                
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="post">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="subject"type="text" class="form-control" placeholder="Enter Your subject" id="subject" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Enter Your Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button name="submit" type="submit" class="btn btn-outline-success">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<!------------Footer----------->
<?php include('include/footer.php');?>


