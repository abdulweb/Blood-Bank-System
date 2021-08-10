<?php
//session_start();
include('dbh.php');
include('user.php');

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style type="text/css">
		.brand-logo a small{
			font-weight: bolder;
			text-shadow:  2px 3px 0px rgba(0,0,0.7,0.2);;
		}
	</style>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php" class="text-danger">
					<!-- <img src="vendors/images/deskapp-logo.svg" alt=""> -->
					<strong>MA<small class="text-primary" style="">Blood Bank</small></strong>
					<!-- Maryam Abacha <small>Blood Bank</small> -->
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="feedBack.php" class="text-danger">FeedBack</a></li>
					<!-- <li><a href="register.html">Register</a></li> -->
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-danger">Login To Blood Bank</h2>
						</div>
						<?php
				                if(isset($_POST['login_btn']))
				                {
				                    $username = $_POST['username'];
				                    $password = $_POST['password'];
				                   $object->login($username,$password);
				                }
				        ?>
						<form id="login-form" action="index.php" method="post">
							
							<div class="input-group custom">
								<input type="email" class="form-control form-control-lg" name="username" placeholder="Username" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="password" placeholder="**********" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button class="btn btn-danger btn-lg btn-block" type="submit" name="login_btn"> Sign In</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-12">
					<small class="text-center text-danger" style="margin-left: 45%;"> <strong>Developed By Iya Zahida Muhammed  - 1610310209</strong></small>
				</div>
				
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script>
	// $('#login-form').submit(function(e){
	// 	e.preventDefault()
	// 	$('#login-form button[type="submit"]').attr('disabled',true).html('Logging in...');
	// })
</script>
</body>
</html>