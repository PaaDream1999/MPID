 <div id="box-form">
<h2 id="title-txt">เพิ่มข้อมูลสถานทีใช้ครุภัณฑ์</h2> 
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
    <th width="19%" align="right">ชื่อสถานที่</th>
    <td width="81%">
	
	<input  name="name" type="text" id="txt" style="width: 50%;" />
	<button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<input type="hidden" name="Table" value="<?=$tableSql?>" />
			<input type="hidden" name="Sql" value="Insert" />	
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