<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "cssjs/css.php";
?>
<body>
    
  <?php
  include "includes/header.php";
  ?>
  <style>
  .field-border{
    border-radius:20px;
    
  }
  </style>
  

<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
      <div class="col-md-8" id="signup_msg">
         <!--Alert from signup form-->
       </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form id="signup_form" class="was-validated" method="post" action="backend/register.php">
              <div class="form-group" >
                <input type="text " name="f_name" class="form-control field-border" placeholder="Your Name"  required>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control field-border" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="event" class="form-control field-border" placeholder="Event" required>
              </div>
              <div class="form-group">
                <input type="text" name="phone" class="form-control field-border" placeholder="Phone" required>
              </div>
              <div class="form-group">
                <input  value="Register" type="submit" name="signup_button" class="btn btn-primary py-3 px-5 " required>
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>





<?php
include "includes/footer.php";
?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php
  include "cssjs/js.php";
  ?>
  </body>  
</html>