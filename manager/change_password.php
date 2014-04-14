<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");
require_once("../dbinterface/dbinterface.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser") )
        {
			
				 if(isset($_POST['Submit']))
				   {
	                    $act=new dbinterface();
						   if(!empty($_POST['new_pass']))
							   $new_pass=$_POST['new_pass'];
								else
								 {
								   $new_pass=$_SESSION['password'];
								   $_POST['new_pass2']=$_SESSION['password'];
								   }
							  
							  
							
							if($new_pass==$_POST['new_pass2'])
							 {
							 
							  $query_acc="UPDATE userverify SET password='$new_pass' WHERE  userid='".$_SESSION['properuser']."'";
							  if($act->perform_query($query_acc))
								{
								session_unregister("properuser");
								$topage="index.php?ermsg=Your account has been successfully changed,please log in again !";
								$time=0;
							   
								echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" />";  
			
								}
							  else
								$msg="The changes could not be made,Please try again";
							 
							 } 
							 
							else
							   $msg="The passwords You entered are not the same,Confirm your password again";
			  
					}      //////   the submit if is over
	

			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		
		  
		  ?>
		  <title>Admin Panel</title>
			
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<body background="../page_bg.jpg">
			<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
			  <tr> 
				<td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Administration Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
			  </tr>
			</table>
			
		
<br><table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><font color="#990000" size="4">Welcome Administrator</font></div></td>
  </tr>
</table>
<br>
<table width="75%" height="80" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left"><strong><font color="#000099"><em>Admin 
        Panel </em></font></strong></div></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr> 
    <td width="29%" height="494"><table width="112%" height="91" border="0">
        <tr> 
          <td><a href="custom_reg.php">Registration Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_shop.php">Shopping Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_report.php">Report Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_banner.php">Banner Management</a></td>
        </tr>
        <tr> 
          <td><a href="change_password.php">Change Password</a></td>
        </tr>
        <tr> 
          <td><a href="managerlogout.php">Log Out</a></td>
        </tr>
      </table>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="71%"><fieldset>
      <table width="100%" border="0">
        <tr>
          <td height="23"><form action="change_password.php" method="post" name="form1" onSubmit="MM_validateForm('new_pass','','R','new_pass2','','R');return document.MM_returnValue">
              <table width="98%" height="194" border="0">
                <tr> 
                  <td height="22" colspan="3" bgcolor="#CCCCCC">Admin Password 
                    Changer </td>
                  <td width="16%" rowspan="6"><fieldset>
                    </fieldset>
                    </td>
                </tr>
                <tr> 
                  <td width="26%" height="13"><div align="right">Old User Name:</div></td>
                  <td width="35%"><font color="#990000" size="+1"><?php echo $_SESSION['properuser'];?></font></td>
                  <td width="23%"><div align="right"></div></td>
                </tr>
                <tr> 
                  <td><div align="right">New password:</div></td>
                  <td><input name="new_pass" type="password" id="new_pass"></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="44"><div align="right">Confirm Password:</div></td>
                  <td><input name="new_pass2" type="password" id="new_pass2"></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="44">&nbsp;</td>
                  <td height="44"><input type="submit" name="Submit" value="Change"></td>
                  <td height="44">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="44" colspan="4"> 
                    <?php if(isset($msg)) echo '<p><h5><font color="#AA0011" face="Arial Narrow"><center>'.$msg.'</centrer></font></h5> </font>';?>
                  </td>
                </tr>
              </table>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
      </table></fieldset>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></tr>
</table>
</body>
			
           <?php
				
		
	    }
	
	
	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	



		///////////////////////////           FUNCTIONS.........................
		
		
		
		
		
		/////////////    this diplays ecards that  have been generated 


?>



