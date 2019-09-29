<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Stock</h2>
		<h1>Stock</h1>
		<table class="table datatables"> 
			<thead>
				<tr>
					<td>Kode Barang</td>
					<td>Nama Barang</td>
					<td>Nama Store</td>
					<td>Jumlah</td>
					<!-- <td>Action</td> -->
				</tr>
			</thead>
			<tbody>
				<?php 	foreach ($stock as $row) {
					
					?>
					<tr>
						<td><?php 	echo $row->kode_barang; ?></td>
						<td><?php 	echo $row->nama_barang; ?></td>
						<td><?php 	echo $row->nama_store; ?></td>
						<td><?php 	echo $row->jumlah; ?></td>
						<!-- <td><a href="" class="btn btn-info">Detail</a></td> -->
					</tr>
				<?php 	} ?>
			</tbody>
		</table>

	</div>
	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Ambil Stock</h4>
		</div>
		<div class="form-body">
			<form action="<?php echo base_url() ?>karyawan/save_stock" method="POST" enctype="multipart/form-data"> 
				<div class="form-group"> 
					<label for="">Pilih Barang</label> 
					<select required name="barang" class="form-control">	
						<option value="" selected="selected" disabled="disabled">--Pilih Barang--</option>
						<?php 	foreach ($barang as $b) {

							?>
							<option value="<?php 	echo $b->kode_barang; ?> "><?php echo $b->nama_barang.'-'.$b->ukuran; ?></option>
						<?php 	} ?>
					</select>
				</div>
				<div class="form-group"> 
					<label for="">Jumlah</label> 
					<input required type="text" name="jumlah" class="form-control" placeholder="Jumlah . . "> 
				</div> 
				<div class="form-group"> 
					<label for="">Ambil dari store </label>
					<select required name="store" class="form-control">	
						<option>--Pilih store--</option>
						<option value="0">Stock Baru</option>
						<?php foreach ($store as $s) { ?>
							<option value="<?php echo $s->id_store ?>"><?php echo $s->nama_store ?></option>
							
						<?php	} ?>
					</select> 
					<input type="hidden" name="id" class="form-control" value="<?php 	echo $this->session->userdata('id_store'); ?>" readonly> 
				</div>
				<br>
				<br>
				<button type="submit" class="btn btn-info">Ambil Stock</button> 
			</form> 
		</div>
	</div>
</div>


<?php if ($this->session->flashdata('msg') != '') { ?>
	

	<script>
		alert("<?php echo $this->session->flashdata('msg') ?>");
	</script>

<?php } ?>



