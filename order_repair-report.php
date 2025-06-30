
<div id="box-list">		
<h2 id="title-list"><?=$titlepage?> </h2> 
<div style="text-align:right; padding:5px; font-size: 12px;"><?=$img_status?></div>
<?php  
$TitleKeyword = $_POST['keyword'];
  if(!empty($TitleKeyword)){
		if(is_numeric($TitleKeyword) ) { 
				$keyword = number_format($TitleKeyword); //ทำให้เป็นตัวเลขจำนวนเต็ม
			} else { 
				$keyword = trim($TitleKeyword); //ตัดซ่องวางของสตริง
			}
	echo "<div style='border-bottom: 1px solid #ddd; padding:5px;'><b> -  คำค้นหา : </b>  ".$TitleKeyword."</div>";
	$q="SELECT * FROM $tableSql WHERE(code LIKE '%".$keyword."%') and $showStatus ORDER BY id_$tableSql Desc";  
	}else{
	
	if($_SESSION['sess_mb_menu']==1){
	$q="SELECT * FROM $tableSql Where admin_id='".$_SESSION['sess_mb_id']."' and  $showStatus  ORDER BY id_$tableSql Desc";  
	}else{
	$q="SELECT * FROM $tableSql Where $showStatus  ORDER BY id_$tableSql Desc";  
	}

	
	
	
	

}
 
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
          <td id="f-center" width="3%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>No.</strong></td>
          <td id="f-center" width="15%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ผู้แจ้ง</strong></td>
          <td id="f-center" width="10%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>หน่วยงาน</strong></td>
          <td id="f-center" width="13%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>วันที่แจ้ง</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>อุปกรณ์</strong></td>
          <td width="18%" align="center" valign="middle" bgcolor="#F4F4F4" id="f-center"><strong>อาการเสีย</strong></td>
          <td id="f-center" width="5%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>สถานะ</strong></td>
          <td colspan="2" align="center" valign="middle" bgcolor="#F4F4F4" id="f-center"><strong>สรุปงานซ่อม</strong> </td>
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
          <td id="f-center" width="3%" align="center" valign="middle"><b><?=$no?></b></td>
          <td id="f-left" align="left" valign="middle">
          <?=$mb_name?>         </td>
          <td id="f-left" valign="middle"><?=$mb_affiliation?></td>
          <td align="center" valign="middle"><?=fcDate($ord_date)?></td>
          <td align="center" valign="middle"><?=$model_equipment?></td>
          <td  align="center" valign="middle" ><?=$malfunction?></td>
          <td id="f-center"  align="center" valign="middle" ><?=$status?></td>
          <td width="21%"  align="center" valign="middle" id="f-left" ><?=$note?></td>
          <td width="4%"  align="center" valign="middle" id="f-center" >
		  <a href="main.php?page=<?=$pageUrl?>-detail&amp;ID=<?=$ID?>"><img src="images/list16.png" border="0" /></a>		  </td>
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