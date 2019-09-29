<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=DataPenjualan.xls");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Excel</title>
</head>
<body>

	<center>
		<h1>Laporan Penjualan</h1>
		<h3><?php echo $this->session->userdata('nama_store'); ?></h3>

		<p>Tanggal : <?php echo $mulai . ' - '. $sampai ?></p>
		<table width="100%" border="1" style="border-collapse: 1" cellpadding="1"> 
			<thead>
				<tr>
					<th>#</th>
					<th>Id Struk</th>
					<th>Tanggal Transaksi</th>
					<th>Total</th>
					<th>Bayar</th>

				</tr>
			</thead>
			<tbody>
				<?php $no=1;	foreach ($history as $row) {

					?>
					<tr>
						<td><?php 	echo $no++; ?></td>
						<td><?php 	echo $row->id_struk; ?></td>
						<td><?php 	echo date($row->tgl_transaksi); ?></td>
						<td>Rp. <?php 	echo $row->total; ?></td>
						<td>Rp. <?php 	echo $row->bayar; ?></td>
						
					</tr>
				<?php 	} ?>
			</tbody>
		</table>

	</center>

</body>
</html>