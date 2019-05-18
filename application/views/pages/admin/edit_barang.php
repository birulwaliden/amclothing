<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Edit Barang</h2>
	</div>
	<br>
	<div id="style-2 div1">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Form</h4>
			</div>
			<div class="form-body">
				<form action="<?php echo base_url() ?>admin/update_barang" method="POST" enctype="multipart/form-data"> 

					<div class="form-group"> 
						<label for="">Nama Barang</label> 
						<input type="hidden" name="kode" value="<?php echo $barang->kode_barang ?>">
						<input type=""  value="<?php echo $barang->nama_barang?>" name="nama" class="form-control"> 
					</div>
					<div class="form-group"> 
						<label for="dropdown" >Kategori</label> 
						<select name="kategori" class="form-control">
							<option value="<?php echo $barang->id_kategori; ?>"><?php echo $barang->nama_kategori; ?></option>
							<option value="" disabled>-Pilih Kategori-</option>
							<?php foreach ($kategori as $k ) {?>
							<option value="<?php echo $k->id_kategori ?>"><?php echo $k->nama_kategori ?></option>
							<?php } ?>
						</select>
					</div> 
					<div class="form-group"> 
						<label for="">Harga Beli</label> 
						<input type="text" value="<?php echo $barang->harga_beli?>" name="beli" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="">Harga Jual</label> 
						<input type="text" value="<?php echo $barang->harga_jual?>" name="jual" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<img src="<?php echo base_url() ?>fotoproduk/<?php echo $barang->foto ?>" style="width: 20%"> 
						<label for="exampleInputFile">Pilih Foto</label> 
						<input name="foto" type="file" id="exampleInputFile"> 
						<p class="help-block">Tambahkan foto produk</p> 
					</div> 
					<div class="form-group">
						<label for="radio" class="col-sm-2 control-label">Ukuran</label>
						<div class="col-sm-8">
							<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "S") {
								echo "checked=\"\"";}  ?> type="radio" value="S"> S</label></div>
								<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "M") {
									echo "checked=\"\"";}  ?> type="radio" value="M"> M</label></div>
									<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "L") {
										echo "checked=\"\"";}  ?> type="radio" value="L"> L</label></div>
										<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "XL") {
											echo "checked=\"\"";}  ?> type="radio" value="XL"> XL</label></div>
											<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "XXL") {
												echo "checked=\"\"";}  ?> type="radio" value="XXL"> XXL</label></div>
												<div class="radio-inline"><label><input id="ukuran" name="ukuran" <?php if ($barang->ukuran == "ALL SIZE") {
													echo "checked=\"\"";}  ?> type="radio" value="ALL SIZE"> ALL SIZE</label></div>
												</div>
											</div>
											<br>
											<br>
											<button type="submit" class="btn btn-default">Edit Barang</button> 
										</form> 
									</div>
								</div>
							</div>
						</div>