	<h3>Transaksi Penerimaan dan Pengeluaran</h3>
    <?php
	if(empty($hasil)){
		echo "Tidak ada data";
	}    
	else{
	?>
	<table border='1' id="tabelpad">
		<tr class="thead">
			<td>No</td>
			<td>No Bukti</td>
			<td>Tgl Entry</td>
			<td>Penerimaan / Pengeluaran</td>
			<td>Keterangan</td>			
			<td>Aksi</td>
		</tr>
		<?php
		$no = 1;
		foreach($hasil as $data) {
		?>
		<tr>
			<td style="padding:0 5px 0 5px;"><?php echo $no++ ;?></td>
			<td style="padding:0 5px 0 5px;"><?php echo $data->no_bukti;?></td>            
			<td style="padding:0 5px 0 5px;"><?php echo date('d/m/Y',strtotime($data->tgl_entry));?></td>            
			<td style="padding:0 5px 0 5px;"><div style="float:left">Rp.</div><div style="text-align:right"><?php echo number_format($data->nilai,0,",",".");?></div></td>
			<td style="padding:0 5px 0 5px;"><?php echo $data->keterangan ;?></td>
			<td style="padding:0 5px 0 5px;"><a href="centrybukukas/updatedata/<?php echo $data->no_bukti ;?>/<?php echo $data->tgl_entry ;?>">
				Update</a> | 
				<a href="centrybukukas/deletedata/<?php echo $data->no_bukti ;?>/<?php echo $data->tgl_entry ;?>">
				Delete</a>
			</td>
		</tr>
		<?php
		}
		?>
		</table>    
	
	<?php	
	}
    ?>                