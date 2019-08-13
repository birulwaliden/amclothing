<div id="page-wrapper">
	<div class="main-page widget-shadow">
		<div class="row">
			<h2 class="title1">Detail</h2>
			<button target="_blank">Print</button>
			
			<table class="table table-striped datatables" id="printTable" width="100%" border="1" cellpadding="1"> 
				<thead>
					<tr>
						<th>#</th>
						<th>Id Store</th>
						<th>Pendapatan</th>
						<th>Tanggal</th>
						<!-- <th>Bayar</th> -->

					</tr>
				</thead>
				<tbody>
					<?php $no=1;	foreach ($penjualan as $row) {

						?>
						<tr>
							<td><?php 	echo $no++; ?></td>
							<td><?php 	echo $row->nama_store; ?></td>
							<td><?php 	echo $row->pendapatan; ?></td>
							<td><?php 	echo $row->tanggal; ?></td>
							<!-- <td><?php 	echo $row->bayar; ?></td> -->
							<!-- <td><a href="<?php echo base_url() ?>admin/detailpenjualan/<?php 	echo $row->id_struk; ?>" class="btn btn-info">Detail</a></td> -->
						</tr>
					<?php 	} ?>
				</tbody>
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