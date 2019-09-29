<div id="page-wrapper">
	<div class="main-page">
		<h2 class="title1">Data Store</h2>
		<h1>Data Store</h1>
		<table class="table datatables"> 
			<thead>
				<tr>
					<td>No</td>
					<td>Nama Karyawan</td>
					<td>Store</td>
					<td>Username</td>
					<td>No HP</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($karyawan as $row) { ?>


					<tr>
						<td><?php echo $row->id_karyawan; ?></td>
						<td><?php echo $row->nama_karyawan; ?></td>
						<td><?php echo $row->nama_store; ?></td>
						<td><?php echo $row->username; ?></td>
						<td><?php echo $row->no_hp; ?></td>
						<td>
							<a class="btn btn-danger" href="javascript:;" onclick="return isconfirm('<?php 	echo site_url("Superadmin/delete_karyawan/".$row->id_karyawan); ?>');">Delete</a>

							<a class="btn btn-dark" href="javascript:;" onclick="return isreset('<?php 	echo site_url("Superadmin/reset_pass/".$row->id_karyawan); ?>');">Reset</a>
							<a class="btn btn-warning"
							data-id="<?php echo $row->id_karyawan ?>"
							data-nama="<?php echo $row->nama_karyawan ?>"
							data-username="<?php echo $row->username ?>"
							data-no_hp="<?php echo $row->no_hp ?>"
							data-toggle="modal" data-target="#editModal">
							EDIT
						</a>

					</td>
				</tr>
			<?php } ?>

			<script type="text/javascript">
				function isconfirm(url_val){
					if(confirm('Hapus Data ?') == false)
					{
						return false;
					}
					else
					{
						location.href=url_val;
					}
				}
			</script>
			<script type="text/javascript">
				function isreset(url_val){
					if(confirm('Reset Password ?') == false)
					{
						return false;
					}
					else
					{
						location.href=url_val;
					}
				}
			</script>
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
			<form action="<?php echo base_url() ?>superadmin/tambah_karyawan" method="POST"> 
				<div class="form-group"> 
					<label for="">Store</label> 
					<select name="id_store" class="form-control" required>
						<option value="" selected="selected" disabled="disabled"> -Pilih Store- </option>
						<?php foreach ($store as $r) { ?>
							<option value="<?php echo $r->id_store ?>"> <?php echo $r->nama_store; ?></option>
						<?php } ?>
					</select>
				</div> 
				<div class="form-group"> 
					<label for="">Nama Lengkap</label> 
					<input type="text" name="nama" class="form-control" required> 
				</div>
				<div class="form-group"> 
					<label for="">username</label> 
					<input type="text" name="username" class="form-control" required> 
				</div>

				<div class="form-group"> 
					<label for="">No HP</label> 
					<input type="tel" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)"  placeholder="+62xxxxxxxxxxx" name="nohp" class="form-control" required> 
				</div> 

				<button type="submit" class="btn btn-default">Tambah Karyawan</button> 
			</form> 
		</div>
	</div>
</div>
</div>




<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
			</div>
			<div class="modal-body">
				<form action='<?php echo base_url() ?>Superadmin/update_karyawan' method="POST">
					<div class="form-group">

						<label for="inputText3" class="col-form-label">Nama Karyawan</label>
						<!-- <input type="hidden"  name="id_kelas"> -->
						<input required="required" readonly id="id_karyawan" name="id_karyawan" type="hidden" class="form-control" placeholder="Id Kelas">
						<input required="required" id="nama" name="nama" type="text" class="form-control" placeholder="Nama Kelas">

					</div>

					<div class="form-group">
						<label for="inputText3" class="col-form-label">Username</label>
						<input required="required" id="username" name="username" type="text" class="form-control" placeholder="Alamat...">

					</div>


					<div class="form-group">
						<label for="inputText3" class="col-form-label">No Hp</label>
						<input required="required" id="no_hp" name="no_hp" type="text" class="form-control" placeholder="Alamat...">

					</div>

					<div class="modal-footer">
						<a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
						<input type="submit" value="Simpan" class="btn btn-success">
					</div>


				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
        // Untuk sunting
        $('#editModal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_karyawan').attr("value",div.data('id'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#username').attr("value",div.data('username'));
            modal.find('#no_hp').attr("value",div.data('no_hp'));
            // modal.find('#kelas').val(div.data('kelas'));



        });
    });
</script>

<?php if ($this->session->flashdata('msg') != '') { ?>
	

	<script>
		alert("<?php echo $this->session->flashdata('msg') ?>");
	</script>

<?php } ?>

