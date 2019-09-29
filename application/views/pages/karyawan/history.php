<div id="page-wrapper">
	<div class="main-page widget-shadow">
		<div class="row">
			<h2 class="title1">History Transaksi</h2>
			<form style="margin: 10px; width: 40%" action="<?php echo base_url() ?>Karyawan/laporan_cetak" method="POST">
				<div class="form-group">
					<label>Tanggal</label><br>
					<input type="date" name="mulai"> - <input type="date" name="sampai">

				</div>
				<div class="form-group">
					<select class="form-control" name="tipe">
						<option>- Cetak Sebagai... -</option>
						<option>PDF</option>
						<option>Excel</option>
					</select>
				</div>

				<button type="submit" class="btn btn-info">Cetak Laporan</button>
			</form>
			<!-- <button target="_blank">Print</button> -->
			<div class="col-md-12">
				<table class="datatables table table-striped" id="printTable" width="100%" border="1" cellpadding="1"> 
					<thead>
						<tr>
							<th>#</th>
							<th>Id Struk</th>
							<th>Total</th>
							<th>Bayar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1;	foreach ($history as $row) {

							?>
							<tr>
								<td><?php 	echo $no++; ?></td>
								<td><?php 	echo $row->id_struk; ?></td>
								<td><?php 	echo $row->total; ?></td>
								<td><?php 	echo $row->bayar; ?></td>
								<td><a href="<?php echo base_url() ?>karyawan/detailpenjualan/<?php echo $row->id_struk ?>" class="btn btn-info">Detail</a></td>
							</tr>
						<?php 	} ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>

<?php if ($this->session->flashdata('allert') != null) { ?>
	<script type="text/javascript">
		alert('Data tidak ditemukan');
	</script>

<? } ?>

<script type="text/javascript">
	function printData()
	{
		var divToPrint=document.getElementById("printTable");
		newWin= window.open("");
		newWin.document.write(divToPrint.outerHTML);
		newWin.print();
		newWin.close();
	}

	// $('button').on('click',function(){
	// 	printData();
	// })
</script>