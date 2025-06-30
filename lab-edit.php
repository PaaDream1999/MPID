 <div id="box-form">
<h2 id="title-txt">แก้ไขข้อมูลห้องที่ใช้ครุภัณฑ์</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include "table-sql/tb-$tableSql.php"; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="19%" align="right">สถานที่ให้บริากร</th> 
    <td width="81%">
	
	<select  name="location_id" id="select" style="width: 200px; padding:5px;">
      <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
      <?php
							    $sql = mysqli_query($con,"Select * From location");
								while($rs=mysqli_fetch_array($sql)){
												$pp++; 
												 
												if($location_id==$rs['id_location']){
														echo "<option value=".$rs['id_location']." selected='selected'>".$rs['name']."</option>";
													}else{
														echo "<option value=".$rs['id_location'].">".$rs['name']."</option>";
													}
											}
									   ?>
    </select>

	</td>
  </tr>
    <tr>
    <th width="19%" align="right">ชื่อห้อง</th>
    <td width="81%">
	
	<input  name="name" type="text" id="txt" style="width: 50%;" value="<?=$name?>" />

	</td>
  </tr>
    <tr>
      <th align="right">
	  	 
	  </th>
      <td>
	  
	 <button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="<?=$tableSql?>" />
			<input type="hidden" name="Sql" value="Update" />	 
			<input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
	      </td>
    </tr>
</table>
</form>
 </div>
 
<?php include "$pageUrl-report.php"; ?>