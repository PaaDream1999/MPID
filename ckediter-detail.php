<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>
</head>

<body>

<script type="text/javascript" src="cke_func.js"></script>
<?php
include_once("ckeditor/ckeditor.php");
include_once("cke_config.php");
if(!empty($_GET['ID'])){
$initialValue = $detail; // ค่าเริ่มต้น กรณีดึงข้อมูลมาแก้ไข
}else{
$initialValue = '<p>This is some <strong>sample text</strong>.</p>'; // ค่าเริ่มต้น กรณีดึงข้อมูลมาแก้ไข
}
$CKEditor = new CKEditor();
// คืนค่าสำหรับใช้งานร่วมกับ javascript
$events['instanceReady'] = 'function (evt) { 
		return editorObj=evt.editor;
}';	
// บรรทัดด้านล่าง เปรียบได้กับการสร้าง textarea ชื่อ editor1 
// ตัวแปรรับค่า เป็น $_POST['editor1'] หรือ $_GET['editor1'] ตามแต่กรณี
$CKEditor->editor("detail", $initialValue,$config,$events);
?>
<!--
<br />



<button onclick="InsertHTML('<p>แทรก  HTML</p>',editorObj);">แทรก  HTML</button>
&nbsp;
<button onclick="SetContents('<p>แทนที่ข้อความทั้งหมด</p>',editorObj);">แทนที่ข้อความทั้งหมด</button>
&nbsp;
<button onclick="alert(GetContents(editorObj));">แสดงข้อมูลใน CKEditor</button>
-->
</body>
</html>