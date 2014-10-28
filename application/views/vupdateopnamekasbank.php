	<h3>Update Data</h3>
    <table border='1'>	
	<?php
	echo form_open('copnamekasbank/updatedata/'.$hasil->tgl_opname.'/'.$hasil->kd_rincian_uang);
	?>
		<tr>
			<td>Tgl Opname</td>
			<td>:</td>
			<td>
			<?php 
			$data = array(
              'name'        => 'tgl_opname',
              'id'          => 'tgl_pick',
			  'value'       => $hasil->tgl_opname,
            );
			echo form_input($data);	
			//echo form_input('tgl_opname', $hasil->tgl_opname);
			?>
            </td>
		</tr>	
		<tr>	
			<td>Kode Rincian Uang</td>
			<td>:</td>
			<td><?php echo form_input('kd_rincian_uang', $hasil->kd_rincian_uang);?></td>
		</tr>	
		<tr>	
			<td>Jumlah Uang</td>
			<td>:</td>
			<td><?php echo form_input('nilai', $hasil->nilai);?></td>
		</tr>
		<tr>				
			<td><?php echo form_submit('submit','Update', 'id="submit"');?></td>
		</tr>
		</table>    	
		<?php form_close(); ?>