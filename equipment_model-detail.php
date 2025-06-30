
<div id="box-list">
<?php
$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-$tableSql.php"; 
?>
<h2 id="title-txt">รายละเอียด ข้อมูลครุภัณฑ์</h2> 
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">

    <tr>
    <th align="right">ชื่อครุณฑ์</th>
    <td><?=$name?></td>
  </tr>
  <tr>
    <th width="18%" align="right">ประเภทครุณฑ์</th>
    <td width="82%"><?=$type_name?></td>
  </tr>
  <tr>
    <th align="right" valign="top">รายละเอียด</th>
    <td><?=$detail?></td>
  </tr>
  <tr>
    <th align="right">ราคา</th>
    <td><?=$price?></td>
  </tr>
    <tr>
    <th align="right" valign="top">หมายเหตุ</th>
    <td><?=$note?></td>
  </tr>
    <tr>
    <th align="right">วันที่บันทึกข้อมูล</th>
    <td><?=fcDatetime($date)?></td>
  </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-edit&ID=<?=$_GET['ID']?>'">แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
</div>
</div>

<?php include "$pageUrl-report.php"; ?>  