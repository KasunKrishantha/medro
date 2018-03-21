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

		<title>Reset Password</title>

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
				<a class="navbar-brand" href="<?php echo site_url('auth'); ?>">Medro Dental Surgery</a>
			</div>
		</nav>

		<!-- Header -->
		<header class="masthead" style="padding-top: 0%;">
			<div class="container">
				<div class="intro-text">
					<div class="row justify-content-md-center">
						<div class="col-md-4">
							<div class="card" style="padding:0; margin:0; box-shadow: 0 15px 20px rgba(0, 0, 0, 1);">
								<div class="card-header">
									<h5 style="color: black;">Enter new password</h5>
								</div>
								<div class="card-body">
									<?php echo form_open('auth/save_new_password', 'class="form-signin" id="myform" style="padding: 2em 0 2em 0;"'); ?>
									<label for="inputPass1" class="sr-only">Password</label>
									<input type="password" id="inputPassword1" name="pass1" class="form-control" placeholder="Password" minlength="10" maxlength="20" required>
									<label for="inputPass2" class="sr-only">Confirm Password</label>
									<input type="password" id="inputPassword2" name="pass2" class="form-control" placeholder="Confirm Password" minlength="10" maxlength="20" required>
									<?php echo validation_errors(); ?>
									<?php if(isset($error_msg)){
                      echo "<div class='container' style='color: rgb(222, 0, 0); padding-top: 5%;'>";
                      echo $error_msg;
                      echo "</div>";
                    } ?>
									<button class="btn btn-primary btn-block" type="submit" style="margin-top: 1em;">Continue</button>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

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


	</body>

	</html>
