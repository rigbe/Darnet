<?php
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");




?>
<html>
<head>
<title><?php echo SYSTEM_NAME;?> - Why Us ?</title>
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
                <a style="COLOR: #0c4c4c" href="referrer_registration.php">Register</a>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp;&nbsp; 
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
      <TD width="23%"></TD>
      <TD></TD>
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
      <TD width="23%" rowspan="3" align=middle vAlign=top> <TABLE width=157 height="225" border=0>
          <TBODY>
            <TR id=form_headers> 
              <TD align=left height=15><div align="center">Notes:</div></TD>
            </TR>
            <TR> 
              <TD height=204 bgcolor="#CCCCCC" id=form_headers> Our era has been 
                an era of the commercial boom. Thanks to the internet you are 
                only a click away from any kind of transaction that you want to 
                make on-line. Committed to the state-of-the-art technology our 
                network support is ready to serve its customers to the best of 
                their satisfactions.<br> </TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp;</p></TD>
      <TD height="66" align=left><fieldset>
        <table width="99%" height="89" border="0">
          <tr> 
            <td width="39%" height="85"><table width="97%" height="67" border="0">
                <tr>
                  <td><font color="#000000" size="4">Join <?php echo SYSTEM_NAME;?> 
                    today!</font></td>
                </tr>
              </table></td>
            <td width="61%">&nbsp;</td>
          </tr>
        </table>
        </fieldset></TD>
    </TR>
    <TR> 
      <TD height="183" align=left><fieldset>
        <legend><em><font color="#990000">what to do</font></em></legend>
        <table width="99%" height="262" border="0">
          <tr> 
            <td height="258"> <ul>
                <li><font color="#000000" size="2">Visit our page: www.<?php echo SYSTEM_NAME;?>.com 
                  or our office and choose the product you are interested to buy</font></li>
                <li><font color="#000000" size="2">Buy a product to get qualified for the 
                  customer compensation program, each product has price and product 
                  description</font></li>
                <li><font color="#000000" size="2">Visit our office/agents/leaders 
                  , make payment, and find an E-card, to get registered. </font></li>
                <li><font color="#000000" size="2">Get registered to secure a position 
                  in the company&#8217;s dynamic database.</font></li>
                <li><font color="#000000" size="2">Enter the name of the person who referred 
                  you to this business opportunity.</font></li>
                <li><font color="#000000" size="2">Finally the system will assign a tracking 
                  center for you and you will be designated as an Independent 
                  Representative obtaining your own virtual office so that the 
                  system tracks all your direct and indirect referrals and calculates 
                  your compensation. </font></li>
                <li><font color="#000000" size="2">Refer at least two people and get activated.</font></li>
              </ul></td>
          </tr>
        </table>
        </fieldset>
        &nbsp;</TD>
    </TR>
    <TR>
      <TD height="184" align=left><fieldset>
        <legend><em><font color="#990000">Benefit package</font></em></legend>
        <table width="99%" height="166" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
          <tr> 
            <td><font color="#666666" size="3" face="Arial, Helvetica, sans-serif">* 
              For each person you referred the company pays you a commision of 
              50 birr per person or per sale.The same applies for each person 
              down your line</font></td>
          </tr>
          <tr> 
            <td><font color="#666666" size="3" face="Arial, Helvetica, sans-serif">* 
              You will get the first commission- 300 birr, when you have 6 down 
              lines, 3 left and 3 right. you can claim commission only once per 
              sale.</font></td>
          </tr>
          <tr> 
            <td height="59"><p><font color="#666666" size="3"><font face="Arial, Helvetica, sans-serif">The 
                more you promote the more will be your profit.</font></font></p>
              <p><font color="#666666" size="3"><font face="Arial, Helvetica, sans-serif">Thanks</font></font></p></td>
          </tr>
        </table>
</fieldset>&nbsp;</TD>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;DarNet, 
                &nbsp;&nbsp;All Rights Reserved</SPAN> </TD>
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
