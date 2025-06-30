
<div id="box-list">
<?php
$sql = mysqli_query($con,"Select * From $admin Where adm_id='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include "$tableInc/tb-$tableSql.php"; 
?>
<h2 id="title-txt">ข้อมูลส่วนตัว</h2> 
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="18%" align="left">Login</th>
    <td width="82%"><?=$adm_user?></td>
  </tr>
  <tr>
    <th align="left">ชื่อ - นามสกุล	</th>
    <td><?=$adm_name?></td>
  </tr>
  <tr>
    <th align="left">เบอร์โทร</th>
    <td><?=$adm_tel?></td>
  </tr>
    <tr>
    <th align="left">อีเมล์</th>
    <td><?=$adm_email?></td>
  </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-edit&ID=<?=$_GET['ID']?>'">แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
  </div>
 </div>