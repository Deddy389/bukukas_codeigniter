	<h3>Update Data</h3>
    <table border='1'>	
	<?php
	echo form_open('centrybukukas/updatedata/'.$hasil->no_bukti.'/'.$hasil->tgl_entry);
	?>
		<tr>
			<td>No Bukti</td>
			<td>:</td>
			<td><?php echo form_input('no_bukti', $hasil->no_bukti);?></td>
		</tr>	
		<tr>	
			<td>Tgl Entry</td>
			<td>:</td>
			<td>
			<?php 
			$data = array(
              'name'        => 'tgl_entry',
              'id'          => 'tgl_pick',
			  'value'       => $hasil->tgl_entry,
            );
			echo form_input($data);	
			?>
            </td>
		</tr>	
		<tr>	
			<td>Penerimaan/Pengeluaran</td>
			<td>:</td>
			<td><?php echo form_input('nilai', $hasil->nilai);?></td>
		</tr>
        <tr>	
			<td>Keterangan</td>
			<td>:</td>
			<td><?php echo form_input('keterangan', $hasil->keterangan);?></td>
		</tr>
		<tr>				
			<td><?php echo form_submit('submit','Update', 'id="submit"');?></td>
		</tr>
		</table>    	
		<?php form_close(); ?>
