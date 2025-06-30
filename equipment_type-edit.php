 
<div id="box-form">
<h2 id="title-txt">แก้ไขข้อมูลประเภทครุภัณฑ์</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From equipment_type Where id_equipment_type='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include 'table-sql/tb-'.$equipment_type.'.php'; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="19%" align="right">ชื่อประเภทครุภํณฑ์</th>
    <td width="81%">
	
	<input  name="name" type="text" id="txt" style="width: 50%;" value="<?=$name?>" />
	<button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="equipment_type" />
			<input type="hidden" name="Sql" value="Update" />	
			<input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
	</td>
  </tr>
    <tr>
      <th align="right">&nbsp;</th>
      <td>
	      </td>
    </tr>
</table>
</form>
 </div>
 
 <?php include "$pageUrl-report.php"; ?>  