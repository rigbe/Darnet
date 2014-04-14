<?php
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");

?>
<html>
<head>
<title>DarNet-Customer Preregistration</title>
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

<body onload=registration.referrer_id.focus()>
<TABLE width=800 height="100%" border=0 align="center">
  <TBODY>
    <TR>
      <!----Header Links---->
      <STYLE type=text/css>.style1 {
	COLOR: #ffcc00
}
</STYLE>
      <SCRIPT language=javascript>
function destroy_cookie(){
	var expdate = new Date();
	expdate.setTime (expdate.getTime() - (3*24*60*60*1000));
	document.cookie = "recipient=''; expires=" + expdate.toGMTString();
	document.cookie = "subject=''; expires=" + expdate.toGMTString();
	document.cookie = "message=''; expires=" + expdate.toGMTString();
}
</SCRIPT>
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
              <TD vAlign=bottom colspan="4"><img src="images/ahhabanner.jpg" width="405" height="53" align="absbottom"><img src="images/ahhatriangle%20.jpg" width="100" height="53" align="absbottom"> 
              </TD>
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
      <TD vAlign=top align=middle width="15%"> 
        <p>&nbsp; </p>
        <TABLE width=157 height="70" border=0>
          <TBODY>
            <TR id=form_headers> 
              <TD align=left height=15><div align="center">Notes:</div></TD>
            </TR>
            <TR> 
              <TD height=28 bgcolor="#CCCCCC" id=form_headers><p>your referrer 
                  Id and placement Id may be different</p>
                <p>Default side is LEFT</p>
                <p>&nbsp;</p></TD>
            </TR>
          </TBODY>
        </TABLE>
        <TABLE width=157 border=0>
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
              <TD align=middle height=18><div align="center"><?php echo SYSTEM_NAME;?> 
                  Business.</div></TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE width="100%" height="116" border=0 
            align=left cellPadding=0 cellSpacing=0 id=link_titles>
                  <TBODY>
                    <TR align=left> 
                      <TD height="88" onmouseover="this.background='images/select.jpg'" 
                onmouseout="this.background=''" id=form_headers><?php echo SYSTEM_NAME;?> 
                        has always been commited to its business partners.Be our 
                        partner for a life long successful journey. </TD>
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
        <p>&nbsp; </p> </TD>
      <TD align=left> <TABLE height=518 width=615 border=0>
          <TBODY>
            <TR> 
              <TD vAlign=top> <table width="91%" border="0" align="center" cellpadding="6" cellspacing="8">
                  <!--DWLayoutTable-->
                  <tr> 
                    <td width="438" height="332" rowspan="2" valign="top" class="vertical" ><font size="4">Pre-registration 
                      form </font><br>
                      <form action="checkreferrer.php" method="post" name="registration" onSubmit="MM_validateForm('referrer_id','','R','placement_id','','R');return document.MM_returnValue">
                        <table width="100%" border="0" cellspacing="5" bgcolor="#FFFFFF">
                          <tr bgcolor="#495e83"> 
                            <td colspan="2" bgcolor="#495e83"><div align="left"><font color="#FFFFFF" size="2">Please 
                                fill the following</font></div></td>
                          </tr>
                          <tr> 
                            <td width="112" id="main_content"><div align="right">My 
                                referrer Id:</div></td>
                            <td width="275"><input name="referrer_id" type="text" id="referrer_id"></td>
                          </tr>
                          <tr> 
                            <td width="112" height="24" id="main_content"><div align="right">Placement 
                                ID:</div></td>
                            <td width="275" height="24"><input name="placement_id" type="text" id="placement_id" onBlur="MM_validateForm('referrer_id','','R','placement_id','','R');return document.MM_returnValue"></td>
                          </tr>
                          <tr> 
                            <td id="main_content"><div align="right">Select side:</div></td>
                            <td><select name="side" id="side">
                                <option value="left" selected>Left</option>
                                <option value="right">Right</option>
                              </select></td>
                          </tr>
                          <tr> 
                            <td height="23">&nbsp;</td>
                            <td><input name="submit" type="submit" id="submit" value="Check Referrer"></td>
                          </tr>
                          <tr> 
                            <td height="15" colspan="2" id=form_headers></td>
                          </tr>
                        </table>
                      </form>
					   <p><?php $ermsg=$_REQUEST['ermsg'];echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>';?>
                       </p>
                      <fieldset>
<legend><font color="#990000" size="2"><strong><font size="3">Important 
                      notice</font></strong></font></legend>
                      <table width="100%" border="0">
                        <tr> 
                          <td height="63" id="main_content"><p align="justify"><em><font size="2">Your 
                              referrer might be a registered Representative, Company 
                              or Website. Here you can use only Representative 
                              and Company ID as a referrer. If you do not have 
                              a referrer ID, please contact Network Support Team.</font></em></p></td>
                        </tr>
                      </table>
                      </fieldset>
                      <p>&nbsp; </p></td>
                    <td width="126" height="107" valign="top" class="vertical" ><p align="right"><img src="images/suit%20man.jpg" width="123" height="130"></p></td>
                  </tr>
                  <tr> 
                    <td height="149" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                  </tr>
                </table></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007,&nbsp;DarNet.&nbsp;&nbsp;All 
                Rights Reserved</SPAN> </TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
</body>
</html>

