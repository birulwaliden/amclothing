<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Edit Kategori</h2>
	</div>
	<br>
	<div id="style-2 div1">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Form</h4>
			</div>
			<div class="form-body">
				<form method="post" action="<?php echo base_url() ?>superadmin/update_kategori"> 
					<div class="form-group"> 
						<label for="">Id Kategori</label> 
						<input value="<?php echo $kategori->id_kategori; ?>" type="text" readonly="readonly" name="id" class="form-control">
					</div> 
					<div class="form-group"> 
						<label for="">Nama Kategori</label> 
						<input value="<?php echo $kategori->nama_kategori; ?>" type="text" name="nama" class="form-control">
					</div> 
					
					<button type="submit" class="btn btn-default">Edit Kategori</button> 
				</form> 
			</div>
		</div>
	</div>
</div>