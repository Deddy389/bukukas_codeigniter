	<h3>Rincian Batch Harian</h3>
    <?php
	if(empty($hasil)){
		echo "Tidak ada data";
	}    
	else{
	?>
	<table border='1'>
		<tr>
			<td>No</td>			
			<td>Tgl Batch</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
		<?php
		$no = 1;
		foreach($hasil as $data) {
		?>
		<tr>
			<td><?php echo $no++ ;?></td>			
			<td><?php echo $data->tgl_batch;?></td>
			<td><?php echo $data->status;?></td>			
			<td><a href="cbatchtgl/updatedata/<?php echo $data->tgl_batch ;?>/<?php echo $data->tgl_batch;?>">
				Open</a> | 
				<a href="cbatchtgl/deletedata/<?php echo $data->tgl_batch ;?>/<?php echo $data->tgl_batch;?>">
				Close</a>
			</td>
		</tr>
		<?php
		}
		?>
		</table>    
	
	<?php	
	}
    ?>
