<?php
$img_status="
		[ <img src=\"images/bubble_16.png\" /> รอตอบรับ ] 
		[ <img src=\"images/statistics_16.png\" /> กำลังดำเนินการ   ] 
		[ <img src=\"images/clock_16.png\" /> เสร็จ  ] 
		[ <img src=\"images/noting_16.png\" /> ซ่อมไม่ได้  ] 
		[ <img src=\"images/tick_16.png\" />  จัดส่งครุภัณฑ์ ] 
		";

?>
<div id="box-list">

<?php
$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
$rs = mysqli_fetch_array($sql);
include "table-sql/tb-$tableSql.php"; 
?>
<a name="1" id="1"></a>
<h2 id="title-txt">รายละเอียด ข้อมูลใบแจ้งซ่อม เลขที่ <?=$order_number?></h2> 
<div style="text-align:right; padding:5px; font-size: 12px;"><?=$img_status?></div>
<table id="table-border" border="1" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <th align="right">ผู้แจ้งซ่อม</th>
    <td><?=$mb_name?></td>
  </tr>
  <tr>
    <th align="right">สังกัด</th>
    <td><?=$mb_affiliation?></td>
  </tr>
  <tr>
    <th width="16%" align="right">ครุภัณฑ์</th>
    <td width="84%"><?=$model_equipment?></td>
  </tr>
  <tr>
    <th align="right" valign="top">เลขครุภัณฑ์</th>
    <td><?=$code?></td>
  </tr>
  <tr>
    <th align="right" valign="top">สถานที่</th>
    <td><?=$location_name?></td>
  </tr>
  <tr>
    <th align="right" valign="top">Lab</th>
    <td><?=$lab_name?></td>
  </tr>
  <tr>
    <th align="right" valign="top">อาการเสีย</th>
    <td><?=$malfunction?></td>
  </tr>
  <?php
if(!empty($_GET['show']) && $_GET['show']=="3"){
?>
  <form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onsubmit="return check_text();" class="form-horizontal">
    <?php include "inc-check-from.php"; ?>
    <tr>
      <th align="right" bgcolor="#ddd">ประเมินราคา</th>
      <td bgcolor="#ddd"><input  name="price" type="text" id="price" style="padding:3px;" value="<?=$price?>" />
      </td>
    </tr>
    <tr>
      <th align="right" valign="top" bgcolor="#ddd">หมายเหตุ </th>
      <td bgcolor="#ddd"><textarea rows="3" id="price" style="width: 650px;" name="note" ><?=strip_tags($note)?>
</textarea>
          <div id="div">
            <button type="submit" class="btn">บันทึกข้อมูล</button>
            <button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
            <input type="hidden" name="Table" value="<?=$tableSql?>" />
            <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
            <input type="hidden" name="Sql" value="Rate" />
        </div></td>
    </tr>
  </form>
  <?php }else{ ?>
  <tr>
    <th align="right" valign="top">ประเมินราคา</th>
    <td><?=$price?></td>
  </tr>
  <tr>
    <th align="right" valign="top">หมายเหตุ </th>
    <td><?=$note?></td>
  </tr>
  <?php } ?>
  <tr>
    <th align="right">วันที่แจ้งซ่อม </th>
    <td><?=fcDatetime($date)?></td>
  </tr>
  <?php
if(!empty($_GET['show']) && $_GET['show']=="1"){
?>
  <form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onsubmit="return check_text();" class="form-horizontal">
    <?php include "inc-check-from.php"; ?>
    <tr>
      <th align="right" bgcolor="#f4f4f4">ช่างติดตามงานซ่อม</th>
      <td bgcolor="#f4f4f4"><select  name="admin_id" id="price" style="width: 50%; padding:3px;">
        <option value="" selected="selected">---------เลือกข้อมูล---------</option>
        <?php
							    $sql = mysqli_query($con,"Select * From member Where mb_status='ช่างซ่อมครุภัณฑ์'");
								while($rs=mysqli_fetch_array($sql)){
											 
												 include $tableInc.'/tb-member.php'; 
												if($admin_id==$mb_id){
														echo "<option value=".$mb_id." selected='selected'>".$mb_name."</option>";
													}else{
														echo "<option value=".$mb_id.">".$mb_name."</option>";
													}
											}
									   ?>
      </select>
          <button type="submit" class="btn">บันทึกข้อมูล</button>
        <button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
        <input type="hidden" name="Table" value="<?=$tableSql?>" />
          <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />
          <input type="hidden" name="Sql" value="Follow" />
      </td>
    </tr>
  </form>
  <?php }else{ ?>
  <tr>
    <th align="right" bgcolor="#f4f4f4">ช่างผู้รับงาน</th>
    <td bgcolor="#f4f4f4"><b>
      <?=$emp_name2?>
    </b></td>
  </tr>
  <?php } ?>
  <tr>
    <th align="right">สถานะ</th>
    <td><?=$status?></td>
  </tr>
  <tr>
    <th colspan="2" align="left" valign="middle"> <div style="margin:0 auto 20px auto; width:90%;">
     
	  <?php if($_GET['show']=="2" && $num_ordes>0){ ?>
      <h2 id="title-txt2">รายละเอียดการซ่อมล่าสุด </h2>
      <div id="div2" style="border-bottom: 0px;">
        <table id="table-border" border="1" style="width: 100%; margin-bottom: 5px; border: #999;">
          <tr>
            <th width="15%" align="right">ช่างซ่อมครุภัณฑ์ </th>
            <td width="85%"><?=$emp_name?></td>
          </tr>
          <tr>
            <th align="right">ปัญหาที่เกิด</th>
            <td><?=$orders_malfunction?></td>
          </tr>
          <tr>
            <th align="right">ราคาซ่อมจริง</th>
            <td><?=number_format($orders_total,2)?></td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="top" style="padding:5px;"><div id="div" style="text-align:left; font-size: 15px;">รายละเอียดการซ่อมครุภัณฑ์</div>
                  <div style="width: 98%; border:1px dashed #ddd; margin:0 auto; padding: 5px;">
                    <?=$orders_detail?>
                </div></td>
          </tr>
          <tr>
            <th align="right">วันที่</th>
            <td><?=fcDatetime($orders_date)?></td>
          </tr>
        </table>
      </div>
      <?php } ?>
      <?php
	if(!empty($_GET['show'])){
	switch($_GET['show']){
		case '4': 
	
?>
      <?php
	 	break;
		case '2': 
	
?>
      <h2 id="title-txt2">วิเคราะห์ข้อมูลจากประวัติงานซ่อม </h2>
      <div id="div2" style="border-bottom: 0px;">
        <?php  
 
$q="SELECT * FROM $tableSql Where status  in('3', '4') and service_id ='".$service_id."' ORDER BY id_$tableSql Desc";  
 
$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);  
$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?>
        <?php  //	ถ้าไม่มีข้อมูล
		if($total==0){
			echo "<div style='padding-top: 20px; color: red;'><h1>ไม่มีข้อมูล</h1></div>";
				}else{
		?>
        <table id="table-hover" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered" style="font-size: 12px;">
          <tr>
            <td id="f-center" width="6%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ลำดับ</strong></td>
            <td width="11%" align="center" valign="middle" bgcolor="#F4F4F4" id="f-center"><strong>เลขที่</strong></td>
            <td id="f-center" width="13%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>วันที่แจ้งซ่อม</strong></td>
            <td id="f-left" width="39%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>อาการเสียของครุภัณฑ์</strong></td>
            <td id="f-center" width="13%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ราคาประเมิน</strong></td>
            <td id="f-center" width="12%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ราคาซ่อมจริง</strong></td>
            <td id="f-center" width="6%" align="center" valign="middle" bgcolor="#F4F4F4"><strong> ลบ</strong></td>
          </tr>
          <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;

include "table-sql/tb-$tableSql.php"; 
 
?>
          <tr class="list-hover">
            <td id="f-center" width="6%" align="center" valign="middle"><b>
              <?=$no?>
            </b></td>
            <td align="left" valign="middle" id="f-center"><a href="main.php?page=<?=$pageUrl?>-detail&amp;ID=<?=$ID?>&show=<?=$_GET['show']?>#1">
              <?=$order_number?>
            </a> </td>
            <td id="f-center" align="center" valign="middle"><?=displaydate($date)?></td>
            <td id="f-left" align="center" valign="middle"><?=$malfunction?>
            </td>
            <td id="f-right" align="center" valign="middle"><?=$price?></td>
            <td id="f-right"  align="center" valign="middle" ><?=$ord_total?></td>
            <td id="f-center" width="6%" align="center" valign="middle"><a   href="<?php echo $Action; ?>?Table=<?=$pageUrl?>&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('ยืนยันลบข้อมูล <?=$name?> ออกจากระบบ')"><strong> ลบ</strong></a> </td>
          </tr>
          <?PHP $no++; $i++?>
          <?php } ?>
        </table>
        <?php if($total > $e_page){ ?>
        <div class="browse_page">
          <?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
        </div>
        <?php } ?>
        <div style="text-align:right; margin-bottom: 10px;">
          <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=3#1'">ประเมินราคา</button>
          <button type="button" class="btn" onclick="javascript:if(confirm('ยืนยันไม่ซ่อมครุภัณฑ์')==true){window.location='<?php echo $Action; ?>?Table=<?php echo $pageUrl; ?>&Sql=Not&ID=<?=$ID?>';}">ซ่อมไม่ได้</button>
          <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>#1'">ย้อนกลับ</button>
          <!-- <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button> -->
        </div>
      </div>
      <?php 
	break;
	case '3':
?>
      <?php 
	break;
//	case '4':
?>
      <?php 
}}
?>
    </div></th>
  </tr>
  <!-- 
    <tr>
      <th align="right">&nbsp; </th>
      <td>&nbsp;</td>
    </tr>
	-->
</table>
<div style="text-align:right; margin-bottom: 10px;">
 	
<?php if(!empty($_SESSION['sess_adm_id'])){ ?>


 <?php if(empty($_GET['show'])){ ?>
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=1#1'">เลือกช่างซ่อม</button>
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=2#1'">วิเคราะห์ข้อมูล</button>
   <!-- <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=3#1'">ประเมินราคา</button>-->
   <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=4#4'">สรุปงานซ่อม</button>
 
  
  <button type="button" class="btn" onclick="javascript:if(confirm('ยืนยันส่งครุภัณฑ์ <?=$model_equipment?> เลข(<?=$code?>)')==true){window.location='<?php echo $Action; ?>?Table=<?php echo $pageUrl; ?>&Sql=Shipping&ID=<?=$ID?>';}">จัดส่งครุภัณฑ์</button>
  
  
  <button type="button" class="btn"  onclick="return confirm('ยืนยันลบข้อมูลใบแจ้งซ่อมเลขที่ <?=$order_number?>'); parent.location='<?php echo $Action; ?>?Table=<?php echo $pageUrl; ?>&Sql=Delete&ID=<?=$ID?>';">ลบ</button>

  
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-list'">ย้อนกลับ</button>
 <!-- <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button> -->
  <?php } ?>
  
  
  
  
  <?php }else{ ?>
  
  <?php if($_SESSION['sess_mb_menu']==1){ ?>
  
  
  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=2#1'">วิเคราะห์ข้อมูล</button>
  <!--  <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=3#1'">ประเมินราคา</button> -->
   <button type="button" class="btn"  onclick="parent.location='main.php?page=<?=$pageUrl?>-detail&ID=<?=$_GET['ID']?>&show=4#4'">สรุปงานซ่อม</button>
 
  
  <button type="button" class="btn" onclick="javascript:if(confirm('ยืนยันส่งครุภัณฑ์ <?=$model_equipment?> เลข(<?=$code?>)')==true){window.location='<?php echo $Action; ?>?Table=<?php echo $pageUrl; ?>&Sql=Shipping&ID=<?=$ID?>';}">จัดส่งครุภัณฑ์</button>
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
  
  <?php }else{ ?>
  
  <button type="button" class="btn" onClick="(history.back())"> ย้อนกลับ</button>
  <?php } ?>
  <?php } ?>
  
</div>
</div>
<a name="4" id="4"></a>
<?php
if(!empty($_GET['show']) && $_GET['show']=="4"){
?>	
<h2 id="title-txt2">บันทึกข้อมูลการซ่อมครุภัณฑ์ </h2> 
<div id="box-list" style="border-bottom: 0px;">
  <form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<table id="table-border" border="0" style="width: 100%; margin-bottom: 5px; border:0px;">
    <tr>
    <th width="15%" align="right">ช่างซ่อมครุภัณฑ์ </th>
    <td width="85%">
	<select  name="emp_id" id="txt" style="width: 50%; padding:3px;">
                            <option value="" selected="selected">---------เลือกข้อมูล---------</option>
                               <?php
							    $sql = mysqli_query($con,"Select * From member Where mb_status='ช่างซ่อมครุภัณฑ์'");
								while($rs=mysqli_fetch_array($sql)){
											 
												 include $tableInc.'/tb-member.php'; 
												if($emp_id==$mb_id){
														echo "<option value=".$mb_id." selected='selected'>".$mb_name."</option>";
													}else{
														echo "<option value=".$mb_id.">".$mb_name."</option>";
													}
											}
									   ?>
        </select>	</td>
  </tr>
    <tr>
      <th align="right">ปัญหาที่เกิด</th>
      <td><input  name="malfunction" type="text" id="txt" style="padding:3px; width: 50%;" value="<?=$malfunction?>" /></td>
    </tr>
    <tr>
      <th align="right">ราคาซ่อมจริง</th>
      <td><input  name="total" type="text" id="txt" style="padding:3px; width: 120px;" value="<?=$total?>" /></td>
    </tr>
    <tr>
      <th colspan="2" align="center" valign="top">
	  <div id="ckediter" style="text-align:left; font-size: 15px;">รายละเอียดการซ่อมครุภัณฑ์</div>
	    <?php include "ckediter-detail.php"; ?>
	    <div id="ckediter">
	      <button type="submit" class="btn">บันทึกข้อมูล</button>
			  <button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			  <input type="hidden" name="Table" value="<?=$tableSql?>" />
	      <input type="hidden" name="ID" value="<?=$_GET['ID']?>" />	
		  <input type="hidden" name="equipment_model_id" value="<?=$service_id?>" />	
	      <input type="hidden" name="Sql" value="successfully" />	
	      </div></th>
      </tr>
  </table>
</form>
</div>
<?php }else{ ?>


<?php } ?>





<?php
	if(!empty($_SESSION['sess_adm_id'])){
	// include "$pageUrl-report.php"; 
	}else{
	// include "$pageUrl-report-user.php"; 
	}

 
 ?>  