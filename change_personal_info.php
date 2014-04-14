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
			 
				  if(!empty($_POST['new_country']))
				   $new_country=$_POST['new_country'];
					else
					 $new_country=$customer_address['country'];
					
				  if(!empty($_POST['new_city']))
				    $new_city=$_POST['new_city'];
				   else
				     $new_city=$customer_address['town_or_city'];
	
					
				  if(!empty($_POST['new_address']))
				    $new_address=$_POST['new_address'];
					else
					$new_address=$customer_address['address'];

					
				  if(!empty($_POST['new_pobox']))
				    $new_pobox=$_POST['new_pobox'];
				   else
				   	 $new_pobox=$customer_address['pobox'];
	
					
				  if(!empty($_POST['new_email']))
				    $new_email=$_POST['new_email'];
				 else
				 	$new_email=$customer_address['email'];
	
					
				  if(!empty($_POST['new_mobile']))
				    $new_mobile=$_POST['new_mobile'];
					else
					$new_mobile=$customer_address['mobile_phone_number'];

					
				  if(!empty($_POST['new_home']))
				    $new_home=$_POST['new_home'];
				 else
				 	$new_home=$customer_address['home_phone_number'];
	
					
				  if(!empty($_POST['new_office']))
				    $new_office=$_POST['new_office'];
				  else
				   	$new_office=$customer_address['office_phone_number'];
	
					
				  if(!empty($_POST['new_bankaccount']))
				    $new_bankaccount=$_POST['new_bankaccount'];
				   else
				   	$new_bankaccount=$customer_address['bank_account'];
	

				 $change_pinfo=array('country'=>$new_country,'town_or_city'=>$new_city,'address'=>$new_address,'pobox'=>$new_pobox,'home_phone_number'=>$new_home,'office_phone_number'=>$new_office,'mobile_phone_number'=>$new_mobile,'email'=>$new_email,'bank_account'=>$new_bankaccount);
				   
					   if($c->change_my_address($customer_id,$change_pinfo))
						 $msg="Your change has been made successfully!"; 
					   else
						$msg="There was a system error, Please try again!"; 
						
			}////////// if for submit is over			
	
	   $customer_address=$c->getcustomeraddress($customer_id);  ////////////  customer address infromation is requested again..to show the changes in this page
					   		 
  }
?>


<html>
<head>
<title>Welcome,<?php echo  $customer['salutation']." ". $customer['first_name']; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
      <SCRIPT language=JavaScript>
var openImg = new Image();
function showBranch(branch){
	var objBranch = document.getElementById(branch).style;
	if(objBranch.display=="block")
		objBranch.display="none";
	else
		objBranch.display="block";
}
function selectMenu(obj){
	//var objMenu;
	/*if(get_cookie('clicked_menu')!=null){
		document.cookie="old_menu =" + get_cookie('clicked_menu');
		delete_cookie('clicked_menu');
	}
	document.cookie="clicked_menu =" + mnu;
	alert(get_cookie('clicked_menu'));*/
	//mnu.style.bgColor="#990000";
	//alert(obj.tagName);
	//objMenu=getElementById(mnu.href);
	//objMenu.style.color = '#990000';
	//document.mnu.style.color = '#990000';
	//getElementById(pageName[0])
}
function delete_cookie(cookie_name){
    var expdate = new Date();
    expdate.setTime (expdate.getTime() - (3*24*60*60*1000));
    document.cookie = cookie_name + "=''; expires=" + expdate.toGMTString();
}
</SCRIPT>
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
                onmouseout="this.background=''">&nbsp;</TD>
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
                onmouseout="this.background=''">&nbsp;&nbsp;</TD>
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
      <TD align=left><table width="614" height="591" border="0" cellpadding="5" cellspacing="4">
          <tr> 
            <td height="24"><div align="right"><?php echo date("F,j/Y"); ?></div></td>
          </tr>
          <tr id=form_headers> 
            <td height="10"> <div align="left"><a style="COLOR: #0c4c4c" href="logout.php"><strong>Log 
                Out </strong></a>here<br>
              </div></td>
          </tr>
          <tr> 
            <td height="10"><div align="center"><font size="+1"><?php echo $customer['salutation']." ".$customer['first_name']." ".$customer['middle_name']." ".$customer['last_name'];  ?></font> 
              </div>
              <hr width="50%"></td>
          </tr>
          <tr> 
            <td height="418"><fieldset>
              <form action="" method="post" name="form1" onSubmit="MM_validateForm('new_email','','NisEmail');return document.MM_returnValue">
                <table width="99%" height="369" border="0">
                  <tr> 
                    <td height="24" colspan="4" bgcolor="#495e83"><font color="#FFFFFF" size="2">Contact 
                      Address Change Form</font></td>
                  </tr>
                  <tr bgcolor="#CCCCCC"> 
                    <td width="29%" height="24"><div align="center"><font color="#000033">Information</font></div></td>
                    <td colspan="2"><div align="center"><font color="#000033">Current 
                        Value</font></div></td>
                    <td width="36%"><div align="center"><font color="#000033">Change 
                        to</font></div></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Country of Residence:</td>
                    <td colspan="2"><?php echo $customer_address['country']; ?></td>
                    <td><input name="new_country" type="text" id="new_country"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Town or City:</td>
                    <td colspan="2"><?php echo $customer_address['town_or_city']; ?></td>
                    <td><input name="new_city" type="text" id="new_city"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Address:</td>
                    <td colspan="2"><?php echo $customer_address['address']; ?></td>
                    <td><input name="new_address" type="text" id="new_address"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>P.O.Box:</td>
                    <td colspan="2"><?php echo $customer_address['pobox']; ?></td>
                    <td><input name="new_pobox" type="text" id="new_pobox"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>E-mail:</td>
                    <td colspan="2"><?php echo $customer_address['email']; ?></td>
                    <td><input name="new_email" type="text" id="new_email"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Mobile-phone-Number:</td>
                    <td colspan="2"><?php echo $customer_address['mobile_phone_number']; ?></td>
                    <td><input name="new_mobile" type="text" id="new_mobile"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Home-Phone-Number:</td>
                    <td colspan="2"><?php echo $customer_address['home_phone_number']; ?></td>
                    <td><input name="new_home" type="text" id="new_home"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Office-Phone-Number:</td>
                    <td colspan="2"><?php echo $customer_address['office_phone_number']; ?></td>
                    <td><input name="new_office" type="text" id="new_office"></td>
                  </tr>
                  <tr> 
                    <td id=main_content>Bank Account:</td>
                    <td colspan="2"><?php echo $customer_address['bank_account']; ?></td>
                    <td><input name="new_bankaccount" type="text" id="new_bankaccount"></td>
                  </tr>
                  <tr> 
                    <td colspan="4" id=form_headers>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td>&nbsp;</td>
                    <td width="19%">&nbsp;</td>
                    <td width="16%"><input type="submit" name="Submit" value="Change"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td colspan="4">
                      <?php if(isset($msg)) echo '<p><h5><font color="#FF0022" face="Arial Narrow"><center>'.$msg.'</centrer></font></h5> </font>';?>
                    </td>
                  </tr>
                </table>
              </form>
              <legend></legend>
            
              <div align="center"> 
               <p align="center"><em><a href="customerpage.php">Back to my office 
                desk</a></em></p>
              <p align="center"><em><font color="#990000" size="3" face="Times New Roman, Times, serif">Ahha 
                Virtual Office</font></em></p> 
                </div>  </fieldset></td>
          </tr>
          <tr>
            <td>
              </td>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;www.ahha.com&nbsp;&nbsp;All 
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
