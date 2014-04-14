<?php
session_start(); 
include("dbinterface/dbhandler.php");
include("dbinterface/dbinterface.php");
require_once("classes/customer.php");

	if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

 else
  {
  
   $c=new customer();
  $customer_id=$_SESSION['customer_id'];   ///this variable has the prefix attached yet
  $customer=$c->getcustomer($customer_id);
  $customer_address=$c->getcustomeraddress($customer_id);
     
			 if(isset($_POST['Submit']))
			   {
			 	
				  $new_password=$_POST['newpass']; 
				  $new_password2=$_POST['newpass2']; 
				   if($new_password==$new_password2)
					  {
					   if($c->change_my_password($customer_id,$new_password))
						 $msg="Your password has been changed successfully!"; 
					   else
						$msg="There was a system error, Please try again!"; 
					   
					  }
					  else
						{	
						$msg="The passwords you entered do not match,Please try again!"; 	
						
						}   
			   
				}    //////   the submit if is over
		 
  }
?>


<html>
<head>
<title>Welcome,<?php echo  $customer['salutation']." ". $customer['first_name']; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function checkWholeForm(theForm) {
    var why = "";
    why += password_empty(theForm.newpass.value);
    why += passwordconfirmation_empty(theForm.newpass2.value);
    if (why != "") {
       alert(why);
       return false;
    }
return true;
}

	function password_empty(strng) {
	 var error = "";
	 if (strng == "") {
		error = "You didn't enter a new password.\n";
	 }
	 return error;
 }
	function passwordconfirmation_empty(strng) {
	 var error = "";
	 if (strng == "") {
		error = "You didn't confirm your password.\n";
	 }
return error;
}	 








