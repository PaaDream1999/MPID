

<div id="frm-search">
		<form method="post" name="form1" action="<?=$_SERVER['PHP_SELF']?>?page=<?=$_GET['page']?>" style="padding:0px; margin:0px;">
  <div class="input-append">
    <input type="text" id="txt" name="keyword" style="width:35%;">
    <button type="submit" class="btn">ค้นหา</button> 
	<?php if(!empty($_SESSION['sess_adm_id'])){ ?>
	<button type="button" class="btn" onclick="parent.location='main.php?page=<?=$tableSql?>-add'">เพิ่มข้อมูลใหม่</button>
	<?php } ?>
	
	<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
  </div>
</form>
</div>
	  
	  
	  <?php
	  	if(!empty($_SESSION['sess_adm_id'])){
		include "$pageUrl-report.php";
		}else{
		include "$pageUrl-report-user.php";
		}
	   
	   
	    ?>  