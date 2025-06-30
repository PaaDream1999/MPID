<?php
session_start();
session_id(); 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "cke_date_func.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
</head>

<body>
<?php
$tableSQL = $_REQUEST['Table'];
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
if(!empty($tableSQL)){
include "connect.php";
$Sql = $_REQUEST['Sql'];
$Table = $tableSQL;
include "table-sql/tb-".$Table.".php";
}else{ 
exit("<script>alert('ตัวแปร Table ไม่มีข้อมูล!');(history.back());</script>");
}	
?>

</body>
</html>
