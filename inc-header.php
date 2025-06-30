<div style="text-align:right; padding:5px;">
		<img src="images/login_48.png" width="29" height="29" /><b id="white"> Login :</b>
		 <?php if(!empty($_SESSION['sess_adm_id'])){ ?>
		 <b style="color:#FFFF00;">ผู้ดูแลระบบคุณ :</b>
		 <span id="white"><a id="white" href="?page=admin-profile&ID=<?php echo $_SESSION['sess_adm_id']; ?>"><?php echo $adm_name; ?></a></span>
		 <?php }else{ ?>
		 <b style="color:#FFFF00;">สมาชิกคุณ : </b>
		 <span id="white"><a id="white"  href="?page=member-profile&ID=<?php echo $_SESSION['sess_mb_id']; ?>"><?php echo $mb_name; ?></a></span>
		 <?php } ?>
		 | <a href="logout.php" style="color:#66FFFF;">ออกจากระบบ</a>
</div>
