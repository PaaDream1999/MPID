<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
  <link rel="stylesheet" href="css/style-login.css">
</head>

<body>

<section class="container">
 <br />
 <span style="padding: 5px 5px 0px 10px; text-align:left;"> </span><br /><br /> <br /><br /> 
  <div class="login">
      <h1 style="padding: 5px 5px 0px 10px; text-align:left;"><img src="images/login_48.png" width="38" height="38"  border="0" />เข้าระบบ</h1>
      <form method="post" name="form2" action="check-login.php" onSubmit="return ChckTxT();">
	          <script language="javascript">
				  	function ChckTxT(){
							if(document.form2.user.value==""){
									alert("กรุณากรอกข้อมูล Username ด้วยนะ");
									document.form2.user.focus();
									return false;
							}
							else if(document.form2.pass.value==""){
									alert("กรุณากรอกข้อมูล Password ด้วยนะ");
									document.form2.pass.focus();
									return false;
							} else {
									return true;
							}
					}
				  </script>
	  
        <p><input name="user" type="text" id="user" value="" placeholder="Username or Email"></p>
        <p><input name="pass" type="password" id="pass" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
  </div>

    <div style="text-align:center;">
	 <br />
      <p>ระบบแจ้งซ่อมภายในบริษัท</p>
    </div>
</section>

</body>
</html>
