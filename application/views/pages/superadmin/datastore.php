<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Data Barang</h2>
		<h1>Data Barang</h1>
		<table class="table"> 
			<tr>
				<td>Kode Barang</td>
				<td>Nama Barang</td>
				<td>Kategori</td>
				<td>Harga Beli</td>
				<td>Harga Jual</td>
				<td>Foto</td>
				<td>Ukuran</td>
			</tr>
			<?php foreach ($barang as $row) { ?>

			
			<tr>
				<td><?php echo $row->kode_barang; ?></td>
				<td><?php echo $row->nama_barang; ?></td>
				<td><?php echo $row->nama_kategori; ?></td>
				<td><?php echo $row->harga_jual; ?></td>
				<td><?php echo $row->harga_beli; ?></td>
				<td><img style="height: 2%" src="<?php echo base_url() ?>fotoproduk/<?php echo $row->foto; ?>"></td>
				<td><?php echo $row->ukuran; ?></td>
			</tr>
			<?php } ?>
		</table>
		<button <a href="" class="btn btn-info">Tambah Barang</a></button>
		<button <a href="" class="btn btn-info">Cetak Laporan</a></button>
	</div>
	<br>
	<div id="style-2 div1">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Form</h4>
			</div>
			<div class="form-body">
				<form> 
					<div class="form-group"> 
						<label for="">Kode Barang</label> 
						<input type="" name="" class="form-control">
					</div> 
					<div class="form-group"> 
						<label for="">Nama Barang</label> 
						<input type="" name="" class="form-control"> 
					</div>
					<div class="form-group"> 
						<label for="dropdown" >Kategori</label> 
						<select>
							<option>Jaket</option>
							<option>Kaos</option>
							<option>Celana</option>
							<option>Sepatu</option>
						</select>
					</div> 
					<div class="form-group"> 
						<label for="">Harga Beli</label> 
						<input type="text" name="" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="">Harga Jual</label> 
						<input type="text" name="" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="exampleInputFile">Pilih Foto</label> 
						<input type="file" id="exampleInputFile"> 
						<p class="help-block">Tambahkan foto produk</p> 
					</div> 
					<div class="form-group">
						<label for="checkbox">Ukuran</label>
						<div >
							<div class="checkbox-inline"><label><input type="checkbox"> S</label></div>
							<div class="checkbox-inline"><label><input type="checkbox" checked=""> M</label></div>
							<div class="checkbox-inline"><label><input type="checkbox" disabled=""> L</label></div>
							<div class="checkbox-inline"><label><input type="checkbox" disabled=""> XL</label></div>
							<div class="checkbox-inline"><label><input type="checkbox" disabled=""> XXL</label></div>
						</div>
					</div>
					<button type="submit" class="btn btn-default">Tambah Barang</button> 
				</form> 
			</div>
		</div>
	</div>
</div>