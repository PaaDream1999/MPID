
<div id="box-list">
<?php
$sql = mysqli_query($con,"Select * From $member Where mb_id='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$member.'.php'; 
?>
<h2 id="title-txt">ข้อมูลสมาชิกผู้ใช้ระบบ</h2> 
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th width="18%" align="left">Login</th>
    <td width="82%"><?=$mb_user?></td>
  </tr>
  <tr>
    <th align="left">ชื่อ - นามสกุล	</th>
    <td><?=$mb_name?></td>
  </tr>
    <tr>
    <th align="left">สังกัด</th>
    <td><?=$mb_affiliation?></td>
  </tr>
  <tr>
    <th align="left">ที่อยู่</th>
    <td><?=$mb_address?></td>
  </tr>
  <tr>
    <th align="left">จังหวัด</th>
    <td><?=$mb_province?></td>
  </tr>
    <tr>
    <th align="left">รหัสไปรษณีย์ </th>
    <td><?=$mb_zipcode?></td>
  </tr>
    <tr>
    <th align="left">เบอร์โทร</th>
    <td><?=$mb_tel?></td>
  </tr>
      <tr>
    <th align="left">โทรศัพท์ภายใน</th>
    <td><?=$mb_telephone?></td>
  </tr>
  <tr>
    <th align="left">อีเมล์</th>
    <td><?=$mb_email?></td>
  </tr>
</table>
 <div style="text-align:right; margin-bottom: 10px;">
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-edit-adm&ID=<?=$_GET['ID']?>'">แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
</div>
</div>

 <?php include "$pageUrl-report.php"; ?>