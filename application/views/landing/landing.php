<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medro Dental Surgery</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/landing/agency.css'); ?>" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Medro Dental Surgery</a>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="row justify-content-md-center">
            <div class="col-md-6">
            </div>
            <div class="col-md-4">
              <div class="card" style="">
                <div class="card-body">
                  <h4 class="card-title" style="color: black;">Log-in to book your doctor online.</h4>
                    <?php echo form_open('auth/login', 'class="form-signin" id="myform" style="padding: 2em 0 2em 0;"'); ?>
                      <label for="inputEmail" class="sr-only">Email address</label>
                      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                      <label for="inputPassword" class="sr-only">Password</label>
                      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                      <?php echo validation_errors(); ?>
                      <?php if(isset($error_msg)){
                        echo "<div class='container' style='color: rgb(222, 0, 0);'>";
                        echo $error_msg;
                        echo "</div>";
                      } ?>
                      <button class="btn btn-primary btn-block" type="submit" style="margin-top: 1em;">Sign in</button>
                  <?php echo form_close(); ?>
                  <div>
                    <p>Don't have an account? <a style="" href="<?php echo site_url('auth/signup_form'); ?>">Sign up</a></p>
                    <p>Forgot your password? <a style="" href="<?php echo site_url('auth/reset_password_email'); ?>">Reset Password</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Find Us</h2>
          </div>
        </div>
        <div class="row justify-content-md-around" style="padding-top: 3em">
          <div class="col-lg-6">
            <div class="card" style="">
              <div class="card-body" id="map">
              </div>
            </div>
          </div>
          <div class="col-lg-4" id="contact-details">
            <a href="tel:0112657934">011-2657934</a>
            <p>88, Poorwarama Road,<br>Nugegoda,<br>Sri Lanka.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; medrodental.lk</span>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('assets/js/landing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url('assets/js/landing/agency.min.js'); ?>"></script>

    <!-- Google Maps API -->
    <script>
      function initMap() {
        var medro = {lat: 6.8742206, lng: 79.8857855};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: medro
        });
        var marker = new google.maps.Marker({
          position: medro,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbi8CNpYsOgDNG0RX_3DhfAtvFV7xJQgU&callback=initMap">
    </script>


  </body>

</html>
