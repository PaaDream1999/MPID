
<div id="box-form">
<h2 id="title-txt">แก้ไขข้อมูลสมาชิก</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From $member Where mb_id='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include 'table-sql/tb-'.$member.'.php'; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">

  <tr>
    <th width="19%" align="right">Username </th>
    <td width="81%"><input disabled="disabled" name="mb_user" type="text" id="txt" value="<?=$mb_user?>" /></td>
  </tr>
 
  <tr>
    <th align="right">ชื่อ-สกุล  </th>
    <td><input  name="mb_name" type="text" id="txt" value="<?=$mb_name?>" /></td>
  </tr>
    <tr>
    <th align="right">สังกัด </th>
    <td><input  name="mb_affiliation" type="text" id="txt" value="<?=$mb_affiliation?>" /></td>
  </tr>
  <tr>
    <th align="right">ที่อยู่</th>
    <td><textarea rows="3" id="txt" style="width: 75%;" name="mb_address" ><?=$mb_address?></textarea></td>
  </tr>
  <tr>
    <th align="right">จังหวัด </th>
    <td>
	
<select  name="mb_province" id="txt" style="width: 200px; padding:5px;">
                            <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
                               <?php
							    $sql = mysqli_query($con,"Select * From province");
								while($rs=mysqli_fetch_array($sql)){
												$pp++; 
												 
												if(trim($mb_province)==trim($rs['name'])){
														echo "<option value=".$rs['name']." selected='selected'>".$rs['name']."</option>";
													}else{
														echo "<option value=".$rs['name'].">".$rs['name']."</option>";
													}
											}
									   ?>
          </select>
	
	</td>
  </tr>
    <tr>
    <th align="right">รหัสไปรษณีย์  </th>
    <td><input  name="mb_zipcode" type="text" id="txt" maxlength="5" value="<?=$mb_zipcode?>"/></td>
  </tr>
    <tr>
    <th align="right">เบอร์โทร  </th>
    <td><input  name="mb_tel" type="text" id="txt" maxlength="10" value="<?=$mb_tel?>"/></td>
  </tr>
      <tr>
    <th align="right">โทรศัพท์ภายใน   </th>
    <td><input  name="mb_telephone" type="text" id="txt" maxlength="10" value="<?=$mb_telephone?>"/></td>
  </tr>
  <tr>
    <th align="right">อีเมล์  </th>
    <td><input  name="mb_email" type="text" id="txt" value="<?=$mb_email?>" /></td>
  </tr>
    <tr>
      <th align="right">&nbsp;</th>
      <td>
	  <button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="member" />
			<input type="hidden" name="Sql" value="Update" />		
			<input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
 
			 
	    </td>
    </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
 			
  </div>
</form>
</div>