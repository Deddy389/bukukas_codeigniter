<?php
echo form_open('centrybukukas/tambahdata');
?>
<table>
    <tr>
        <td>No Bukti</td>
        <td>:</td>
        <td><?php echo form_input('no_bukti'); ?></td>
    </tr>
    <tr>
        <td>Tgl Entry</td>
        <td>:</td>
        <td>
			<?php 
			$data = array(
              'name'        => 'tgl_entry',
              'id'          => 'tgl_pick',
            );
			echo form_input($data);	
			?>
        </td>
    </tr>
    <tr>
        <td>Penerimaan/Pengeluaran</td>
        <td>:</td>
        <td><?php echo form_input('nilai'); ?></td>
    </tr>    
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td><?php echo form_input('keterangan'); ?></td>
    </tr>    
    <tr>
        <td><?php echo form_submit('submit','Simpan','id="submit"'); ?></td>
    </tr>
</table>    
<?php echo form_close(); ?>       
