

<div id="box-list">
	
<h2 id="title-list">ข้อมูลสมาชิกผู้ใช้ระบบ </h2> 
<?php  
$Table = "member";
$TitleKeyword = $_POST['keyword'];
  if(!empty($TitleKeyword)){
		if(is_numeric($TitleKeyword) ) { 
				$keyword = number_format($TitleKeyword); //ทำให้เป็นตัวเลขจำนวนเต็ม
			} else { 
				$keyword = trim($TitleKeyword); //ตัดซ่องวางของสตริง
			}
	echo "<div style='border-bottom: 1px solid #ddd; padding:5px;'><b> -  คำค้นหา : </b>  ".$TitleKeyword."</div>";
	$q="SELECT * FROM member WHERE(mb_name LIKE '%".$keyword."%' OR mb_user LIKE '%".$keyword."%')  ORDER BY mb_id ASC";  
	}else{

$q="SELECT * FROM member ORDER BY mb_id Desc";  

}
 
$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);  
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

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
          <td id="f-center" width="5%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ลำดับ</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ชื่อ Login </strong></td>
          <td id="f-center" width="15%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ชื่อ-นามสกุล</strong></td>
          <td id="f-center" width="16%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>สังกัด</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>โทรศัพท์ภายใน</strong></td>
          <td id="f-center" width="10%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>เบอร์โทร</strong></td>
          <td id="f-center" width="19%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>อีเมล์</strong></td>
          <td id="f-center" width="7%" align="center" valign="middle" bgcolor="#F4F4F4" ><strong><i class="icon-edit"></i> แก้ไข</strong></td>
          <td id="f-center" width="6%" align="center" valign="middle" bgcolor="#F4F4F4"><strong><i class="icon-trash"></i> ลบ</strong></td>
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
          <td id="f-center" width="7%" align="center" valign="middle">
		 <a  href="main.php?page=<?=$Table?>-edit-adm&ID=<?=$ID?>"><strong>  แก้ไข</strong></a> </td>
          <td id="f-center" width="6%" align="center" valign="middle"> 
		  <a   href="<?php echo $Action; ?>?Table=<?php echo $Table; ?>&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('ยืนยันลบข้อมูล <?=$name?> ออกจากระบบ')"><strong>  ลบ</strong></a>		  </td>
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