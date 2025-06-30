
<div id="box-form">
<h2 id="title-txt">เปลียนรหัสผ่านใหม่</h2> 
<form action="<?php echo $Action; ?>" method="post" enctype="multipart/form-data" name="form3" onsubmit="return chk_pass();" class="form-horizontal">
<script language="javascript">
function chk_pass(){
	if(document.form3.txt_oldpass.value==""){
		alert("กรุณากรอก รหัสผ่านเดิม ด้วยนะ");
		document.form3.txt_oldpass.focus();
		return false;
	}
	else if(document.form3.txt_newpass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_newpass.focus();
		return false;
	}
	else if(document.form3.txt_repass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_repass.focus();
		return false;
	}
	else if((document.form3.txt_newpass.value)!=(document.form3.txt_repass.value )){
		alert("กรุณากรอก รหัสผ่านให้เหมือนกัน ด้วยนะ");
		return false;		
	}
	else {
	return true;
	}

}
</script>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From $member Where mb_id='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include 'table-sql/tb-'.$member.'.php'; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="18%" align="left">รหัสผ่านเดิม</th>
    <td width="82%"><input  name="txt_oldpass" type="password" id="txt" /></td>
  </tr>
  <tr>
    <th align="left">รหัสผ่านใหม่</th>
    <td><input  name="txt_newpass" type="password" id="txt" /></td>
  </tr>
  <tr>
    <th align="left">รหัสผ่านใหมอีกครั้ง</th>
    <td><input  name="txt_repass" type="password" id="txt" />
	
	<button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="member" />
			<input type="hidden" name="Sql" value="Repass" />
			<input type="hidden" name="ID" value="<?=$mb_id?>" />
	</td>
  </tr>
  <tr>
    <th align="left">&nbsp;</th>
    <td>
	
	</td>
  </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
 			
  </div>
</form>
</div>