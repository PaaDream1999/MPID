
<?php
include "connect.php";
?>


<?php if(isset($_GET['mb_affiliation']) && $_GET['mb_affiliation']!=""){?>  

<option value="0" selected="selected">---------เลือกข้อมูล---------</option>
   <?php  
 $sql = mysqli_query($con,"Select * From member Where mb_affiliation='".$_GET['mb_affiliation']."'");
  while($rs=mysqli_fetch_array($sql)){  
  ?>  
  <option value="<?=$rs['mb_id']?>"><?=$rs['mb_name']?></option>  
  <?php } ?>  
  
 
  
 

 
  
<?php } ?>  


<?php if(isset($_GET['id_equipment_type']) && $_GET['id_equipment_type']!=""){?>  
 
<option value="0" selected="selected">---------เลือกข้อมูล---------</option>
   <?php  
 $sql = mysqli_query($con,"Select * From equipment_model Where type_id='".$_GET['id_equipment_type']."'");
  while($rs=mysqli_fetch_array($sql)){  
  ?>  
  <option value="<?=$rs['id_equipment_model']?>"><?=$rs['name']?></option>  
  <?php } ?>  
  
 
  
 

 
  
<?php } ?>  






<?php if(isset($_GET['id_location']) && $_GET['id_location']!=""){?>  
  <option value="">---------เลือกข้อมูล---------</option>  
 
   <?php  
 $sql = mysqli_query($con,"Select * From lab Where location_id='".$_GET['id_location']."'");
  while($rs=mysqli_fetch_array($sql)){  
  ?>  
  <option value="<?=$rs['id_lab']?>"><?=$rs['name']?></option>  
  <?php } ?>  
  
 
 

 
  
<?php } ?>  








