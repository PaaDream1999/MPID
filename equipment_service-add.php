 
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>  
<script type="text/javascript">  
$(function(){  

	
	//-----------------------------------------------------------------------------------
    $("select#id_equipment_type").change(function(){  
        var datalist2 = $.ajax({    // รับค่าจาก ajax เก็บไว้ที่ตัวแปร datalist2  
              url: "data-list-box.php", // ไฟล์สำหรับการกำหนดเงื่อนไข  
              data:"id_equipment_type="+$(this).val(), // ส่งตัวแปร GET ชื่อ list1 ให้มีค่าเท่ากับ ค่าของ list1  
              async: false  
        }).responseText;         
		 
        $("select#model_id").html(datalist2); // นำค่า datalist2 มาแสดงใน listbox ที่ 2 ที่ชื่อ list2  
        // ชื่อตัวแปร และ element ต่างๆ สามารถเปลี่ยนไปตามการกำหนด 
    });  
	//-----------------------------------------------------------------------------------
	
	//-----------------------------------------------------------------------------------
	    $("select#id_location").change(function(){  
        var datalist3 = $.ajax({    // รับค่าจาก ajax เก็บไว้ที่ตัวแปร datalist2  
              url: "data-list-box.php", // ไฟล์สำหรับการกำหนดเงื่อนไข  
              data:"id_location="+$(this).val(), // ส่งตัวแปร GET ชื่อ list1 ให้มีค่าเท่ากับ ค่าของ list1  
              async: false  
        }).responseText;          
        $("select#lab_id").html(datalist3); // นำค่า datalist2 มาแสดงใน listbox ที่ 2 ที่ชื่อ list2  
        // ชื่อตัวแปร และ element ต่างๆ สามารถเปลี่ยนไปตามการกำหนด 
    }); 
	//-----------------------------------------------------------------------------------


 	//-----------------------------------------------------------------------------------
    $("select#mb_affiliation").change(function(){  
        var datalist4 = $.ajax({    // รับค่าจาก ajax เก็บไว้ที่ตัวแปร datalist2  
              url: "data-list-box.php", // ไฟล์สำหรับการกำหนดเงื่อนไข  
              data:"mb_affiliation="+$(this).val(), // ส่งตัวแปร GET ชื่อ list1 ให้มีค่าเท่ากับ ค่าของ list1  
              async: false  
        }).responseText;         
		 
        $("select#user_id").html(datalist4); // นำค่า datalist2 มาแสดงใน listbox ที่ 2 ที่ชื่อ list2  
        // ชื่อตัวแปร และ element ต่างๆ สามารถเปลี่ยนไปตามการกำหนด 
    });  
	//-----------------------------------------------------------------------------------

 
 

});  
</script>
 
 
 <div id="box-form">
<h2 id="title-txt">เพิ่มครุภัณฑ์ที่ให้บริการ</h2> 
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
<?php include "inc-check-from.php"; ?>
<?php
		  		if(!empty($_GET['ID'])){
					$sql = mysqli_query($con,"Select * From $tableSql Where id_$tableSql='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include "table-sql/tb-$tableSql.php"; 
					}
		  ?>

<table border="0" cellspacing="1" style="width: 100%; margin-bottom: 5px;">
    <tr>
      <td width="19%" align="right">ประเภทครุภัณฑ์</td>
      <td width="81%"><select  name="id_equipment_type" id="id_equipment_type" style="width: 200px; padding:5px;">
        <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
        <?php
							    $sql = mysqli_query($con,"Select * From equipment_type");
								while($rs=mysqli_fetch_array($sql)){
											 $equipment_id = $rs['id_equipment_type'];
											 $equipment_name = $rs['name'];
												 
												 
														echo "<option value=".$equipment_id.">".$equipment_name."</option>";
												 
											}
									   ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">ครุภัณฑ์ที่ใช้</td>
      <td><select  name="model_id" id="model_id" style="width: 200px; padding:5px;">
        <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">เลขครุภัณฑ์</td>
      <td><input  name="equipment_code" type="text" id="txt" style="width: 200px;" /></td>
    </tr>
    <tr>
      <td align="right">สังกัดหน่วยงาน</td>
      <td><select  name="mb_affiliation" id="mb_affiliation" style="width: 200px; padding:5px;">
          <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
          <?php
							    $sql = mysqli_query($con,"Select DISTINCT(mb_affiliation) From member");
								while($rs=mysqli_fetch_array($sql)){
											 $mb_affiliation = trim($rs['mb_affiliation']);
											echo "<option value=".$mb_affiliation.">".$mb_affiliation."</option>";
												 
											}
									   ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">ผู้ใช้ครุภัณฑ์</td>
      <td><select  name="user_id" id="user_id" style="width: 200px; padding:5px;">
          <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">สถานที่ใช้ครุภัณฑ์</td>
      <td><select  name="id_location" id="id_location" style="width: 200px; padding:5px;">
          <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
          <?php
							    $sql = mysqli_query($con,"Select * From location");
								while($rs=mysqli_fetch_array($sql)){
											 $location_id = $rs['id_location'];
											 $location_name = $rs['name'];
												 
												 
														echo "<option value=".$location_id.">".$location_name."</option>";
												 
											}
									   ?>
      </select></td>
    </tr>
    <tr>
      <td align="right">ชื่อห้อง</td>
      <td><select  name="lab_id" id="lab_id" style="width: 200px; padding:5px;">
          <option value="0" selected="selected">---------เลือกข้อมูล---------</option>
      </select></td>
    </tr>
    <tr>
      <td align="right">หมายเหตุ</td>
      <td><textarea rows="3" id="note" style="width: 75%;" name="note">-</textarea></td>
    </tr>
    <tr>
      <td align="right"></td>
      <td><button type="submit" class="btn">บันทึกข้อมูล</button>
          <button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
        <input type="hidden" name="Table" value="<?=$tableSql?>" />
          <input type="hidden" name="Sql" value="Insert" />      </td>
    </tr>
    <tr>
      <td align="right"></td>
      <td>&nbsp;</td>
    </tr>
</table>
</form>
 </div>
 
<?php include "$pageUrl-report.php"; ?> 