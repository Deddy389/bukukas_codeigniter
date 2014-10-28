<script>
function popup(parm1){		
	
	popup=window.open('http://192.168.10.18/bukukas/index.php/copnamekasbank/gen_report_opname_kasbank/'+parm1,'Buku Kas','width=880,height=700');
}
</script>



	<h3>Rincian Tanggal Opname</h3>
    <?php
	if(empty($hasil)){
		echo "Tidak ada data";
	}    
	else{
	?>
	<table border='1' id="tabelpad">
		<tr class="thead">
			<td>No</td>
			<td>Tgl Opname</td>
			<td>Cetak</td>
		</tr>
		<?php
		$no = 1;		
		foreach($hasil as $data) {
		?>
		<tr>
			<td style="padding:0 5px 0 5px;"><?php echo $no++ ;?></td>          
			<td style="padding:0 5px 0 5px;"><?php echo date('d/m/Y',strtotime($data->tgl_opname));?></td>            
			<td style="padding:0 5px 0 5px;">           
            	<a href="" onclick="return popup('<?=$data->tgl_opname;?>');">
				Cetak</a>
			</td>
		</tr>
		<?php
		}
		?>
		</table>    
	
	<?php	
	}
    ?>                