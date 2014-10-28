<html>	
<head>
	<title>Buku Kas</title>
<style>
table
{
border-collapse:collapse;
}
table,th,td
{
border:1px solid black;
}
</style>	
</head>    
<body>
	<!--h3><?php echo anchor('centrybukukas/tambahdata','Tambah data') ?></h3-->
<div style="width:842px;border:bold;">
	<p>PT. ASURANSI JIWASRAYA (PERSERO)<br />
	   DPLK JIWASRAYA
	</p>
	<span style="text-align:center"><h1>Buku Kas</h1></span>
    <?php
	$namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	if(empty($hasil1)){
		echo "Tidak ada data";
	}    
	else{
	?>
	<p><strong>TANGGAL : <?php echo substr($hasil1->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil1->tgl_entry,5,2))].' '.substr($hasil1->tgl_entry,0,4);?></strong></p>
	<table>
		<tr style="text-align:center">
			<td rowspan="2"><strong>NO</strong></td>
			<td colspan="2"><strong>NO BUKTI</strong></td>			
			<td rowspan="2" width="200"><strong>URAIAN</strong></td>
			<td rowspan="2"><strong>PENERIMAAN</strong></td>
			<td rowspan="2"><strong>PENGELUARAN</strong></td>			
			<td rowspan="2"><strong>SALDO AKHIR</strong></td>
		</tr>
		<tr style="text-align:center">			
			<td><strong>KD</strong></td>			
			<td><strong>KC</strong></td>			
		</tr>
        <tr>
        	<td colspan="6">SALDO AWAL PER : <?php echo substr($hasil0->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil0->tgl_entry,5,2))].' '.substr($hasil0->tgl_entry,0,4);?></td>			
			<td style="text-align:right"><div><div style="float:left">Rp</div><div><?php echo number_format($hasil1->awal,0,",",".");?></div></div></td>			
        </tr>
		<?php
		$no = 1;
		$akumulasi = $hasil1->awal;
		//echo 'akumlasi '+$akumulasi;
		$akumulasi_penerimaan = 0;
		$akumulasi_pengeluaran = 0;
		foreach($hasil2 as $data) {
		?>
		<tr>
			<td style="text-align:center;border-bottom:1px solid white"><?php echo $no++ ;?></td>
			<td style="border-bottom:1px solid white"><?php echo $data->KD;?></td>
			<td style="border-bottom:1px solid white"><?php echo $data->KC;?></td>
			<td width="350" style="border-bottom:1px solid white"><?php echo $data->keterangan ;?></td>
			<td width="150" style="text-align:right;padding-left:5px;padding-right:5px;border-bottom:1px solid white"><?php echo number_format($data->PENERIMAAN,0,",",".");?></td>
			<td width="150"  style="text-align:right;padding-left:5px;padding-right:5px;border-bottom:1px solid white"><?php echo number_format($data->PENGELUARAN,0,",",".");?></td>
			<td width="150"  style="text-align:right;padding-left:5px;padding-right:5px;border-bottom:1px solid white"><?php $akumulasi += $data->PENERIMAAN - $data->PENGELUARAN;
					  $akumulasi_penerimaan += $data->PENERIMAAN;
					  $akumulasi_pengeluaran += $data->PENGELUARAN;
					  echo ($akumulasi < 0) ? '('.number_format(($akumulasi*-1),0,",",".").')' : number_format($akumulasi,0,",","."); 
				?>
			</td>
		</tr>
		<?php
		}
		?>
        
        <tr>			
			<td colspan="4" style="border:1px solid black !important;font-size:0px">&nbsp</td>			
			<td style="text-align:right;padding-left:5px;padding-right:5px"></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px"></td>			
			<td style="text-align:right;padding-left:5px;padding-right:5px"></td>
		</tr>
        
        <tr>			
			<td colspan="4" style="border:1px solid black !important">MUTASI</td>			
			<td style="text-align:right;padding-left:5px;padding-right:5px"><div><div style="float:left">Rp</div><div><?php echo number_format($akumulasi_penerimaan,0,",",".");?></div></div></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px"><div><div style="float:left">Rp</div><div><?php echo number_format($akumulasi_pengeluaran,0,",",".");?></div></div></td>			
			<td style="text-align:right;padding-left:5px;padding-right:5px" rowspan="2"></td>
		</tr>
        <tr>			
			<td colspan="4">SALDO AWAL</td>			
			<td style="text-align:right;padding-left:5px;padding-right:5px"><?php if($hasil1->awal >= 0) { ?><div><div style="float:left">Rp</div><div><?php echo number_format($hasil1->awal,0,",",".")?></div></div><?php } ?></td>
            <td style="text-align:right;padding-left:5px;padding-right:5px"><?php if($hasil1->awal < 0) { ?><div><div style="float:left">Rp</div><div><?php echo number_format($hasil1->awal,0,",",".")?></div></div><?php }?></td>													
		</tr>
        <tr>			
			<td colspan="6">SALDO AKHIR</td>							
			<td style="text-align:right;padding-left:5px;padding-right:5px;border-top:hidden"><div><div style="float:left">Rp</div><div><?php echo number_format($akumulasi,0,",",".");?></div></div></td>	
		</tr>		
	</table>    
	<table style="text-align:center;margin-top:10px;border:hidden">
		<tr style="border:hidden">
			<td width="300" style="border:hidden"></td>
			<td width="300" style="border:hidden"></td>
			<td  width="300" style="text-align:right;border:hidden">
				Jakarta, <?php echo substr($hasil1->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil1->tgl_entry,5,2))].' '.substr($hasil1->tgl_entry,0,4);?>
			</td>			
		</tr>			
		<tr style="border:hidden">
			<td style="border:hidden">Mengetahui
			</td>
			<td style="border:hidden">Diperiksa Oleh,
			</td>
			<td style="border:hidden">
			</td>
		</tr>
		<tr>
			<td style="border:hidden">
			</td>
			<td style="border:hidden">a.n
			</td>
			<td style="border:hidden">
			</td>
		</tr>
		<tr>
			<td style="padding-top:70px;border:hidden">Satriyo Nusantorojati
			</td>
			<td style="padding-top:70px;border:hidden">Ameinenta Prasetyo
			</td>
			<td style="padding-top:70px;border:hidden">Deny Heryadi
			</td>
		</tr>
		<tr>
			<td style="border:hidden">Kepala Bagian
			</td>
			<td style="border:hidden">Kepala Seksi
			</td>
			<td style="border:hidden">Pegawai Administrasi
			</td>
		</tr>
	</table>
	<?php	
	}
    ?>

</div>
</body>
</html>