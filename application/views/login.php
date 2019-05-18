<!DOCTYPE html>
<html>
<?php include 'partials/head.php' ?>
<body >
	<div id="page-wrapper">
		<center><img style="width: 10%" src="<?php echo base_url() ?>assets/images/AMClothing.png"></center>
		<div class="main-page login-page ">
			<h2 class="title1">Login</h2>
			<div class="widget-shadow">
				<div class="login-body">
					<form action="<?php echo base_url() ?>login/cek_login" method="post">
						<input type="text" class="username" name="username" placeholder="Enter Your Name" required="">
						<input type="password" name="password" class="lock" placeholder="Password" required="">
						<div class="forgot-grid">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
							<div class="forgot">
								<a href="#">forgot password?</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" value="Login">
						<div class="registration">
							Don't have an account ?
							<a class="" href="signup.html">
								Create an account
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>