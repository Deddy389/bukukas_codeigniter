<?php
echo form_open('cbatchtgl/tambahdata');
?>
<table>
    <tr>
        <td>Tgl Batch</td>
        <td>:</td>
        <td><?php 
			$data = array(
              'name'        => 'tgl_batch',
              'id'          => 'tgl_pick',
            );
			echo form_input($data);
			?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td><?php echo form_input('status','OPEN'); ?></td>
    </tr>      
    <tr>
        <td><?php echo form_submit('submit','Simpan','id="submit"'); ?></td>
    </tr>
</table>    
<?php echo form_close(); ?>       
