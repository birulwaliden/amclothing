<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head1.php' ?>
<body>
	<div class="mid-class">
		<div class="art-right-w3ls">
			
			<h2>Sign In Here</h2>
			<?php if($this->session->flashdata('error')){ ?>
				<p style="color: white">*<?php echo $this->session->flashdata('error'); ?></p>
			<?php } ?>
			<form action="<?php echo base_url() ?>login/cek_login" method="post">
				<div class="main">
					<div class="form-left-to-w3l">
						<input type="text" name="username" placeholder="Username" required="">
					</div>
					<div class="form-left-to-w3l ">
						<input type="password" name="password" placeholder="Password" required="">
						<div class="clear"></div>
					</div>
				</div>
				<div class="left-side-forget">
					<input type="checkbox" class="checked">
					<span class="remenber-me">Remember me </span>
				</div>
				<div class="right-side-forget">
					<!-- <a href="#" class="for">Forgot password...?</a> -->
				</div>
				<div class="clear"></div>
				<div class="btnn">
					<button type="submit">Sign In</button>
				</div>
			</form>

		</div>
		<div class="art-left-w3ls">
			<h1 class="header-w3ls">
				<p>Automasi Sistem Informasi Penjualan dan Pergudangan Menggunakan Barcode Scanner pada A&M Clothing Tegal</p>
			</h1>
		</div>
	</div>
	<footer class="bottem-wthree-footer">
		<p>
			© A&M Clothing. Reflection Of Your Style | Design by
			<a href="#" target="_blank">AMC</a>
		</p>
	</footer>
</body>
</html>