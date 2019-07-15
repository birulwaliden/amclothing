<script src='<?php echo base_url() ?>assets/js/SidebarNav.min.js' type='text/javascript'></script>
<script>
	$('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- Classie --><!-- for toggle left push menu script -->
<script src="<?php echo base_url() ?>assets/js/classie.js"></script>
<script>
	var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
	showLeftPush = document.getElementById( 'showLeftPush' ),
	body = document.body;

	showLeftPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'cbp-spmenu-push-toright' );
		classie.toggle( menuLeft, 'cbp-spmenu-open' );
		disableOther( 'showLeftPush' );
	};

	function disableOther( button ) {
		if( button !== 'showLeftPush' ) {
			classie.toggle( showLeftPush, 'disabled' );
		}
	}
	var graphdata4 = {
		linecolor: "Random",
		title: "Thursday",
		values: [
		<?php foreach ($history as $h) { ?>
			{ X: <?php echo $h->tanggal ?>, Y: <?php echo $h->pendapatan ?> },
		<?php } ?>

		]
	};
	$(function () {
		$("#Linegraph").SimpleChart({
			ChartType: "Line",
			toolwidth: "50",
			toolheight: "25",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: false,
			data: [graphdata4],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Pendapatan dalam Rp',
			title: 'Daily Profit',
			yaxislabel: 'Profit in $'
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