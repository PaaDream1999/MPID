 
<div id="box-form">
<h2 id="title-txt">เพิ่มข้อมูลวิธีการซ่อมครุภัณฑ์</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="19%" align="right">ประเภทครุภัณฑ์  </th>
    <td width="81%">
	<select  name="type_id" id="select" style="width: 200px; padding:5px;">
      <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
      <?php
							    $sql = mysqli_query($con,"Select * From equipment_type");
								while($rs=mysqli_fetch_array($sql)){
												$pp++; 
												 
												if($_POST['type_id']==$rs['id_equipment_type']){
														echo "<option value=".$rs['id_equipment_type']." selected='selected'>".$rs['name']."</option>";
													}else{
														echo "<option value=".$rs['id_equipment_type'].">".$rs['name']."</option>";
													}
											}
									   ?>
    </select>	</td>
  </tr>
  <tr>
    <th align="right">ปัญหา  </th>
    <td><input  name="title" type="text" id="txt" style="width: 650px;" /></td>
  </tr>
  <tr>
    <th align="right" valign="top">สาเหตุและการแก้ไข</th>
    <td>
	<?php include "textarea-detail.php"; ?></td>
  </tr>
    <tr>
      <th align="right">&nbsp;</th>
      <td>
	  <button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="<?=$tableSql?>" />
			<input type="hidden" name="Sql" value="Insert" />	    </td>
    </tr>
</table>
</form>
 </div>
 
 <?php  include "$pageUrl-report.php"; ?>  