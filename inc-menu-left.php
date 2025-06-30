<?php
 if(!empty($_SESSION['sess_adm_id'])){
	$sql = mysqli_query($con,"Select * From $admin Where adm_id='".$_SESSION['sess_adm_id']."'");
	$rs = mysqli_fetch_array($sql);
	$adm_name = $rs['adm_name'];
	$adm_id = $_SESSION['sess_adm_id'];
 ?>
<div id="box-content-left"> 
 <div id="title-left" style="padding-top: 3px;"> 
	 <p style="font-size:17px;">ยินดีต้อนรับผู้ดูแลระบบ </p>
		 <div id="profile">
			<p style="font-size: 13px;"><strong>คุณ</strong><?=$adm_name?></p> 
			<p style="font-size: 12px;"> <a href="main.php?stt=admin-profile&ID=<?=$adm_id?>">ข้อมูลส่วนตัว</a> | <a href="main.php?stt=admin-repass">เปลียนรหัสผ่าน</a></p>
		 </div>
	 </div>
</div> 

  <?php	
 
  $url = explode("-",$_GET['stt']);   
    $Table = $url[0];
    $page = $url[1];
 	
 
if(!empty($Table)){
switch($Table){	 
case 'orders': 
?>
<div id="box-content-left"> 
 <div id="title-left"> ข้อมูลใบสั่งซื้อ</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=orders-adm&ord=2"><span><i class="icon-list"></i> รายการแจ้งชำระเงิน</span></a></li>
		 <li><a href="main.php?stt=orders-adm&ord=3"><span><i class="icon-list"></i> อนุมัติสินค้า ตามใบสั่งซื้อ</span></a></li>
		 <li><a href="main.php?stt=orders-adm&ord=4"><span><i class="icon-list"></i> จัดส่งสินค้า ตามใบสั่งซื้อ</span></a></li>
		 <li><a href="main.php?stt=orders-adm&ord=5"><span><i class="icon-list"></i> รายการสินค้าจัดส่งแล้ว</span></a></li>
		 <li><a href="main.php?stt=orders-adm&ord=1"><span><i class="icon-list"></i> ยังไม่ชำระเงิน</span></a></li>
		 <li><a href="main.php?stt=orders-adm&ord=6"><span><i class="icon-list"></i> รายการยกเลิกใบสั่งซื้อ</span></a></li>
	</ul>
</div> 
<?php break; ?>
 <!-- End Case -------------------------->
 
<?php
 	case 'product': 
 	case 'category':
	case 'member':
	case 'report':
	case 'repass':
	case 'profile':
  ?>
  

  
<div id="box-content-left"> 
 <div id="title-left"> ระบบคลังสินค้า</div>
	<ul id="menu-left">
		<li><a href="main.php?stt=category-add"><span> เพิ่มหมวดหมู่สินค้า</span></a></li>
		<li><a href="main.php?stt=product-add"><span>  เพิ่มข้อมูลสินค้า</span></a></li>
		<li><a href="main.php?stt=product-stock"><span> สินค้าคงเหลือ</span></a></li>
		<li><a href="main.php?stt=product-buy"><span> สินค้า ณ จุดสั่งซื้อ</span></a></li>
	</ul>
</div> 

<?php break; ?>
<!-- End Case -------------------------->

<?php 
case 'dealers':
case 'point':
case 'store':
case 'orderin':
case 'basket':
case 'order_purchasing':

 ?>
<div id="box-content-left"> 
 <div id="title-left"> ระบบจัดซื้อสินค้า</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=dealers-add"><span><i class="icon-book"></i> เพิ่มร้านตัวแทนจำหน่าย</span></a></li>
		 <li><a href="main.php?stt=dealers-list"><span><i class="icon-book"></i> ร้านตัวแทนจำหน่าย</span></a></li>
		 <li><a href="main.php?stt=store-order"><span><i class="icon-book"></i> จัดซื้อสินค้าเข้าร้าน</span></a></li>
		 <li><a href="main.php?stt=store-point"><span><i class="icon-book"></i> สินค้า ณ จุดสั่งซื้อ</span></a></li>
		 
	</ul>
</div> 

<div id="box-content-left"> 
 <div id="title-left"> ใบจัดซื้อสินค้า</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=orderin&ord=1"><span><i class="icon-book"></i> ตรวจรับสินค้าเข้าร้าน</span></a></li>
		 <li><a href="main.php?stt=orderin&ord=2"><span><i class="icon-book"></i> รายการสินค้าค้างรับ</span></a></li>
		 <li><a href="main.php?stt=orderin&ord=3"><span><i class="icon-book"></i> รายงานใบจัดซื้อ</span></a></li>
		 <li><a href="main.php?stt=orderin&ord=4"><span><i class="icon-book"></i> รายงานยกเลิกใบจัดซื้อ</span></a></li>
	</ul>
</div> 

<?php break; ?>
<!-- End Case -------------------------->	
<?php 
case 'reports':
case 'admin':
 ?>
 <div id="box-content-left"> 
 <div id="title-left"> รายงาน</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=reports-product"><span><i class="icon-book"></i> รายงานสินค้า</span></a></li>
		 <li><a href="main.php?stt=reports-product-type"><span><i class="icon-book"></i> รายงานสินค้าตามประเภท</span></a></li>
		 <li><a href="main.php?stt=reports-member"><span><i class="icon-book"></i> ข้อมูลสมาชิก</span></a></li>
		 <li><a href="main.php?stt=reports-product-stock"><span><i class="icon-book"></i> รายงานสินค้าคงเหลือ</span></a></li>
		 <li><a href="main.php?stt=reports-orderin-store"><span><i class="icon-book"></i> สินค้า ณ จุดสั่งซื้อ</span></a></li>
		 <li><a href="main.php?stt=reports-product-best"><span><i class="icon-book"></i> สินค้าขายดี </span></a></li>
		 <li><a href="main.php?stt=reports-orderbuy"><span><i class="icon-book"></i> สินค้าตามรหัสใบสั่งซื้อ </span></a></li>
		  <li><a href="main.php?stt=reports-shipping"><span><i class="icon-book"></i> การจัดส่งสินค้า</span></a></li>
		  <li><a href="main.php?stt=reports-orderin"><span><i class="icon-book"></i> การจัดซื้อตามรหัส</span></a></li>
		  <li><a href="main.php?stt=reports-product-not"><span><i class="icon-book"></i> รายงานสินค้าค้างรับ</span></a></li>
		 <li><a href="main.php?stt=reports-orderin_check"><span><i class="icon-book"></i> การตรวจรับสินค้า</span></a></li>
		 <li><a href="main.php?stt=reports-dealers"><span><i class="icon-book"></i> ตัวแทนจำหน่าย</span></a></li>
		 <li><a href="main.php?stt=reports-orders-sale"><span><i class="icon-book"></i> ยอดขายสินค้า</span></a></li>
	</ul>
</div>  
 
<?php break; ?>
<!-- End Case -------------------------->	
<?php 
case 'shipping':
case 'bank':
 ?>
   <div id="box-content-left"> 
 <div id="title-left"> ระบบจัดส่งสินค้า</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=shipping-add"><span><i class="icon-book"></i> เพิ่มรูปแบบจัดส่งสินค้า</span></a></li>
		 <li><a href="main.php?stt=bank-add"><span><i class="icon-book"></i> เพิ่มรูปแบบการชำระเงิน</span></a></li>
	</ul>
</div> 

<?php break; ?>
<!-- End Case -------------------------->	

		
<?php default: ?>
<div id="box-content-left"> 
 <div id="title-left"> ข้อมูลระบบ</div>
	<ul id="menu-left">
		 <li><a href="main.php?stt=1"><span><i class="icon-book"></i> สินค้าขายดี</span></a></li>
		 <li><a href="main.php?stt=2"><span><i class="icon-book"></i> สินค้ามาใหม่</span></a></li>
		 <li><a href="main.php?stt=3"><span><i class="icon-book"></i> สินค้าแนะนำ</span></a></li>
	</ul>
</div>  


<!-- End Case -------------------------->	
 
<?php } ?>
<div id="box-content-left"> 
 <div id="title-left"> หมวดหมู่สินค้า</div>
		<ul id="menu-left">
		<?php
			$sql = mysqli_query($con,"Select * From category Order By category_id Asc ");
			while($rs = mysqli_fetch_array($sql)){
			$category_id = $rs['category_id'];
			$category_name = $rs['category_name'];
		?>
 			<?php if(!empty($_SESSION['sess_adm_id'])){ ?>
			<li><a href="main.php?stt=product-category&id_category=<?=$category_id?>"><i class="icon-book"></i> <?=$category_name?> </a></li>
 			<?php }else{ ?>
			<li><a href="index.php?stt=product-category&id_category=<?=$category_id?>"><i class="icon-book"></i> <?=$category_name?> </a></li>
			<?php } ?>
		<?php } ?>
		</ul>
</div>
<?php }}else{ ?>
 
 
<?php if(!empty($_SESSION['sess_mb_id'])){  
	$sql = mysqli_query($con,"Select * From $member Where mb_id='".$_SESSION['sess_mb_id']."'");
	$rs = mysqli_fetch_array($sql);
	include 'table-sql/tb-'.$member.'.php'; 
?>

 <div id="box-content-left"> 
 <div id="title-left" style="padding-top: 3px;"> 
	 <p style="font-size:18px;">ยินดีต้อนรับสมาชิก </p>
		 <div id="profile" style="font-size: 12px;">
			<p><strong>คุณ</strong><?=$mb_name?> </p>
			<p> <a href="index.php?stt=member-profile&ID=<?=$mb_id?>">ข้อมูลส่วนตัว</a> | <a href="index.php?stt=member-repass">เปลียนรหัสผ่าน</a></p>
		 </div>
	 </div>
</div> 

<div id="box-content-left"> 
 <div id="title-left"> ข้อมูลใบสั่งซื้อ</div>
	<ul id="menu-left">
		<li><a href="index.php?stt=orders-mb&ord=ord"><span><i class="icon-list"></i> ใบสั่งซื้อสินค้า</span></a></li>
		 <li><a href="index.php?stt=orders-mb&ord=2"><span><i class="icon-list"></i> แจ้งชำระเงิน</span></a></li>
		 <li><a href="index.php?stt=orders-mb&ord=5"><span><i class="icon-list"></i> รายการจัดส่งสินค้า</span></a></li>
		 <li><a href="index.php?stt=orders-mb&ord=6"><span><i class="icon-list"></i> รายการยกเลิกใบสั่งซื้อ</span></a></li>
	</ul>
</div> 


<?php }else{ ?>
   <div id="box-content-left"> 
 <div id="title-left"> Login เข้าระบบ</div>
	 <?php // include "login.php"; ?> 
	</div>
	<?php } ?>
 
 
 
<div id="box-content-left"> 
 <div id="title-left"> หมวดหมู่สินค้า</div>
 
</div>
<?php } ?>