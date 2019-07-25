<div id="page-wrapper">
	<div class="main-page">
		<div class="div1 style-2 row widget-shadow">
			<h2 class="title1">Data Barang</h2>
			<h1>Data Barang</h1>
			<table class="table datatables"> 
				<thead>
					<tr>
						<td>Kode Barang</td>
						<td>Nama Barang</td>
						<td>Kategori</td>
						<td>Harga Beli</td>
						<td>Harga Jual</td>
						<td>Foto</td>
						<td>Ukuran</td>
						<td>Barcode</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($barang as $row) { ?>


						<tr>
							<td><?php echo $row->kode_barang; ?></td>
							<td><?php echo $row->nama_barang; ?></td>
							<td><?php echo $row->nama_kategori; ?></td>
							<td><?php echo $row->harga_jual; ?></td>
							<td><?php echo $row->harga_beli; ?></td>
							<td><img src="<?php echo base_url() ?>admin/set_barcode/<?php echo $row->kode_barang; ?>"></td>
							<td><img style="height: 2%" src="<?php echo base_url() ?>fotoproduk/<?php echo $row->foto; ?>"></td>
							<td><?php echo $row->ukuran; ?></td>
							<td><a href="<?php echo base_url() ?>admin/hapus_barang/<?php echo $row->kode_barang; ?>" class="btn btn-danger">Hapus</a>
								<a href="<?php echo base_url() ?>admin/edit_barang/<?php echo $row->kode_barang; ?>" class="btn btn-info">Edit</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<button <a href="" class="btn btn-info">Cetak Laporan</a></button>
		</div>
		<br>
		<div id="style-2 div1">
			<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
				<div class="form-title">
					<h4>Tambah Barang</h4>
				</div>
				<div class="form-body">
					<form action="<?php echo base_url() ?>admin/save_barang" method="POST" enctype="multipart/form-data"> 

						<div class="form-group"> 
							<label for="">Nama Barang</label> 
							<input required type="text" name="nama" class="form-control" placeholder="Masukan nama barang ..."> 
						</div>
						<div class="form-group"> 
							<label for="dropdown" >Kategori</label> 
							<select required name="kategori" class="form-control">
								<option value="" disabled selected>-Pilih Kategori-</option>
								<?php foreach ($kategori as $k ) {?>
									<option value="<?php echo $k->id_kategori ?>"><?php echo $k->nama_kategori ?></option>
								<?php } ?>
							</select>
						</div> 
						<div class="form-group"> 
							<label for="">Harga Beli</label> 
							<input required type="text" name="beli" class="form-control" placeholder="Masukan harga beli ..."> 
						</div> 
						<div class="form-group"> 
							<label for="">Harga Jual</label> 
							<input required type="text" name="jual" class="form-control" placeholder="Masukan harga jual ..."> 
						</div>

						<div class="form-group"> 

							<label for="exampleInputFile">Pilih Foto</label> 
							<input required name="foto" type="file" id="exampleInputFile"> 
							<p class="help-block">Tambahkan foto produk</p> 
						</div> 
						<div class="form-group">
							<label for="radio" class="col-sm-2 control-label">Ukuran</label>
							<div required class="col-sm-8">
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="S"> S</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="M"> M</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="L"> L</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="XL"> XL</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="XXL"> XXL</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" type="radio" value="ALL SIZE"> ALL SIZE</label></div>
							</div>
						</div>
						<br>
						<br>
						<button type="submit" class="btn btn-default">Tambah Barang</button> 
					</form> 
				</div>
			</div>
		</div>
	</div>