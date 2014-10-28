	<h3>Rincian Opname Uang Kas</h3>
    <?php
	if(empty($hasil)){
		echo "Tidak ada data";
	}    
	else{
	?>
	<table border='1'>
		<tr>
			<td>No</td>
			<td>Tgl Entry</td>
			<td>Kode Rincian Uang</td>			
			<td>Jumlah</td>
			<td>Aksi</td>
		</tr>
		<?php
		$no = 1;
		foreach($hasil as $data) {
		?>
		<tr>
			<td><?php echo $no++ ;?></td>
			<td><?php echo $data->tgl_opname;?></td>
			<td><?php echo $data->kd_rincian_uang;?></td>			
			<td><?php echo $data->nilai ;?></td>
			<td><a href="copnamekasbank/updatedata/<?php echo $data->tgl_opname ;?>/<?php echo $data->kd_rincian_uang ;?>">
				Update</a> | 
				<a href="copnamekasbank/deletedata/<?php echo $data->tgl_opname ;?>/<?php echo $data->kd_rincian_uang ;?>">
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
