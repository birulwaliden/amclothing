<div id="page-wrapper">
	<div class="main-page widget-shadow">
		<div class="container">
			<h2 class="title1">History Transaksi</h2>
			<button target="_blank">Print</button>
			
			<table class="table table-striped" id="printTable" width="100%" border="1" cellpadding="1"> 
				<tr>
					<th>#</th>
					<th>Id Struk</th>
					<th>Total</th>
					<th>Bayar</th>
					<th>Action</th>
				</tr>
				<?php $no=1;	foreach ($history as $row) {

					?>
					<tr>
						<td><?php 	echo $no++; ?></td>
						<td><?php 	echo $row->id_struk; ?></td>
						<td><?php 	echo $row->total; ?></td>
						<td><?php 	echo $row->bayar; ?></td>
						<td><a href="" class="btn btn-info">Detail</a></td>
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