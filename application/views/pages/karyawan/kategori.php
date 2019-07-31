<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Kategori</h2>
		<table class="table"> 
			<tr>
				<td>Nama Kategori</td>
				<td>Action</td>
			</tr>
			<?php foreach ($kategori as $row) { ?>

				<tr>
					<td><?php echo $row->nama_kategori; ?></td>
					<td><a href="<?php echo base_url() ?>Karyawan/delete_kategori/<?php echo $row->id_kategori ?>" class="btn btn-danger">Delete</a> <a href="<?php echo base_url() ?>Karyawan/edit_kategori/<?php echo $row->id_kategori ?>" class="btn btn-warning">Edit</a></td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<br>
	<div id="style-2 div1">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Form</h4>
			</div>
			<div class="form-body">
				<form method="post" action="<?php echo base_url() ?>admin/tambah_kategori"> 
					<div class="form-group"> 
						<label for="">Nama Kategori</label> 
						<input type="text" required name="nama" class="form-control">
					</div> 
					
					<button type="submit" class="btn btn-default">Tambah Kategori</button> 
				</form> 
			</div>
		</div>
	</div>
</div>