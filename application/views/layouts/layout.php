
<!DOCTYPE HTML>
<html>
<head>
<title>Energy a Industrial Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>

<link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<link href="<?php echo site_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo site_url('assets/css/signin.css'); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo site_url('assets/css/custom.css'); ?>" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
<!--/animated-css-->

<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--script-->
<script>        
        $(function(){
  
  // Initialize the gallery
  $('.works a.gal').touchTouch();
 });  
</script>
</head>
<body>
<!-- banner -->
<div class="banner banner2">
	 <div class="container">
		 <div class="header">
				<div class="col-md-4 head-logo">
				 	<h1><a href="index.html"><img src="images/engry.png" alt=""/>ENERGY</a></h1>
				</div>
				<div class="col-md-4 search">					
				    <form>
					<input type="text" value="" placeholder="Search...">
					<input type="submit" value="">
					</form>					
				</div>
				<div class="col-md-4 social">
				   <ul>
						<li><a href="#"><i class="facebook"></i></a></li>
						<li><a href="#"><i class="twitter"></i></a></li>
						<li><a href="#"><i class="dribble"></i></a></li>	
						<li><a href="#"><i class="google"></i></a></li>
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Login/Register</button>									
				  </ul>
				</div>
				<div class="clearfix"> </div>
		 </div>
		 <div class="top-menu">
			 <span class="menu"><img src="images/nav-icon.png"></span>
			 <ul>
					 <li><a href="index.html">Home</a></li>
					 <li><a href="index.html">About</a></li>	
					 <li><a href="index.html">Service</a></li>
					 <li class="active"><a href="projects.html">Projects</a></li>					 
					 <li><a href="news.html">News & Events</a></li>	
                      <li><a href="team.html">Team</a></li>							 
					 <li><a href="contact.html">Contact</a></li>
					 
						<div class="clearfix"></div>
				 </ul>
				 <!-- script-for-menu -->
		 <script>					
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle("slow" , function(){
						});
					});
		 </script>
		 <!-- script-for-menu -->	
		 </div>
	 </div>	 
</div>
<div class="bg-info"><?= $this->session->flashdata('message')?$this->session->flashdata('message'):"";?></div>
<?php $this->load->view($subview); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header" style="background: #FFA800; color:#EEE;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       	<h2 class="form-signin-heading text-center">Please sign in</h2>
      </div>
      <div class="modal-body">
        <?php echo validation_errors() ? '<div class="errors">' . validation_errors() . '</div>' : ''; ?>
		<?php echo !empty($error) ? '<div class="errors">' . $error . '</div>' : '';?>
		<?php $attributes = array('class' => 'form-signin',);
		echo form_open('', $attributes); ?>
		
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me  &nbsp;&nbsp; <?php echo anchor('#', 'Forgotten Password?', array('class'=>'forgotten_password')); ?>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br />
        <p class="">Don't have an account? <?php echo anchor('users/register', 'Sign up'); ?></p>
				
		<?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<!---->


<div class="footer1">
	 <div class="container">
		 <div class="ftr1-grids">
				<div class="col-md-4 ftr-grid1">
					 <div class="head-logo logo">
						 <h1><a href="index.html"><img src="images/engry.png" alt=""/>ENERGY</a></h1>
					 </div>
					 <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
					 The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
					 <a class="view" href="#">View ALL ABOUT US <i class="view"></i></a>				 
				</div>
				<div class="col-md-4 frt-grid2">
					 <h3>Latest <span>Tweets</span></h3>
					 <div class="ftr-grid">
						 <p>It is a long established fact that a 
						 reader will be distracted by the of a reader page when at its layout.</p>
						 <a href="#">1 Hour ago</a>
					 </div>
					 <div class="ftr-grid">
						 <p>It is a long established fact that a 
						 reader will be distracted by the of a reader page when at its layout.</p>
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
</div>
<!---->
<div class="copywrite">
		 <div class="container">		 
				 <p>Copyright© 2016 Wani's Kitchen, All rights reserved | Design by <a href="http://ashahmali.com" target="_blank">Ashiru Ali</a></p>
		</div>
</div>
<!---->
<!---->
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
		$().UItoTop({ easingType: 'easeOutQuart' });
});

</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
<script type="text/javascript" src="<?php echo site_url('assets/js/touchTouch.jquery.js')?>"></script>
<script src="js/jquery.ui.totop.js"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/move-top.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/easing.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>