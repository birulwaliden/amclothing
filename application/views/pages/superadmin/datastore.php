<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Data Store</h2>
		<h1>Data Store</h1>
		<table class="table datatables"> 
			<thead>
				<tr>
					<td>No</td>
					<td>Nama Store</td>
					<td>Alamat</td>
					<td>No HP</td>
					<!-- <td>Action</td> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach ($store as $row) { ?>


					<tr>
						<td><?php echo $row->id_store; ?></td>
						<td><?php echo $row->nama_store; ?></td>
						<td><?php echo $row->alamat; ?></td>
						<td><?php echo $row->no_hp; ?></td>
						<!-- <td><a href="btn-btn"></a></td> -->
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<br>
	<div id="style-2 div1">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Form</h4>
			</div>
			<div class="form-body">
				<form action="<?php echo base_url() ?>superadmin/tambah_store" method="POST"> 
					<div class="form-group"> 
						<label for="">Nama Store</label> 
						<input type="text" required name="nama" class="form-control">
					</div> 
					<div class="form-group"> 
						<label for="">username</label> 
						<input type="text" name="username" class="form-control"> 
					</div>

					<div class="form-group"> 
						<label for="">Alamat</label> 
						<input type="text" name="alamat" class="form-control"> 
					</div> 
					<div class="form-group"> 
						<label for="">No HP</label> 
						<input type="text" name="nohp" class="form-control"> 
					</div> 

					<button type="submit" class="btn btn-default">Tambah Store</button> 
				</form> 
			</div>
		</div>
	</div>
</div>