
<div id="box-list">
<?php
$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-$tableSql.php"; 
?>
<h2 id="title-txt">รายละเอียด ข้อมูลวิธีการซ่อมครุภัณฑ์</h2> 
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">

    <tr>
    <th align="right">ประเภทครุภัณฑ์</th>
    <td><?=$type_name?></td>
  </tr>
  <tr>
    <th width="18%" align="right">ปัญหา</th>
    <td width="82%"><?=$title?></td>
  </tr>
  <tr>
    <th align="right" valign="top">สาเหตุและการแก้ไข</th>
    <td><?=$detail?></td>
  </tr>
  <tr>
    <th align="right">อัพเดทล่าสุด</th>
    <td><?=fcDatetime($date)?></td>
  </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-edit&ID=<?=$_GET['ID']?>'">แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
</div>
</div>

<?php   include "$pageUrl-report.php"; ?>  