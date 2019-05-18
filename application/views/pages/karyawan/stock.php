<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Stock</h2>
		<h1>Stock</h1>
		<table class="table"> 
			<tr>
				<td>Kode Barang</td>
				<td>Id Store</td>
				<td>Jumlah</td>
				<td>Action</td>
			</tr>
			<?php 	foreach ($stock as $row) {
				
				?>
				<tr>
					<td><?php 	echo $row->kode_barang; ?></td>
					<td><?php 	echo $row->id_store; ?></td>
					<td><?php 	echo $row->jumlah; ?></td>
					<td><a href="" class="btn btn-info">Detail</a></td>
				</tr>
				<?php 	} ?>
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
						<select name="barang" class="form-control">	
							<option value="" selected="selected" disabled="disabled">--Pilih Barang--</option>
							<?php 	foreach ($barang as $b) {
								
								?>
								<option value="<?php 	echo $b->kode_barang; ?> "><?php 	echo $b->nama_barang; ?></option>
								<?php 	} ?>
							</select>
						</div>
						<div class="form-group"> 
							<label for="">Jumlah</label> 
							<input type="text" name="jumlah" class="form-control" placeholder="Jumlah . . "> 
						</div> 
						<div class="form-group"> 
							<label for="">Ambil dari store </label>
							<select name="store" class="form-control">	
								<option>--Pilih store--</option>
								<?php 	if ($this->session->userdata('id_store')==1) { ?>
								<option value="0">Stock Baru</option>
								<option value="2">Store 2</option>
								<option value="3">Store 3</option>
								<?php 	} else if ($this->session->userdata('id_store')==2) { ?>
								<option value="1">Store 1</option>
								<option value="3">Store 3</option>
								<?php 	} else if ($this->session->userdata('id_store')==3) { ?>
								<option value="1">Store 1</option>
								<option value="2">Store 2</option>
								<?php 	} ?>
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