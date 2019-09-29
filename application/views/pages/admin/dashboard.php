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
			<h1>Best Seller</h1>
			
			<table class="table"> 
				<tr>
					<td>No</td>
					<td>Kode Barang</td>
					<td>Nama Store</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
				</tr>
				<?php $no=1; foreach ($terbanyak as $row): ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nama_store; ?></td>
					<td><?php echo $row->kode_barang; ?></td>
					<td><?php echo $row->nama_barang; ?></td>
					<td><?php echo $row->banyak; ?></td>
					
				</tr>	
			<?php endforeach ?>

		</table>
	</div>
</div>
</div>



<!-- <script>

	var graphdata4 = {
		linecolor: "Random",
		title: "Thursday",
		values: [
		{ X: "6:00", Y: 300.00 },
		{ X: "7:00", Y: 410.98 },
		{ X: "8:00", Y: 310.00 },
		{ X: "9:00", Y: 314.00 },
		{ X: "10:00", Y: 310.25 },
		{ X: "11:00", Y: 318.56 },
		{ X: "12:00", Y: 318.57 },
		{ X: "13:00", Y: 314.00 },
		{ X: "14:00", Y: 310.89 },
		{ X: "15:00", Y: 512.57 },
		{ X: "16:00", Y: 318.24 },
		{ X: "17:00", Y: 318.00 },
		{ X: "18:00", Y: 314.24 },
		{ X: "19:00", Y: 310.58 },
		{ X: "20:00", Y: 312.54 },
		{ X: "21:00", Y: 318.00 },
		{ X: "22:00", Y: 318.00 },
		{ X: "23:00", Y: 314.89 },
		{ X: "0:00", Y: 310.26 },
		{ X: "1:00", Y: 318.89 },
		{ X: "2:00", Y: 518.87 },
		{ X: "3:00", Y: 314.00 },
		{ X: "4:00", Y: 310.00 }
		]
	};

	var graphdata3 = {
		linecolor: "Random",
		title: "Thursday",
		values: [
		{ X: "6:00", Y: 200.00 },
		{ X: "7:00", Y: 310.98 },
		{ X: "8:00", Y: 410.00 },
		{ X: "9:00", Y: 514.00 },
		{ X: "10:00", Y: 110.25 },
		{ X: "11:00", Y: 218.56 },
		{ X: "12:00", Y: 318.57 },
		{ X: "13:00", Y: 414.00 },
		{ X: "14:00", Y: 510.89 },
		{ X: "15:00", Y: 212.57 },
		{ X: "16:00", Y: 318.24 },
		{ X: "17:00", Y: 518.00 },
		{ X: "18:00", Y: 214.24 },
		{ X: "19:00", Y: 410.58 },
		{ X: "20:00", Y: 512.54 },
		{ X: "21:00", Y: 618.00 },
		{ X: "22:00", Y: 718.00 },
		{ X: "23:00", Y: 814.89 },
		{ X: "0:00", Y: 380.26 },
		{ X: "1:00", Y: 318.89 },
		{ X: "2:00", Y: 318.87 },
		{ X: "3:00", Y: 414.00 },
		{ X: "4:00", Y: 510.00 }
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
			data: [graphdata4,graphdata3],
			legendsize: "140",
			legendposition: 'bottom',
			xaxislabel: 'Hours',
			title: 'Weekly Profit',
			yaxislabel: 'Profit in $'
		});
	});
</script> -->

<script>
	var graphdata2 = {
		linecolor : "cyan",
		title: "Thursday",
		values: [
		<?php foreach ($store1 as $h) { ?>
			{ X: <?php echo $h->bulan ?>, Y: <?php echo (intval($h->pendapatan/1000)) ?> },
		<?php } ?>

		]
	};
	var graphdata3 = {
		linecolor : "blue",
		title: "Thursday",
		values: [
		<?php foreach ($store2 as $h) { ?>
			{ X: <?php echo $h->bulan ?>, Y: <?php echo (intval($h->pendapatan/1000)) ?> },
		<?php } ?>

		]
	};
	var graphdata4 = {
		linecolor : "darkBlue",
		title: "Thursday",
		values: [
		<?php foreach ($store3 as $h) { ?>
			{ X: <?php echo $h->bulan ?>, Y: <?php echo (intval($h->pendapatan/1000)) ?> },
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
			data: [graphdata2,graphdata3,graphdata4],
			legendsize: "100",
			legendposition: 'bottom',
			xaxislabel: 'Tanggal',
			title: 'Grafik Penjualan Setiap Bulan',
			yaxislabel: 'Pendapatan dalam Rp'
		});
	});
</script>