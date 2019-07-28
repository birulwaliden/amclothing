<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="window.print()">
	<center>
		
		<h1><?php echo $this->session->userdata('nama_store'); ?></h1>
		<h2><?php echo $this->session->userdata('alamat'); ?></h2>
		<h3><?php echo $this->session->userdata('no_hp'); ?></h3>

		<br>

		<table width="50%">
			<tr>
				<td>Nama Pemesan</td>
				<td>Keterangan</td>
				
			</tr>
			<tr>
				<td><?php echo $po->nama_pemesan ?></td>
				<td><?php echo $po->keterangan ?></td>
				
			</tr>
			
			<tr>
				<td  align="center" colspan="3"><b>Total :</b></td>
				<td>Rp. <?php echo number_format($po->total); ?></td>
			</tr>
			<tr>
				<td  align="center" colspan="3"><b>DP :</b></td>
				<td>Rp. <?php echo number_format($po->dp); ?></td>
			</tr>

		</table>

		<p>Terima Kasih Telah berbelanja</p>
	</center>
</body>
</html>