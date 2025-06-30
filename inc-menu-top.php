 
<?php
// ส่วนของผู้ดูแลระบบ
 if(!empty($_SESSION['sess_adm_id'])){ ?>
<div id="ul-box">
<div id='cssmenu'>
<ul id="adm">
<!-- <li><a href="logout.php" id="curser"><span> ออกจากระบบ</span></a></li> -->

<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ข้อมูลส่วนตัว</span></a>
<ul>
<li><a href="main.php?page=admin-edit"><span><i class="icon-edit"></i> แก้ไขข้อมูลส่วนตัว</span></a></li>
<li><a href="main.php?page=admin-repass"><span><i class="icon-refresh"></i> เปลี่ยนรหัสผ่าน</span></a></li>
</ul>
</li>

<li class='has-sub'><a href='#' id="curser"><span><i class=""></i> เพิ่มข้อมูลระบบแจ้งซ่อม</span></a>
<ul>
<li><a href="main.php?page=member-add"><span><i class="icon-plus-sign"></i> สมาชิกผู้ใช้ระบบ</span></a></li>
<li><a href="main.php?page=equipment_type-add"><span><i class="icon-plus-sign"></i> ประเภทครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_model-add"><span><i class="icon-plus-sign"></i> ข้อมูลครุภัณฑ์</span></a></li>
<li><a href="main.php?page=location-add"><span><i class="icon-plus-sign"></i> สถานทีใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=lab-add"><span><i class="icon-plus-sign"></i> ห้องที่ใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_service-add"><span><i class="icon-plus-sign"></i> ครุภัณฑ์ที่ให้บริการ</span></a></li>
<li><a href="main.php?page=solution-add"><span><i class="icon-plus-sign"></i> วิธีการซ่อมครุภัณฑ์</span></a></li>
</ul>
</li>


<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>รายงาน</span></a>

<ul class="has-sub">
	
	<li><a style="text-align:right; padding-right: 10px; border-bottom: 1px solid #dedede;" href="main.php?page=order_repair-list-report"><span><b>-</b> รายการแจ้งซ่อม</span> <i class="icon-chevron-right"></i></a>

	 	<ul style="margin-top: -15px;">
		 <li><a href="main.php?page=order_repair-list-report&stt=1"><span><i class="icon-print"></i> รอดำเนินการ</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=2"><span><i class="icon-print"></i> กำลังดำเนินการ</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=3"><span><i class="icon-print"></i> ดำเนินการเรียบร้อย</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=4"><span><i class="icon-print"></i> ประวัติงานซ่อม</span></a></li>
 		</ul>
		
	</li>
<!--
	<li><a style="text-align:right; padding-right: 10px; border-bottom: 1px solid #dedede;"  href="main.php?page=order_repair-list-report"><span><b>-</b> ประเภทครุภัณฑ์ </span> <i class="icon-chevron-right"></i></a>

	 	<ul style="margin-top: -15px;">
		 <li><a href="main.php?page=order_repair-list-report&stt=1"><span><i class="icon-print"></i> รอดำเนินการ</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=2"><span><i class="icon-print"></i> กำลังดำเนินการ</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=3"><span><i class="icon-print"></i> ดำเนินการเรียบร้อย</span></a></li>
		 <li><a href="main.php?page=order_repair-list-report&stt=4"><span><i class="icon-print"></i> ประวัติงานซ่อม</span></a></li>
 		</ul>
		
	</li>
-->
<li><a href="main.php?page=member-list-report"><span><i class="icon-user"></i> สมาชิกผู้ใช้ระบบ</span></a></li>
<li><a href="main.php?page=equipment_type-list-report"><span><i class="icon-tag"></i> ประเภทครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_model-list-report"><span><i class="icon-tasks"></i> ข้อมูลครุภัณฑ์</span></a></li>
<li><a href="main.php?page=location-list-report"><span><i class="icon-map-marker"></i> สถานทีใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=lab-list-report"><span><i class="icon-th"></i> ห้องที่ใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_service-list-report"><span><i class="icon-repeat"></i> ครุภัณฑ์ที่ให้บริการ</span></a></li>
<!--<li><a href="main.php?page=solution-list-report"><span><i class="icon-wrench"></i> วิธีการซ่อมครุภัณฑ์</span></a></li> -->
</ul>
</li>

<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ข้อมูลระบบแจ้งซ่อม</span></a>
<ul>
<li><a href="main.php?page=member-list"><span><i class="icon-th-list"></i> สมาชิกผู้ใช้ระบบ</span></a></li>
<li><a href="main.php?page=equipment_type-list"><span><i class="icon-th-list"></i> ประเภทครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_model-list"><span><i class="icon-th-list"></i> ข้อมูลครุภัณฑ์</span></a></li>
<li><a href="main.php?page=location-list"><span><i class="icon-th-list"></i> สถานทีใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=lab-list"><span><i class="icon-th-list"></i> ห้องที่ใช้ครุภัณฑ์</span></a></li>
<li><a href="main.php?page=equipment_service-list"><span><i class="icon-th-list"></i> ครุภัณฑ์ที่ให้บริการ</span></a></li>

<li><a href="main.php?page=solution-list"><span><i class="icon-th-list"></i> วิธีการซ่อมครุภัณฑ์</span></a></li>
</ul>
</li>



<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ระบบการจัดการงานซ่อม</span></a>
<ul>
<li><a href="main.php?page=order_repair-list"><span><i class="icon-file"> </i> ติดตามงานซ่อม</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=2"><span><i class="icon-thumbs-up"></i> กำลังดำเนินการซ่อม</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=3"><span><i class="icon-ok-circle"></i> งานซ่อมเสร็จพร้อมส่ง</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=4"><span><i class="icon-time"></i> ประวัติงานซ่อม</span></a></li>
 
</ul>
</li>
<li class='has-sub'><a href='main.php' id="curser"><span><i class=""></i>หน้าหลัก</span></a>


</ul>
</div>
</div>




<?php

// ส่วนของสมาชิก
 }else if(!empty($_SESSION['sess_mb_id'])){ ?>
 
 
 

<div id="ul-box">
<div id='cssmenu'>
<ul id="adm">
<!-- <li><a href="logout.php" id="curser"><span> ออกจากระบบ</span></a></li> -->

<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ข้อมูลส่วนตัว</span></a>
<ul>
<li><a href="main.php?page=member-edit"><span><i class="icon-edit"></i> แก้ไขข้อมูลส่วนตัว</span></a></li>
<li><a href="main.php?page=member-repass"><span><i class="icon-refresh"></i> เปลี่ยนรหัสผ่าน</span></a></li>
</ul>
</li>


<?php if($_SESSION['sess_mb_menu']==1){ ?>

<li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ระบบการจัดการงานซ่อม</span></a>
<ul>
<li><a href="main.php?page=order_repair-list"><span><i class="icon-file"> </i> ติดตามงานซ่อม</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=2"><span><i class="icon-thumbs-up"></i> กำลังดำเนินการซ่อม</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=3"><span><i class="icon-ok-circle"></i> งานซ่อมเสร็จพร้อมส่ง</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=4"><span><i class="icon-time"></i> ประวัติงานซ่อม</span></a></li>
 
</ul>
</li>
<li class='has-sub'><a href='main.php?page=equipment_service-list' id="curser"><span><i class=""></i>ครุภัณฑ์ที่ใช้งาน</span></a>

<?php }else if($_SESSION['sess_mb_menu']==2){ ?>
 <li class='has-sub'><a href='#' id="curser"><span><i class=""></i>ข้อมูลการแจ้งซ่อมครุภัณฑ์</span></a>
<ul>
<li><a href="main.php?page=order_repair-list"><span><i class="icon-th-list"></i> รายการแจ้งซ่อม</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=1"><span><i class="icon-th-list"></i> รอดำเนินการ</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=2"><span><i class="icon-th-list"></i> กำลังดำเนินการ</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=3"><span><i class="icon-th-list"></i> ดำเนินการเรียบร้อย</span></a></li>
<li><a href="main.php?page=order_repair-list&stt=4"><span><i class="icon-th-list"></i> ประวัตการแจ้งซ่อม</span></a></li>
</ul>
</li>

<li class='has-sub'><a href='main.php?page=equipment_service-repair' id="curser"><span><i class=""></i>แจ้งซ่อมครุภัณฑ์</span></a>

<li class='has-sub'><a href='main.php?page=equipment_service-list' id="curser"><span><i class=""></i>ครุภัณฑ์ที่ใช้งาน</span></a>
<?php } ?> 


</ul>
</div>
</div>



<?php } ?>
