<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="css/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="css/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-date1").datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, minDate: '-12M', maxDate: 0, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
			  $("#datepicker-date2").datepicker({ dateFormat: 'dd-mm-yy', isBuddhist: true, defaultDate: toDay, minDate: '-11M', maxDate: 0, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  

     		 $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		     $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
		</script>
<style type="text/css">
.demoHeaders { margin-top: 2em; }
#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
ul#icons {margin: 0; padding: 0;}
ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
ul#icons span.ui-icon {float: left; margin: 0 4px;}
ul.test {list-style:none; line-height:30px;}
.ui-datepicker{  
width:190px;  
font-family:tahoma;  
font-size:12px;  
}  
label.control-label{
width: 90px;
}
-->
</style>	


<div id="frm-search">
		<form action="<?=$_SERVER['PHP_SELF']?>?page=<?=$_GET['page']?>&stt=<?=$_GET['stt']?>" method="post" name="form1" id="form1" onsubmit="return chk_txt();" >
				  <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
							if(document.form1.txtDate1.value==""){
									alert("เลือกช่วงวันเวลา ด้วยนะ");
									document.form1.txtDate1.focus();
									return false;
							}
							else if(document.form1.txtDate2.value==""){
									alert("เลือกช่วงวันเวลา ด้วยนะ");
									document.form1.txtDate2.focus();
									return false;
							}
							else {
									return true;
							}
						
					}
				  </script>
		
  <div class="input-append">
 
 	
 	<input type="text" style="width: 90px; text-align:center; padding:3px;" id="datepicker-date1" name="txtDate1" placeholder="<?=fcDateEng(date("Y-m-01"))?>"  /> <strong>ถึง</strong>
	<input type="text" style="width: 90px; text-align:center; padding:3px;" id="datepicker-date2" name="txtDate2" placeholder="<?=fcDateEng(date("Y-m-d"))?>" />
    <button type="submit" class="btn">เรียกดูรายงาน</button> 
	<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
	
	
  </div>
</form>

<?php
 if($_POST){
 
	$date_ary = explode("-", $_POST['txtDate1']);
	$day = $date_ary[0];
	$month = $date_ary[1];
	$year = $date_ary[2]-543;
	$txtDate1 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
	 
	 
	$date_ary = explode("-", $_POST['txtDate2']);
	$day = $date_ary[0];
	$month = $date_ary[1];
	$year = $date_ary[2]-543;
	$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
	
 }else{
$date_back = date("Y-m-d");
$date_ary = explode("-", $date_back);
$day = $date_ary[2];
$month = $date_ary[1];
$year = $date_ary[0];
$day1 ="01";
$txtDate1 =  $year."-".$month."-".$day1; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
 }

?>



</div>
	  
	  
<?php
 
		$titlepage = "ข้อมูลสมาชิกผู้ใช้ระบบ";
	 	$showStatus = "Where(date(mb_date) BETWEEN '".$txtDate1."' AND '".$txtDate2."')";
 
  
	    ?>  
		
<div id="box-list">		
<h2 id="title-list"><?=$titlepage?> </h2> 
<?php  
 
 
	$q="SELECT * FROM $tableSql  $showStatus  ORDER BY mb_id Desc";  

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
	<div style="border-bottom: 3px solid #ddd; padding: 5px;">
	 
	<button type="button" class="btn" onclick="parent.location='print-<?=$pageUrl?>.php?Date1=<?=$txtDate1?>&Date2=<?=$txtDate2?>&stt=<?=$_GET['stt']?>'">
	<i class="icon-print"></i> พิมพ์รายงาน</button>
	
	<strong>วันที่</strong> <?=fcDate($txtDate1)?> <strong>ถึง</strong> <?=fcDate($txtDate2)?> 
  </div>
	  <table id="table-hover" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered" style="font-size: 12px;">
        <tr>
          <td id="f-center" width="5%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ลำดับ</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ชื่อ Login </strong></td>
          <td id="f-center" width="15%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ชื่อ-นามสกุล</strong></td>
          <td id="f-center" width="16%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>สังกัด</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>โทรศัพท์ภายใน</strong></td>
          <td id="f-center" width="10%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>เบอร์โทร</strong></td>
          <td id="f-center" width="19%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>อีเมล์</strong></td>
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
          <td id="f-center" width="5%" align="center" valign="middle"><b><?=$no?></b></td>
          <td align="left" valign="middle"><a href="main.php?page=member-detail&ID=<?=$ID?>"><?=$mb_user?></a></td>
          <td align="center" valign="middle"><?=$mb_name?></td>
          <td align="center" valign="middle" ><?=$mb_affiliation?></td>
          <td id="f-center"  align="center" valign="middle" ><?=$mb_telephone?></td>
          <td id="f-center"  align="center" valign="middle" ><?=$mb_tel?></td>
          <td align="center" valign="middle" ><?=$mb_email?></td>
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
 
</div>