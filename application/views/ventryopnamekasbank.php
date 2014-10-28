	<h3>Tambah Data</h3>
    <?php
    echo form_open('copnamekasbank/tambahdata');
    ?>
<table>
	<tr>
		<td>Tanggal Opname</td>
		<td>:</td>
		<td>
			<?php 
			$data = array(
              'name'        => 'tgl_opname',
              'id'          => 'tgl_pick',
            );
			echo form_input($data);	
			?>
        </td>
	</tr>
</table>	
<table border='1'>
<?php
$no = 1;
?>	
	<tr>
		<td>No</td>
		<td>Kode Rincian Uang</td>			
		<td>Jumlah</td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk100rb</td>
		<td><?php echo form_input('uk100rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk50rb</td>
		<td><?php echo form_input('uk50rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk20rb</td>
		<td><?php echo form_input('uk20rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk10rb</td>
		<td><?php echo form_input('uk10rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk5rb</td>
		<td><?php echo form_input('uk5rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk2rb</td>
		<td><?php echo form_input('uk2rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk1rb</td>
		<td><?php echo form_input('uk1rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk5rts</td>
		<td><?php echo form_input('uk5rts'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>uk1rts</td>
		<td><?php echo form_input('uk1rts'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul1rb</td>
		<td><?php echo form_input('ul1rb'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul5rts</td>
		<td><?php echo form_input('ul5rts'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul2rts</td>
		<td><?php echo form_input('ul2rts'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul5plh</td>
		<td><?php echo form_input('ul5plh'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul1rts</td>
		<td><?php echo form_input('ul1rts'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>ul25plh</td>
		<td><?php echo form_input('ul25plh'); ?></td>
	</tr>
	<tr>
		<td><?php echo $no++;?></td>
		<td>Alasan Selisih</td>
		<td><?php echo form_input('alasan'); ?></td>
	</tr>
	<tr>				
		<td><?php echo form_submit('submit','Insert', 'id="submit"');?></td>
	</tr>
</table>    
<?php echo form_close(); ?>