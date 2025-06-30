
<div id="box-list">
<?php
$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-$tableSql.php"; 
?>
<h2 id="title-txt">รายละเอียด ครุภัณฑ์ที่ให้บริการ</h2> 
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="18%" align="right">ข้อมูลครุภัณฑ์</th>
    <td width="82%">
	<a href="main.php?page=equipment_model-detail&ID=<?=$model_id?>"><?=$model_equipment?></a>
	</td>
  </tr>
  <tr>
    <th align="right" valign="top">เลขครุภัณฑ์</th>
    <td><?=$equipment_code?></td>
  </tr>
  <!-- 
    <tr>
    <th align="right">ประเภทครุภัณฑ์</th>
    <td><?=$type_equipment?></td>
  </tr>
  -->
  
    <tr>
    <th align="right" valign="top">ข้อมูลผู้ใช้ครุภัณฑ์</th>
    <td>
	<a href="main.php?page=member-detail&ID=<?=$user_id?>"><?=$mb_name?></a>
	</td>
  </tr>

  <tr>
    <th align="right">สังกัด</th>
    <td><?=$mb_affiliation?></td>
  </tr>

    <tr>
    <th align="right">สถานที่</th>
    <td><?=$location_name?></td>
  </tr>
    <tr>
      <th align="right">ชื่อห้อง</th>
      <td><?=$lab_name?></td>
    </tr>
    <tr>
      <th align="right" valign="top">หมายเหตุ</th>
      <td><?=$note?></td>
    </tr>
    <tr>
      <th align="right" valign="top">วันที่ลงทะเบียน</th>
      <td><?=fcDatetime($date)?></td>
    </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-edit&ID=<?=$_GET['ID']?>'">แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
</div>
</div>

<?php include "$pageUrl-report.php"; ?>


 