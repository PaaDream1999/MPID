 <samp style="font-size:12px;">
 <?php
 $url = explode("-",$_GET['stt']);   
    $Table = $url[0];
    $page = $url[1];
 	
	if($Table=="adm"){
		  $Table = "admin";
		}
		
if(!empty($page)){
	switch($page){
	case  'add':
	case  'register':
?>
<input type="hidden" name="Table" value="<?=$Table?>" />
<input type="hidden" name="Sql" value="Insert" />		
	
<?php		
//echo " Table= ".$Table.", ";	
//echo " Sql= ".$page.", ";	
 
break;

	case  'edit':
?>
<input type="hidden" name="Table" value="<?=$Table; ?>" />
<input type="hidden" name="Sql" value="Update" />	
<input type="hidden" name="ID" value="<?=$ID?>" />
<input type="hidden" name="fup[]" value="<?=$fup?>" />
<?php	
	
//echo " Table= ".$Table.", ";	
//echo " Sql= ".$page.", ";	
//echo " fup = ". $fup; 

break;
	case  'repass':
?>
<input type="hidden" name="Table" value="<?=$Table?>" />
<input type="hidden" name="Sql" value="Repass" />
<input type="hidden" name="ID" value="<?=$login_am_id?>" />
	
<?php		
//echo " Table= ".$Table.", ";	
//echo " Sql= ".$page.", ";	
 		
	break;
	case 'list': 
	?>
 
<?php
 if(!empty($login_am_id)){ ?>
	<button type="button" class="btn"  onclick="parent.location='main.php?stt=<?=$Table?>-add'" style="margin-bottom: 10px;"><i class="icon-plus-sign"></i> เพิ่มข้อมูล</button>
	<button type="button" class="btn" onClick="(history.back())" style="margin-bottom: 10px;"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
<? } ?>
	
<?php			
	break;
	
	case 'list': 
	
	break;
	
	}
}
?>
 
</samp>