<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php include 'partials/head.php' ?>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<!--left-fixed -navigation-->
			<?php include 'partials/sidebar_karyawan.php' ?>
		</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<?php include 'partials/header.php' ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<?php echo $content ?>
		<!--footer-->
		<div class="footer">
			<p>&copy; A&M Clothing. Reflection Of Your Style | Design by <a href="#" target="_blank">AMC</a></p>
		</div>
		<!--//footer-->
	</div>
	
	<!-- side nav js -->
	<?php include 'partials/script.php' ?>

</body>
</html>