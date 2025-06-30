<div id="box-form">
<h2 id="title-txt">แก้ไขข้อมูลส่วนตัว</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
 
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From admin Where adm_id='15'");
					$rs = mysqli_fetch_array($sql);
					include "$tableInc/tb-$tableSql.php"; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="15%" align="left">Login</th>
    <td width="85%"><input disabled="disabled"  name="adm_user" type="text" id="txt" style="width: 150px;" value="<?=$adm_user?>"  /></td>
  </tr>
  <tr>
    <th align="left">ชื่อ - นามสกุล	</th>
    <td><input  type="text" id="txt" style="width: 200px;" name="adm_name" value="<?=$adm_name?>"  /></td>
  </tr>
  <tr>
    <th align="left">เบอร์โทร</th>
    <td><input type="text" id="txt" style="width: 110px;" name="adm_tel"  value="<?=$adm_tel?>" maxlength="10"  /></td>
  </tr>
    <tr>
    <th align="left">อีเมล์</th>
    <td><input type="text" id="txt" style="width: 200px;" name="adm_email"  value="<?=$adm_email?>"  />
	<button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="admin" />
			<input type="hidden" name="Sql" value="Update" />	
			<input type="hidden" name="ID" value="<?=$_SESSION['sess_adm_id']?>" />
	</td>
  </tr>
</table>
 
</form>
 </div>