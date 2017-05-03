<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registrasi</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="color: grey">
		<div class="container-fluid">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="navbar navbar-primary" role="navigation" >
							<div class="container-fluid" >
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header" >
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="<?php echo site_url('login') ?>">Login</a>
									<a class="navbar-brand" href="<?php echo site_url('registrasi') ?>">Registrasi</a>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bantuan<b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Pemrograman</a></li>
												<li><a href="#">Web</a></li>
												<li><a href="#">Berbasis</a></li>
												<li><a href="#">Framework</a></li>
											</ul>
										</li>
									</ul>
								</div><!-- /.navbar-collapse -->
						</div>
						</nav>

					<!-- <input type="text" name="username" id="username" class="form-control" value="" required="required">
					<input type="password" name="password" id="password" class="form-control" value="" required="required"> -->
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php echo form_open_multipart('registrasi/create'); ?>
						
								<center><legend>Registrasi</legend>	
								<?php echo validation_errors(); ?>
								<div class="form-group">
									<label for="">Username</label>
									<input style="width:300px" type="text" class="form-control" id="username" name="username" placeholder="Username" >
									<br>
									<label for="">Password</label>
									<input style="width:300px" type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
									<br>
									<label for="">Konfirmasi Password</label>
									<input style="width:300px" type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password"  value="<?php echo set_value('confirm_password'); ?>">
									
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								</center>
						<?php echo form_close(); ?>
					</div>

					</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>