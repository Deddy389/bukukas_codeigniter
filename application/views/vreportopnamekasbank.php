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
border:1px solid black;
}
</style>	
</head>    
<body>
	<?php $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
		  $jml_uk = 0;
		  $jml_ul = 0;
		  $jml_rkbank = 0;
		  $jml_bukubank = 0;
	?>
<div style="width:842px;border:bold;">
	<span style="text-align:center"><h3>RINCIAN HASIL OPNAME KAS DAN BANK<br />
	   DPLK JIWASRAYA<br />
	   TANGGAL : <?php echo substr($hasil->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil->tgl_entry,5,2))].' '.substr($hasil->tgl_entry,0,4);?></h3></span>
    <?php	
	if(empty($hasil1)){
		echo "Tidak ada data";
	}    
	else{		
	?>
	<p style="text-decoration:underline">A. Pemeriksaan Kas DPLK</p>
	<div>1. Uang Kertas</div>
    <div style="margin-left:17px">
    	<table border='1' id="tabelpad" style="border:hidden">
		<?php
		$no = 1;		
		foreach($hasil0 as $data) {
		?>
		<tr style="border:hidden">
			<td style="padding:0 5px 0 5px;text-align:center;border:hidden"><?php echo $data->nilai;?></td> 
            <td style="padding:0 5px 0 5px;border:hidden">lbr.&nbsp;@&nbsp;&nbsp;Rp.</td>          
			<td style="padding:0 5px 0 5px;text-align:right;border:hidden"><?php echo number_format($data->PENGALI,2,",",".");?>&nbsp;&nbsp;=&nbsp;&nbsp;Rp.</td> 
            <td style="padding:0 5px 0 5px;text-align:right;border:hidden"><?php 
				if(($data->nilai*$data->PENGALI)==0){
					echo '0';
				}
				else {
					echo number_format(($data->nilai*$data->PENGALI),0,",",".");
				}?>
            &nbsp;
            </td>            			
		</tr>
		<?php
		$jml_uk += $data->nilai*$data->PENGALI;
		}
		?>
		</table>
        <div style="width:200px;margin-left:170px"><hr size=1 width="120"></div>
        <table style="border:hidden">
            <tr style="border:hidden">
                <td width="470" style="border:hidden">Jumlah Uang Kertas</td>
                <td style="border:hidden">Rp.</td>
                <td width="170" style="text-align:right;border:hidden"><?php echo number_format($jml_uk,2,",",".");?></td>
          </tr>
      </table>
        <br>
  </div>    
    <div>2. Uang Logam</div>
	<div style="margin-left:17px">
   	  <table border='1' id="tabelpad" style="border:hidden">
		<?php
		$no = 1;		
		foreach($hasil1 as $data) {
		?>
		<tr>
			<td style="padding:0 5px 0 5px;text-align:center;border:hidden;width:20px"><?php echo $data->nilai;?></td> 
            <td style="padding:0 5px 0 5px;border:hidden">kep.&nbsp;@&nbsp;&nbsp;Rp.</td>          
			<td style="padding:0 5px 0 5px;text-align:right;border:hidden;width:115px"><?php echo number_format($data->PENGALI,2,",",".");?>&nbsp;&nbsp;=&nbsp;&nbsp;Rp.</td> 
            <td style="padding:0 5px 0 5px;text-align:right;border:hidden;width:73px"><?php echo number_format(($data->nilai*$data->PENGALI),0,",",".");?>&nbsp;</td>            			
		</tr>
		<?php
		$jml_ul += $data->nilai*$data->PENGALI;
		}
		?>
		</table>
    	<div style="width:200px;margin-left:170px"><hr size=1 width="120"></div>     
        <table>
            <tr style="border:hidden">
                <td width="470" style="border:hidden">Jumlah Uang Logam</td>
                <td style="border:hidden">Rp.</td>
                <td width="170" style="text-align:right" style="border:hidden"><?php echo number_format($jml_ul,2,",",".");?></td>
          </tr>
      </table>
        <div style="width:200px;margin-left:470px"><hr size=1 width="200"></div>
        <table>
            <tr>
                <td width="470" style="border:hidden">Jumlah Uang Tunai (1+2)</td>
                <td style="border:hidden">Rp.</td>
                <td width="170" style="text-align:right;border:hidden"><?php echo number_format(($jml_ul+$jml_uk),2,",",".");?></td>
            </tr>
            <tr>
                <td width="470" style="border:hidden">Saldo menurut Buku Kas</td>
                <td style="border:hidden">Rp.</td>
                <td width="170" style="text-align:right;border:hidden"><?php echo number_format($hasil->saldo_tanggal,2,",",".");?></td>
            </tr> 
        </table>
        <div style="width:200px;margin-left:470px"><hr size=1 width="200"></div>    
        <table>               
            <tr>
                <td width="470" style="border:hidden">Selisih lebih/kurang</td>
                <td style="border:hidden">Rp.</td>
                <td width="170" style="text-align:right;border:hidden"><?php echo number_format((($jml_ul+$jml_uk)-$hasil->saldo_tanggal),2,",",".");?></td>
            </tr>
        </table>
    </div>    
<p style="text-decoration:underline">B. Pemeriksaan Bank</p>    
Saldo Bank per tgl. <?php echo substr($hasil->tgl_entry,8,2).' '.$namabulan[intval(substr($hasil->tgl_entry,5,2))].' '.substr($hasil->tgl_entry,0,4);?><br> 
<table>
<tr>
    <td width="490" style="border:hidden">- Menurut R/K Bank sebesar</td>
    <td style="border:hidden">Rp.</td>
    <td width="170" style="text-align:right;border:hidden"><?php echo number_format($hasil->rk_bank,2,",",".");?></td>
</tr>            
<tr>
    <td width="490" style="border:hidden">- Menurut Buku Bank sebesar</td>
    <td style="border:hidden">Rp.</td>
    <td width="170" style="text-align:right;border:hidden"><?php echo number_format($hasil->buku_bank,2,",",".");?></td>
</tr></table>
Yang terdiri dari : <br>
<table>
<tr style="text-align:center">
    <td width="170">Giro di Bank</td>
    <td width="170">R/K Bank</td>
    <td width="170">Buku Bank</td>
    <td width="170">Selisih</td>
</tr> 
<tr>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
</tr> 

<?php

foreach($hasil2 as $data) {
		?>
		<tr>
            <td width="170">
            	<table style="border:hidden">
                	<tr style="border:hidden"> 
                    	<td width="69" style="border:hidden">
                        	<?php echo $data->kode_bank;?>
                        </td>
                        <td style="border:hidden">
                        	:
                        </td>
                        <td style="border:hidden">
                        	<?php echo $data->no_rekening;?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="170">
            	<table style="border:hidden">
                	<tr style="border:hidden">
                    	<td style="border:hidden">
                        	Rp.
                        </td>                        
                        <td width="150" style="text-align:right">
                            <?php echo number_format($data->rk_bank,2,",",".");?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="170">
            	<table style="border:hidden">
                	<tr style="border:hidden"> 
                    	<td style="border:hidden">
                        	Rp
                        </td>                        
                        <td width="150" style="text-align:right">
                            <?php echo number_format($data->buku_bank,2,",",".");?>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="170">
            	<table style="border:hidden">
                	<tr style="border:hidden">
                    	<td style="border:hidden">
                        	Rp
                        </td>                        
                        <td width="150" style="text-align:right">
                            <?php echo number_format(abs($data->buku_bank-$data->rk_bank),2,",",".");?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
		<?php		
		$jml_rkbank += $data->rk_bank;
		$jml_bukubank += $data->buku_bank; 		
		}

?>

<tr>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
</tr> 
<tr>
    <td width="170">&nbsp;</td>
    <td width="170">
        <table style="border:hidden">
            <tr style="border:hidden">
                <td style="border:hidden">
                    Rp
                </td>                        
                <td width="150" style="text-align:right">
                    <?php echo number_format($jml_rkbank,2,",",".");?>
                </td>
            </tr>
        </table>
    </td>
    <td width="170">
        <table style="border:hidden">
            <tr style="border:hidden">
                <td style="border:hidden">
                    Rp
                </td>                        
                <td width="150" style="text-align:right">
                    <?php echo number_format($jml_bukubank,2,",",".");?>
                </td>
            </tr>
        </table>
    </td>
    <td width="170">
        <table style="border:hidden">
            <tr>
                <td style="border:hidden">
                    Rp
                </td>                        
                <td width="150" style="text-align:right">
                    <?php echo number_format(abs($jml_bukubank-$jml_rkbank),2,",",".");?>
                </td>
            </tr>
        </table>
    </td>
</tr>           
</table>
    <!--stop here-->  
	<?php	
	}
    ?>

</div>
</body>
</html>