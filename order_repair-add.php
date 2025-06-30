 
<div id="box-form">
<h2 id="title-txt">ลงทะเบียนแจ้งซ่อมครุภัณฑ์</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From equipment_service Where id_equipment_service='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include "table-sql/tb-equipment_service.php"; 
					}
		  ?>
<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="19%" align="right">ผู้แจ้งซ่อม  </th>
    <td width="81%"><input disabled="disabled" name="name" type="text" id="txt" value="<?=$mb_name?>" /></td>
  </tr>
  <tr>
    <th width="19%" align="right">ครุภัณฑ์  </th>
    <td width="81%"><input disabled="disabled"  name="name" type="text" id="txt" value="<?=$model_equipment?>" /></td>
  </tr>
  <tr>
    <th align="right">เลขครุภัณฑ์</th>
    <td><input disabled="disabled"  name="name" type="text" id="txt" value="<?=$equipment_code?>" /></td>
  </tr>
  <tr>
    <th align="right" valign="top">อาการเสีย</th>
    <td><textarea rows="3" id="txt" style="width: 75%;" name="detail" ></textarea></td>
  </tr>
    <tr>
      <th align="right">&nbsp;</th>
      <td>
	  <button type="submit" class="btn">ยืนยันการแจ้งซ่อม</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="<?=$tableSql?>" /> 
			<input type="hidden" name="service_id" value="<?=$_GET['ID']?>" />
			<input type="hidden" name="member_id" value="<?=$_SESSION['sess_mb_id']?>" />
			<input type="hidden" name="code" value="<?=$equipment_code?>" />
			<input type="hidden" name="Sql" value="Insert" />			</td>
    </tr>
</table>
</form>
 </div>
 
 <?php // include "$pageUrl-report.php"; ?>  