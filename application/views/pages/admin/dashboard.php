<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Dashoard</h2>
		<div class="blank-page widget-shadow scroll" id="style-2 div1">
			<div class="agileinfo-cdr">
				<div class="card-header">
					<h3>Weekly Sales</h3>
				</div>

				<div id="Linegraph" style="width: 98%; height: 350px">
				</div>
				
			</div>	
		</div>
		<br>
		<div class="blank-page widget-shadow scroll" id="style-2 div1">
			<h1>Riwayat</h1>
			
			<table class="table"> 
				<tr>
					<td>Id Riwayat</td>
					<td>Keterangan</td>
					<td>Tanggal</td>
					<td>Action</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Store AM CLothing Kademangaran Mengambil stok di AM CLothing Singkil</td>
					<td>1 April 2019</td>
					<td><a href="" class="btn btn-info">Detail</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>

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