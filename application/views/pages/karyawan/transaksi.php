<div id="page-wrapper">
	<div class="main-page">
		<br>
		<br>
		<div class="blank-page widget-shadow scroll" id="style-2 div1">
			<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
				<div class="form-title">
					<h4>Transaksi</h4>
				</div>
				<div class="form-body">
					<!-- <form>  -->
						<div class="form-group"> 
							<label for="">Id Stock</label> 
							<input type="text" id="kode"  name="id_stock" class="form-control"> 
						</div>
						<div class="form-group"> 
							<label for="">nama</label> 
							<input id="nama" type="text" readonly="readonly" name="nama" class="form-control"> 
						</div>
						<div class="form-group"> 
							<label for="">ukuran</label> 
							<input id="ukuran" type="text" readonly="readonly" name="ukuran" class="form-control"> 
						</div>
						<div class="form-group"> 
							<label for="">harga</label> 
							<input id="harga" readonly type="number" name="harga" class="form-control"> 
						</div>
						<div class="form-group"> 
							<label for="">diskon</label> 
							<input id="diskon" value="0" type="number" name="diskon" class="form-control"> 
						</div>
						<div class="form-group"> 
							<label for="">Jumlah</label> 
							<input max="" id="jumlah" type="number" name="jumlah" class="form-control"> 
						</div> 

						<button  class="add_cart btn btn-default">Tambah Transaksi</button>


						<!-- </form>  -->
					</div>
				</div>

				<h4>Shopping Cart</h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Produk</th>
							<th>Qty</th>
							<th>Subtotal</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody id="detail_cart">

					</tbody>

				</table>

				<div class="form-body">
					<form method="post" action="<?php echo base_url() ?>karyawan/checkout">
						

						<div class="form-group"> 
							<label for="">Bayar</label> 
							<div class="input-group">
								
								<span class="input-group-addon">Rp.</span>
								<input id="bayar" min="<?php echo $this->cart->total() ?>" required type="number" name="bayar" class="form-control"> 
							</div>
						</div>

						<button type="submit" class="btn btn-success btn-block">Bayar</button>
					</form> 
				</div>
			</div>


		</div>


	</div>





	<div class="clearfix"></div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.add_cart').click(function(){
				var produk_id    = document.getElementById("kode").value;
				var produk_nama  = document.getElementById("nama").value;
				var ukuran  = document.getElementById("ukuran").value;
				var harga_produk = document.getElementById("harga").value;
				var quantity     = document.getElementById("jumlah").value;
				var diskon     = document.getElementById("diskon").value;
				var harga_jual = parseInt(harga_produk) - parseInt(diskon);
				$.ajax({
					url : "<?php echo base_url();?>karyawan/add_to_cart",
					method : "POST",
					data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: harga_jual, quantity: quantity,ukuran: ukuran},
					success: function(data){
						$('#detail_cart').html(data);
						document.getElementById("kode").value="";
						document.getElementById("nama").value="";
						document.getElementById("ukuran").value="";
						document.getElementById("harga").value="";
						document.getElementById("diskon").value="";
						document.getElementById("jumlah").value="";


					}
				});


			});

        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>karyawan/load_cart");

        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
            	url : "<?php echo base_url();?>karyawan/hapus_cart",
            	method : "POST",
            	data : {row_id : row_id},
            	success :function(data){
            		$('#detail_cart').html(data);
            	}
            });
        });
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#kode').on('input',function(){

			var kode=$(this).val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('karyawan/get_barang_stock')?>",
				dataType : "JSON",
				data : {kode: kode},
				cache:false,
				success: function(data){
					$.each(data,function(kode, nama_barang, harga, ukuran, jumlah){
						$('[name="nama"]').val(data.nama_barang);
						$('[name="harga"]').val(data.harga);
						$('[name="ukuran"]').val(data.ukuran);
						document.getElementById("jumlah").setAttribute("max",data.jumlah);


					});

				}
			});
			return false;
		});

	});
</script>