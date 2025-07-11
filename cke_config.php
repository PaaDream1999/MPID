<?php
$config=array(
	"basePath"=>"ckeditor/", //  กำหนด path ของ ckeditor
	"skin"=>"kama", // kama | office2003 | v2
	"language"=>"en", // th / en and more.....
	"extraPlugins"=>"uicolor", // เรียกใช้ plugin ให้สามารถแสดง UIColor Toolbar ได้
	"uiColor"=>"#FEEEBD", // กำหนดสีของ ckeditor
	"extraPlugins"=>"autogrow", // เรียกใช้ plugin ให้สามารถขยายขนาดความสูงตามเนื้อหาข้อมูล
	"autoGrow_maxHeight"=>400, // กำหนดความสูงตามเนื้อหาสูงสุด ถ้าเนื้อหาสูงกว่า จะแสดง scrollbar
	"enterMode"=>2, // กดปุ่ม Enter -- 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	"shiftEnterMode"=>1, // กดปุ่ม Shift กับ Enter พร้อมกัน 1=แทรกแท็ก <p> 2=แทรก <br> 3=แทรก <div>
	"height"=>200, // กำหนดความสูง
	"width"=>650,  // กำหนดความกว้าง * การกำหนดความกว้างต้องให้เหมาะสมกับจำนวนของ Toolbar
/*	"fullPage"=>true, // กำหนดให้สามารถแก้ไขแบบเโค้ดเต็ม คือมีแท็กตั้งแต่ <html> ถึง </html>*/
	"filebrowserBrowseUrl"=>"ckeditor/plugins/ajaxfilemanager/ajaxfilemanager.php",
	"filebrowserImageBrowseUrl"=>"ckeditor/plugins/ajaxfilemanager/ajaxfilemanager.php",
	"filebrowserFlashBrowseUrl"=>"ckeditor/plugins/ajaxfilemanager/ajaxfilemanager.php",
	"toolbar"=>array(
		array('Source','Format','Font','FontSize','Bold','Italic','Underline','Strike'),
		array('NumberedList','BulletedList','-','Outdent','Indent','Blockquote'),
		array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'),
		array('Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'),
		array('TextColor','BGColor')
	)
);
?>