//-->

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
    if (val) { nm=val.id; if ((val=val.value)!="") {
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
</head>

<body>
<TABLE width=800 height="100%" border=0 align="center">
  <TBODY>
    <TR>
      <!----Header Links---->
      <STYLE type=text/css>.style1 {
	COLOR: #ffcc00
}
</STYLE>
      <TD align=right colSpan=2 height="25%"> <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
          <TBODY>
            <TR id=form_headers height=15> 
              <TD width="2%" align=left noWrap><SPAN id=link_titles 
            style="FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #0c4c4c"></SPAN><A 
            id=scroll_up name=scroll_up></A></TD>
              <TD align=right colSpan=3><A style="COLOR: #0c4c4c" 
            href="index.php">Home</A>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp;&nbsp; 
                <A style="COLOR: #0c4c4c" 
            href="signin.php">Login</A>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp; 
                <a style="COLOR: #0c4c4c" href="why.php">why join us</a>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp;&nbsp; 
                <A 
            style="COLOR: #0c4c4c" 
            href="contactus.php">Contact Us</A> 
                <!--&nbsp;&nbsp;&nbsp;<span style="color:#0C4C4C; font-weight:bolder">::</span>&nbsp;&nbsp;
			    <a href="contacts.php" style="color:#0C4C4C">Privacy Terms</a>-->
              </TD>
            </TR>
            <TR height=92> 
              <TD vAlign=bottom colspan="3"><img src="images/ahhabanner.jpg" width="405" height="53" align="absbottom"><img src="images/ahhatriangle%20.jpg" width="100" height="53" align="absbottom"> 
              </TD>
              <TD width="20%" ><img src="images/ahhalink.jpg" width="100" height="53" border="0" align="absbottom" usemap="#Map" href="../index.php"></TD>
            </TR>
            <TR style="BACKGROUND-COLOR: #0c4c4c" align=middle width="100%"> 
              <TD noWrap colSpan=6></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
    <TR> 
      <TD width="25%"></TD>
      <TD width="75%"></TD>
    </TR>
    <TR>
      <!----Left Links---->
      <STYLE>BODY {
	FONT-SIZE: 10pt; COLOR: navy
}
TD {
	BACKGROUND-REPEAT: no-repeat
}
.trigger {
	CURSOR: pointer
}
.branch {
	DISPLAY: none; MARGIN-LEFT: 16px
}
</STYLE>
      <TD width="15%" align=middle vAlign=top bgcolor="#CCCCCC"> <table width=159 height="95" border=0>
          <tbody>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr id=form_headers> 
              <td align=middle height=18>Personal Information</td>
            </tr>
            <tr id=form_headers> 
              <td><TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;<a href="change_password.php">&nbsp;Change 
                        Password</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp; <a 
                  href="change_personal_info.php">Change My Address</a></TD>
                    </TR>
                    <TR align=left>
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp; </TD>
                    </TR>
                  </TBODY>
                </TABLE></td>
            </tr>
            <tr> 
              <td height=18></td>
            </tr>
          </tbody>
        </table> 
        <TABLE width=158 height="141" border=0>
          <TBODY>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR id=form_headers> 
              <TD align=middle height=18>Geneology</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="downlines.php" target="_blank">&nbsp;&nbsp;List 
                        All downlines</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;<a href="r_downlines.php" target="_blank">&nbsp;Right 
                        downlines</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="l_downlines.php" target="_blank">&nbsp;&nbsp;Left 
                        downlines</a></TD>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
            </TR>
            <TR> 
              <TD height=18></TD>
            </TR>
          </TBODY>
        </TABLE>
        <TABLE width=158 height="141" border=0>
          <TBODY>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR id=form_headers> 
              <TD align=middle height=18>Payments</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="weekly_commision.php" target="_blank">&nbsp;&nbsp;Commission 
                        this week</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="my_evoucher.php" target="_blank">&nbsp;</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;&nbsp;</TD>
                    
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                    <TR align=left> 
                      <TD onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
            </TR>
            <TR> 
              <TD height=18></TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></TD>
      <TD align=left><table width="614" height="708" border="0" cellpadding="5" cellspacing="4">
          <tr> 
            <td height="24" colspan="2"><div align="right"><?php echo date("F,j/Y"); ?></div></td>
          </tr>
          <tr id=form_headers> 
            <td height="10" colspan="2"> <div align="left"><a style="COLOR: #0c4c4c" href="logout.php"><strong>Log 
                Out </strong></a>here<br>
              </div></td>
          </tr>
          <tr>
            <td height="10" colspan="2"><div align="center"><font size="+1"><?php echo $customer['salutation']." ".$customer['first_name']." ".$customer['middle_name']." ".$customer['last_name'];  ?></font> 
              </div>
              <hr width="50%"></td>
          </tr>
          <tr> 
            <td width="368" height="127"><fieldset>
              <legend><em><font size="2">Change password</font></em></legend>
              <form action="change_password.php" method="post" name="frmchangepass" id="frmchangepass" onSubmit="MM_validateForm('new password','','R','password confirmation','','R');return document.MM_returnValue" >
                <table width="100%" height="116" border="0">
                  <tr bgcolor="#495e83"> 
                    <td height="20" colspan="2" id=main_content><font color="#FFFFFF" size="2">Fill 
                      the following</font></td>
                  </tr>
                  <tr> 
                    <td width="53%" height="14" id=main_content>New Password:</td>
                    <td width="47%"><input name="newpass" type="password" id="new password"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Confirm New Password:</td>
                    <td><input name="newpass2" type="password" id="password confirmation"></td>
                  </tr>
                  <tr> 
                    <td height="31">&nbsp;</td>
                    <td><input type="submit" name="Submit" value="Change"></td>
                  </tr>
                  <tr> 
                    <td height="13" colspan="2" id=form_headers></td>
                  </tr>
                </table>
              </form>
              </fieldset>
              &nbsp;
              <?php if(isset($msg)) echo '<p><h5><font color="#FF0022" face="Arial Narrow"><center>'.$msg.'</centrer></font></h5> </font>';?>
            </td>
            <td width="214"><div align="center"> 
                <p><em><font size="3"><?php echo SYSTEM_NAME;?></font><font color="#990000" size="3" face="Times New Roman, Times, serif"> 
                  Virtual Office</font></em></p>
                <p><em><a href="customerpage.php">Back to my office desk</a></em></p>
              </div></td>
          </tr>
          <tr> 
            <td height="166">&nbsp;</td>
            <td>&nbsp;
              </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></TD>
    </TR>
    <TR height=23> 
      <TD colSpan=2></TD>
    </TR>
    <TR>
      <!----Footer Links---->
      <TD align=right colSpan=2> <TABLE cellSpacing=0 cellPadding=0 width="100%">
          <TBODY>
            <TR id=form_headers align=left height=15> 
              <TD>&nbsp;</TD>
              <TD align=right><SPAN 
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;www.ahhanet.com&nbsp;&nbsp;All 
                Rights Reserved</SPAN> </TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
<map name="Map">
  <area shape="rect" coords="7,10,99,30" href="index.php" alt="Ahha Home">
</map>
</body>
</html>
