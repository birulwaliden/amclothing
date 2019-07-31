<script src='<?php echo base_url() ?>assets/js/SidebarNav.min.js' type='text/javascript'></script>
<script>
	$('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- Classie --><!-- for toggle left push menu script -->
<script src="<?php echo base_url() ?>assets/js/classie.js"></script>
<script>
	
	var graphdata4 = {
		linecolor : "darkBlue",
		title: "Thursday",
		values: [
		<?php foreach ($history as $h) { ?>
			{ X: <?php echo $h->tanggal ?>, Y: <?php echo (intval($h->pendapatan/1000)) ?> },
		<?php } ?>

		]
	};
	$(function () {
		$("#Linegraph").SimpleChart({
			ChartType: "Line",
			toolwidth: "50",
			toolheight: "30",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: false,
			data: [graphdata4],
			legendsize: "100",
			legendposition: 'bottom',
			xaxislabel: 'Tanggal',
			title: 'Grafik Penjualan Bulan <?php echo date('F') ?>',
			yaxislabel: 'Pendapatan dalam Rp'
		});
	});
</script>
<!-- //Classie --><!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>assets/js/SimpleChart.js"></script>
<!--//scrolling js-->

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>assets/js/bootstrap.js"> </script>