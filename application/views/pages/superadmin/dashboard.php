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
					<td>Nama Store</td>
					<td>Kode Barang</td>
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

	$(function () {
		$("#Linegraph").SimpleChart({
			ChartType: "Line",
			toolwidth: "50",
			toolheight: "30",
			axiscolor: "#E6E6E6",
			textcolor: "#6E6E6E",
			showlegends: false,
			data: [graphdata2,graphdata3],
			legendsize: "100",
			legendposition: 'bottom',
			xaxislabel: 'Tanggal',
			title: 'Grafik Penjualan Setiap Bulan',
			yaxislabel: 'Pendapatan dalam Rp'
		});
	});
</script>