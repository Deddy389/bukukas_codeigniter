	<h3>Update Data</h3>
    <table border='1'>	
	<?php
	echo form_open('cuangbank/updatedata/'.$hasil->tgl_entry.'/'.$hasil->giro_bank);
	?>
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
			//echo form_input('tgl_entry', $hasil->tgl_entry);			
			?>
            </td>
		</tr>	
		<tr>	
			<td>Giro di Bank</td>
			<td>:</td>
			<td><?php echo form_input('giro_bank', $hasil->giro_bank);?></td>
		</tr>
		<tr>	
			<td>R/K Bank</td>
			<td>:</td>
			<td><?php echo form_input('rk_bank', $hasil->rk_bank);?></td>
		</tr>
		<tr>	
			<td>Buku Bank</td>
			<td>:</td>
			<td><?php echo form_input('buku_bank', $hasil->buku_bank);?></td>
		</tr>
		<tr>				
			<td><?php echo form_submit('submit','Update', 'id="submit"');?></td>
		</tr>
		</table>    	
		<?php form_close(); ?>
