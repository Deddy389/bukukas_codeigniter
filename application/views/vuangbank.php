	<h3>Tambah Data</h3>
    <?php
    echo form_open('cuangbank/tambahdata');
    ?>
<table>
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
    	<td>Giro di Bank</td>
        <td>:</td>
        <td><?php echo form_input('giro_bank'); ?></td>
    </tr>
    <tr>
    	<td>R/K Bank</td>
        <td>:</td>
        <td><?php echo form_input('rk_bank'); ?></td>
    </tr>    
	<tr>
    	<td>Buku Bank</td>
        <td>:</td>
        <td><?php echo form_input('buku_bank'); ?></td>
    </tr>
	<tr>
    	<td>Alasan Selisih</td>
        <td>:</td>
        <td><?php echo form_input('alasan'); ?></td>
    </tr>	
    <tr>
        <td><?php echo form_submit('submit','Simpan','id="submit"'); ?></td>
    </tr>
</table>    
<?php echo form_close(); ?>