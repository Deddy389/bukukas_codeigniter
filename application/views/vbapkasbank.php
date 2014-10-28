<html>	
<head>
	<title>Rincian Hasil Opname Kas dan Bank</title>
<style>
table
{
border-collapse:collapse;
}
table,th,td
{
border:none;
}
</style>	
</head>    
<body>
	<?php $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
<div style="width:842px;border:bold;">
  <span style="text-align:center"><h3>BERITA ACARA PEMERIKSAAN KAS &amp; BANK<br />
	   DIVISI DPLK<br />
	</h3></span>
  <p>Pada hari ini, <?php echo $hasil->hari;?> (jam 17.00 WIB) tanggal <?php echo substr($hasil->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil->tgl_entry,5,2))].' '.substr($hasil->tgl_entry,0,4);?> yang bertanda tangan di bawah ini, kami :</p>
  <table style="margin-left:50px">
  <tr>
    <td width="100">Nama</td>
    <td width="15" >:</td>
    <td width="137" >Satriyo Nusantorojati</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td>Kabag. Adm. & Keuangan</td>    
  </tr>
  </table>
  <p>telah melakukan pemeriksaan keadaan Uang Kas dan Bank yang berada di bawah pengawasan :</p>
  <table style="margin-left:50px">
  <tr>
    <td width="100">Nama</td>
    <td width="15">:</td>
    <td width="137">Deny Heryadi</td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td width="137">Pegawai Administrasi</td>    
  </tr>
  </table>
  <p>Dari hasil pemeriksaan dan bukti-bukti yang ada ditemukan kenyataan bahwa keadaan uang Kas dan Bank adalah sebagai berikut :</p>
	<p style="text-decoration:underline">1. Keadaan Uang di Kas </p>
  <table style="margin-left:20px">
  <tr>
    <td width="180">Uang Tunai per tgl.</td>
    <td width="80"><?php echo substr($hasil->tgl_entry,8,2).'/'.substr($hasil->tgl_entry,5,2).'/'.substr($hasil->tgl_entry,0,4);?></td>
    <td width="19">:&nbsp;&nbsp;Rp.</td>
    <td width="100" style="text-align:right"><?php echo number_format($hasil->uang_opname,2,",",".");?></td>
  </tr>
  <tr>
    <td>Saldo Buku Kas per tgl.</td>
    <td><?php echo substr($hasil->tgl_entry,8,2).'/'.substr($hasil->tgl_entry,5,2).'/'.substr($hasil->tgl_entry,0,4);?></td>
    <td>:&nbsp;&nbsp;Rp.</td>
    <td style="text-align:right;text-decoration:underline"><?php echo number_format($hasil->saldo_tanggal,2,",",".");?></td>    
  </tr>
  <tr>
    <td>Selisih lebih/kurang</td>
    <td></td>
    <td>&nbsp;&nbsp;&nbsp;Rp.</td>
    <td style="text-align:right;"><?php 
								  $selisih_kas = abs($hasil->uang_opname - $hasil->saldo_tanggal);								  
							      echo number_format($selisih_kas,2,",",".");?>
    </td>    
  </tr>
  </table>
    
    
	<p>Penjelasan selisih :<br>
	Selisih lebih/kurang sebesar Rp.&nbsp<?php echo number_format($selisih_kas,2,",",".");?>&nbsp;<?php echo $hasil->alasan_kas;?>.</p>
	<p style="text-decoration:underline">2. Keadaan Uang di Bank</p>
  <table style="margin-left:20px">
  <tr>
    <td width="180">Saldo R.K Bankper tgl.</td>
    <td width="80"><?php echo substr($hasil->tgl_entry,8,2).'/'.substr($hasil->tgl_entry,5,2).'/'.substr($hasil->tgl_entry,0,4);?></td>
    <td width="19">:&nbsp;&nbsp;Rp.</td>
    <td width="100" style="text-align:right"><?php echo number_format($hasil->rk_bank,2,",",".");?></td>
  </tr>
  <tr>
    <td>Saldo Buku Bank per tgl.</td>
    <td><?php echo substr($hasil->tgl_entry,8,2).'/'.substr($hasil->tgl_entry,5,2).'/'.substr($hasil->tgl_entry,0,4);?></td>
    <td>:&nbsp;&nbsp;Rp.</td>
    <td style="text-align:right;text-decoration:underline"><?php echo number_format($hasil->buku_bank,2,",",".");?></td>    
  </tr>
  
  <tr>
    <td>Selisih lebih/kurang</td>
    <td></td>
    <td>&nbsp;&nbsp;&nbsp;Rp.</td>
    <td style="text-align:right"><?php 
								  $selisih_bank = $hasil->rk_bank - $hasil->buku_bank;								  
							      echo number_format($selisih_bank,2,",",".");?>
    </td>    
  </tr>
  </table>
  <p>Penjelasan selisih :<br>
	Selisih lebih/kurang sebesar Rp.&nbsp<?php echo number_format($selisih_bank,2,",",".");?>&nbsp;<?php echo $hasil->alasan_bank;?>.</p>
	<p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya berdasarkan kenyataan fisik yang ada.</p>
  
  
	    
	<table style="text-align:center;margin-top:10px;">
		<tr >
			<td width="300" ></td>
			<td width="300" ></td>
			<td  width="300" style="text-align:left;padding-left:135px">
				Jakarta, <?php echo substr($hasil->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil->tgl_entry,5,2))].' '.substr($hasil->tgl_entry,0,4);?></td>			
	  </tr>			
		<tr >
			<td >Mengetahui,
			</td>
			<td >Pemeriksa, </td>
			<td >Yang diperiksa,
			</td>
		</tr>
		<tr>
			<td >
			</td>
			<td >&nbsp;</td>
			<td >
			</td>
		</tr>
		<tr>
			<td style="padding-top:70px;">Lusiana
			</td>
			<td style="padding-top:70px;">Satriyo Nusantorojati </td>
			<td style="padding-top:70px;">Deny Heryadi
			</td>
		</tr>
		<tr>
			<td >Kepala DPLK
			</td>
			<td >Kepala Bagian
			</td>
			<td >Pegawai Administrasi
			</td>
		</tr>
  </table>

</div>
</body>
</html>