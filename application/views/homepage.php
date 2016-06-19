<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Wanni's Kitchen</title>

		<link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary JavaScript plugins) -->
		<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-ui.js')?>"></script>
		<link href="<?php echo site_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' />
		<link href="<?php echo site_url('assets/css/signin.css'); ?>" rel='stylesheet' type='text/css' />
		<link href="<?php echo site_url('assets/css/custom.css'); ?>" rel='stylesheet' type='text/css' />
		<link href="<?php echo site_url('assets/css/jquery-ui.css'); ?>" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Energy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
		<!--/animated-css-->

		<!--/script-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event) {
					event.preventDefault();
					$('html,body').animate({
						scrollTop : $(this.hash).offset().top
					}, 900);
				});
			});
		</script>
		<!--script-->
		<script>
			$(function() {

				// Initialize the gallery
				//$('.works a.gal').touchTouch();
			});
		</script>
	</head>
	<body>
		<!-- banner -->
		<div class="container-fluid custom_container">
			<div class="banner banner2">
				<div class="header row">
					<div class="col-md-4 head-logo">
						<h1><a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/engry.png'); ?>" alt="" />ENERGY</a></h1>
					</div>
					<div class="col-md-4 pot">
						<p class="text-center"><img src="<?= base_url('assets/images/brownPot.png'); ?>" width=64 height=64 alt="" /><span class="pot_cost">&pound;<span class="summary_cost"> 0.00</span></span>
						</p>
					</div>
					<div class="col-md-4 social">
						<ul>
							<li>
								<a href="#"><i class="facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="dribble"></i></a>
							</li>
							<li>
								<a href="#"><i class="google"></i></a>
							</li>
							<?php if (!$this->ion_auth->logged_in()): ?>
							<li>
								<a href="<?= base_url('users/login'); ?>">
								<button type="button" class="btn btn-primary btn-lg">
									Login/Register
								</button></a>
							</li>
							<?php else: ?>
							<li>
								<a href="<?= base_url('users/logout'); ?>">
								<button type="button" class="btn btn-primary btn-lg">
									Logout
								</button></a>
							</li>
							<?php endif; ?>

						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="top-menu">
					<span class="menu"><img src="<?= base_url('assets/images/nav-icon.png'); ?>"></span>
					<ul>
						<li class="active">
							<a href="<?= base_url(); ?>">Home</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>">About</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>">News & Events</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>">Team</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>">Contact</a>
						</li>
						<li>
							<a href="<?= base_url('users/my_account'); ?>">My Account</a>
						</li>

						<div class="clearfix"></div>
					</ul>
					<!-- script-for-menu -->
					<script>
						$("span.menu").click(function() {
							$(".top-menu ul").slideToggle("slow", function() {
							});
						});
					</script>
					<!-- script-for-menu -->
				</div>
					
				</div>
				
			</div>
			<div class="content">
				<?php $this -> load -> view($subview); ?>
			</div>
			<!---->
			<div class="footer1">
				<div class="ftr1-grids">
					<div class="col-md-4 ftr-grid1">
						<div class="head-logo logo">
							<h1><a href="index.html"><img src="<?= base_url('images/engry.png'); ?>" alt=""/>ENERGY</a></h1>
						</div>
						<p>
							It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
							The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
						</p>
						<a class="view" href="#">View ALL ABOUT US <i class="view"></i></a>
					</div>
					<div class="col-md-4 frt-grid2">
						<h3>Latest <span>Tweets</span></h3>
						<div class="ftr-grid">
							<p>
								It is a long established fact that a
								reader will be distracted by the of a reader page when at its layout.
							</p>
							<a href="#">1 Hour ago</a>
						</div>
						<div class="ftr-grid">
							<p>
								It is a long established fact that a
								reader will be distracted by the of a reader page when at its layout.
							</p>
							<a href="#">1 Hour ago</a>
						</div>
					</div>
					<div class="col-md-4 ftr-grid3">
						<h3>Subscribe to our <span>Newsletter</span></h3>
						<form>
							<input type="text" placeholder="Enter Email here" required/>
							<input type="submit" value="Subscribe Now"/>
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!---->
			<div class="copywrite">
				<p>
					Copyright© 2016 Wani's Kitchen, All rights reserved | Design by <a href="http://ashahmali.com" target="_blank">Ashiru Ali</a>
				</p>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
				*/
				//$().UItoTop({ easingType: 'easeOutQuart' });
			});

		</script>
		<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!---->
		<script type="text/javascript" src="<?php echo site_url('assets/js/touchTouch.jquery.js')?>"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/move-top.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/easing.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/custom.js')?>"></script>
	</body>
</html>