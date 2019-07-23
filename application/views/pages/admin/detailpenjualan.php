<div id="page-wrapper">
	<div class="main-page widget-shadow">
		<div class="row">
			<h2 class="title1">Detail</h2>
			
			<table class="table table-striped" id="printTable" width="100%" border="1" cellpadding="1"> 
				<tr>
					<th>#</th>
					<th>Kode Barang</th>
					<th>Jumlah</th>
					<!-- <th>Total</th> -->
					<!-- <th>Bayar</th> -->

				</tr>
				<?php $no=1;	foreach ($history as $row) {

					?>
					<tr>
						<td><?php 	echo $no++; ?></td>
						<td><?php 	echo $row->kode_barang; ?></td>
						<td><?php 	echo $row->jumlah; ?></td>
						<!-- <td><?php 	echo $row?>total; ?></td> -->
						<!-- <td><?php 	echo $row->bayar; ?></td> -->
						
					</tr>
				<?php 	} ?>
			</table>
		</div>

	</div>
</div>

<script type="text/javascript">
	function printData()
	{
		var divToPrint=document.getElementById("printTable");
		newWin= window.open("");
		newWin.document.write(divToPrint.outerHTML);
		newWin.print();
		newWin.close();
	}

	$('button').on('click',function(){
		printData();
	})
</script>