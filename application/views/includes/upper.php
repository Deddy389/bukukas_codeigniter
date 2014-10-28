<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DPLK APP</title>
<!--link href="style.css" type="text/css" rel="stylesheet" /-->
<link rel="stylesheet" type="text/css" href="<?php echo "$base$css"?>">
<link rel="stylesheet" type="text/css" href="<?php echo "$base$css2"?>">
<script type="text/javascript" src="<?php echo $base;?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui-1.10.3.custom.min.js"></script>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		 $("#tgl_pick").datepicker({
		 	dateFormat : "yy-mm-dd",
			changeMonth : true,
			changeYear : true
		 });		 
    });
</script>
<script language="javascript" type="text/javascript">
function clearText(field){

    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
</script>
</head>
<body>
<div id="templatemo_container">
	<div id="templatemo_banner"></div> <!-- end of banner -->
    <div id='cssmenu'>
    <ul>
       <!--li class='has-sub'><a href='index.html'><span>Home</span></a>
       		<ul>
            	<li class='has-sub'><a href='#'><span>Product 1</span></a>
                    <ul>
                       <li><a href='#'><span>Sub Item</span></a></li>
                       <li class='last'><a href='#'><span>Sub Item</span></a></li>
                    </ul>
                 </li>
                 <li class='has-sub'><a href='#'><span>Product 2</span></a>
                    <ul>
                       <li><a href='#'><span>Sub Item</span></a></li>
                       <li class='last'><a href='#'><span>Sub Item</span></a></li>
                    </ul>
                 </li>
            </ul>
       </li>
       <li class='has-sub'><a href='#'><span>Buka Batch</span></a>
          <ul>
          	<li><?php echo anchor('cbatchtgl/tambahdata','Tambah data') ?></li>
            <li><?php echo anchor('cbatchtgl/','Rincian Batch') ?></li>                
          </ul>
       </li-->
       <li class='has-sub'><a href='#'><span>Buku Kas</span></a>
          <ul>
          	<li><?php echo anchor('centrybukukas/tambahdata','Tambah data') ?></li>
            <li><?php echo anchor('centrybukukas/','Baca data') ?></li>                
          </ul>
       </li>
       <li class='has-sub'><a href='#'><span>Opname</span></a>
       	  <ul>
          	<li><?php echo anchor('copnamekasbank/tambahdata','Tambah Kas') ?></li>
            <li><?php echo anchor('copnamekasbank/','Baca Kas') ?></li>  
          	<li><?php echo anchor('cuangbank/tambahdata','Tambah Bank') ?></li>
            <li><?php echo anchor('cuangbank/','Baca Bank') ?></li>                          
          </ul>
       </li>       
       <li class='last'><a href='#'><span>Reporting</span></a>
       	  <ul>
          	<li><?php echo anchor('centrybukukas/rinciantglentry','Buku Kas') ?></li>  
          	<li><?php echo anchor('copnamekasbank/rinciantglopnamekas','Rincian Hasil Opname') ?></li>
            <li><?php echo anchor('cuangbank/rinciantglopnamebank','Berita Acara Pemeriksaan') ?></li>              
          </ul>      
       </li>
    </ul>
    </div>
    <!-- end of menu -->

	<div id="templatemo_content_wrapper">
    	<div id="templatemo_content">
    
    	<div class="column_w210">
        	        	
        
        <div class="column_w430">