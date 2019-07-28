<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Stock</h2>
		<h1>Stock</h1>
		<table class="table datatables"> 
			<thead>
				<tr>
					<td>Nama Pemesan</td>
					<td>No HP</td>
					<td>Keterangan</td>
					<td>DP</td>
					<td>Total</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php 	foreach ($po as $row) {
					
					?>
					<tr>
						<td><?php 	echo $row->nama_pemesan; ?></td>
						<td><?php 	echo $row->no_hp; ?></td>
						<td><?php 	echo $row->keterangan; ?></td>
						<td><?php 	echo $row->dp; ?></td>
						<td><?php 	echo $row->total; ?></td>
						<td><a target="_blank" href="<?php echo base_url() ?>Karyawan/struk_po/<?php echo $row->id_po ?>" class="btn btn-info">print</a></td>
					</tr>
				<?php 	} ?>
			</tbody>
		</table>

	</div>
	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Purchase Order</h4>
		</div>
		<div class="form-body">
			<form action="<?php echo base_url() ?>karyawan/save_po" method="POST" enctype="multipart/form-data"> 
				<div class="form-group"> 
					<label for="">pemesan</label> 
					<input type="text" name="pemesan" class="form-control" required placeholder="nama pemesan">
				</div>
				<div class="form-group"> 
					<label for="">no_hp</label> 
					<input type="text" name="no_hp" class="form-control" required placeholder="nama pemesan">
				</div>
				<div class="form-group"> 
					<label for="">keterangan</label> 
					<textarea class="form-control" name="keterangan" placeholder="keterangan" required></textarea>
				</div>
				<div class="form-group"> 
					<label for="">total</label> 
					<input type="number" name="total" min="0" class="form-control" required placeholder="Total">
				</div>
				<div class="form-group"> 
					<label for="">dp</label> 
					<input type="number" name="dp" min="0" class="form-control" required placeholder="nama pemesan">
				</div>

				
				<br>
				<br>
				<button type="submit" class="btn btn-info">Simpan PO</button> 
			</form> 
		</div>
	</div>
</div>