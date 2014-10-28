<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DPLK APP</title>
<!--link href="style.css" type="text/css" rel="stylesheet" /-->
<link rel="stylesheet" type="text/css" href="<?php echo "$base/$css"?>">
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
    
    <div id="templatemo_menu">
        <ul>
            <li><a href="#"><span></span>Home</a></li>
            <li><a href="#" class="current"><span></span>Buku Kas</a></li>
            <li><a href="#"><span></span>Opname</a></li>
            <li><a href="#"><span></span>Berita Acara</a></li>            
        </ul>   
	</div> <!-- end of menu -->

	<div id="templatemo_content_wrapper">
    	<div id="templatemo_content">
    
    	<div class="column_w210 fl">
        	<div class="header_01">
            	Categories
            </div>
        	<ul class="category_list">
        	<!--insert submenu here-->            
        	<!--end insert submenu here-->                        
    		</ul>
    	</div> <!-- end of a column -->
        
        <div class="column_w430 fl vl_divider">
        	            
        	<!--insert content here-->            
        	<!--end insert content here-->                        
	        
    <div align=center>&nbsp;</div>
        	<div class="cleaner"></div>        
        </div> <!-- end of a column -->
        
        <!-- end of a column -->

        <div class="column_w920"></div>
    
    	<div class="cleaner"></div>
	</div> <!-- end of wrapper 02 -->        
    </div> <!-- end of wrapper 01 -->  
    <div id="templatemo_footer">
        
        Copyright © 2013 Divisi TI Jiwasraya
        
    </div>      
</div> <!-- end of container -->
</body>
</html>