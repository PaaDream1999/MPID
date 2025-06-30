 
<div id="box-form">
<h2 id="title-txt">ลงทะเบียนสมาชิกผู้ใช้ระบบ</h2> 
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
    <td width="81%"><input  name="mb_user" type="text" id="txt" /></td>
  </tr>
  <tr>
    <th align="right">Password  </th>
    <td><input name="mb_pass" type="password" id="txt" placeholder=""></td>
  </tr>
  <tr>
    <th align="right">ชื่อ-สกุล  </th>
    <td><input  name="mb_name" type="text" id="txt" /></td>
  </tr>
    <tr>
    <th align="right">สังกัด </th>
    <td><input  name="mb_affiliation" type="text" id="txt" /></td>
  </tr>
  <tr>
    <th align="right">ที่อยู่</th>
    <td><textarea rows="3" id="txt" style="width: 75%;" name="mb_address" ><?=$address?></textarea></td>
  </tr>
  <tr>
    <th align="right">จังหวัด </th>
    <td>
	
<select  name="mb_province" id="txt" style="width: 200px; padding:5px;">
                            <option value="" selected="selected">---------เลือกข้อมูล---------</option>
                               <?php
							    $sql = mysqli_query($con,"Select * From province");
								while($rs=mysqli_fetch_array($sql)){
												$pp++; 
												 
												if($_POST['mb_province']==$rs['name']){
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
    <td><input  name="mb_zipcode" type="text" id="txt" maxlength="5"/></td>
  </tr>
    <tr>
    <th align="right">เบอร์โทร  </th>
    <td><input  name="mb_tel" type="text" id="txt" maxlength="10"/></td>
  </tr>
      <tr>
    <th align="right">โทรศัพท์ภายใน   </th>
    <td><input  name="mb_telephone" type="text" id="txt" maxlength="10"/></td>
  </tr>
  <tr>
    <th align="right">อีเมล์  </th>
    <td><input  name="mb_email" type="text" id="txt"  /></td>
  </tr>
  <tr>
    <th align="right">ประเภทผู้ใช้  </th>
    <td>
	
<select name="mb_status" id="txt" style="width: 200px; padding:5px;">
<option value="" selected="selected">---------เลือกข้อมูล---------</option>
<?PHP
					// จัดเก็บข้อมูลในรูปแบบ array 
					$Array_txt = array("ผู้ใช้ระบบทั่วไป", "ช่างซ่อมครุภัณฑ์");
					for($i=0; $i < count($Array_txt); $i++){
							$TxtName = $Array_txt[$i];
						if($mb_status==$TxtName){
								echo "<option value=".$TxtName." selected='selected'>".$TxtName."</option>";
							}else{
								echo "<option value=".$TxtName.">".$TxtName."</option>";
							}
					}
			   ?>
</select>
	
	</td>
  </tr>
    <tr>
      <th align="right">&nbsp;</th>
      <td>
	  <button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="member" />
			<input type="hidden" name="Sql" value="Insert" />		
			 
	    </td>
    </tr>
</table>
</form>
</div>

 <?php include "$pageUrl-report.php"; ?>
 