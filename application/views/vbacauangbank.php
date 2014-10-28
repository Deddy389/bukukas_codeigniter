	<h3>Rincian Opname Uang Bank</h3>
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
			<td>Giro di Bank</td>
			<td>R/K Bank</td>
			<td>Buku Bank</td>
			<td>Aksi</td>
		</tr>
		<?php
		$no = 1;
		foreach($hasil as $data) {
		?>
		<tr>
			<td><?php echo $no++ ;?></td>			
			<td><?php echo $data->tgl_entry ;?></td>
			<td><?php echo $data->giro_bank;?></td>
			<td><?php echo $data->rk_bank;?></td>
			<td><?php echo $data->buku_bank;?></td>
			<td><a href="cuangbank/updatedata/<?php echo $data->tgl_entry ;?>/<?php echo $data->giro_bank;?>">
				Update</a> | 
				<a href="cuangbank/deletedata/<?php echo $data->tgl_entry ;?>/<?php echo $data->giro_bank;?>">
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
