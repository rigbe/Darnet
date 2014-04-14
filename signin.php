<?php
/////////////////   this is the sign in page
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");


?>


<html>
<head>
<title><?php echo SYSTEM_NAME;?> - Signing In</title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
            href="referrer_registration.php">Register</A>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp; 
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
      <TD vAlign=top align=middle width="15%"> <TABLE width=157 border=0>
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
              <TD align=middle height=18><font size="3"><?php echo SYSTEM_NAME;?> </font>customers</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD height="117" id=form_headers>Our customer base has been 
                        growing fast. customers are happy with the quality products 
                        they purchase and the <em>business opportunity </em>they 
                        earn.... </TD>
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
        <TABLE width=149 height="79" border=0>
          <TBODY>
            <TR id=form_headers> 
              <TD align=middle height=15>Password Recovery:</TD>
            </TR>
            <TR> 
              <TD height=28 bgcolor="#CCCCCC" id=form_headers>You can recover 
                your lost password.Just click the forgot your password link.</TD>
            </TR>
          </TBODY>
        </TABLE>
        <p><img src="images/leaning.jpg" width="87" height="130"> </p> </TD>
      <TD align=left> <TABLE height=475 width=615 border=0>
          <TBODY>
            <TR> 
              <TD height="213" vAlign=top><p><font size="4">Sign In form</font></p>
                <FORM id="form1" name="frmLogin" action="customer_login.php" method="post">
                  <TABLE id=table3 cellSpacing=2 cellPadding=0 width="80%" 
            align=center border=0>
                    <TBODY>
                      <TR bgcolor="#495e83"height=12> 
                        <TD colSpan=2><font color="#FFFFFF" size="2">Please Enter 
                          your Customer ID and Password</font></TD>
                      </TR>
                      <TR> 
                        <TD id=link_titles style="COLOR: #000099" align=middle 
                  colSpan=2>If you are not registered, please get <a style="COLOR: #0c4c4c" href="referrer_registration.php">registered</a></TD>
                      </TR>
                      <TR> 
                        <TD id=main_content align=right>Customer ID:</TD>
                        <TD><INPUT name="customer_id"></TD>
                      </TR>
                      <TR> 
                        <TD id=main_content align=right>Password:</TD>
                        <TD><INPUT type="password" maxLength="15" name="password"></TD>
                      </TR>
                      <TR> 
                        <TD></TD>
                        <TD id=main_content align=left><INPUT name="submit" type=submit value="  Login  "></TD>
                      </TR>
                      <TR> 
                        <TD></TD>
                        <TD id=main_content align=left><A 
                  href="recover_password.php" target="_self">Forgot your 
                          password?</A> </TD>
                      </TR>
                      <TR> 
                        <TD id=form_headers colSpan=2 
            height=12></TD>
                      </TR>
                    </TBODY>
                  </TABLE>
                </FORM>
                <p align="center">&nbsp; 
                  <?php $ermsg=$_REQUEST['ermsg'];echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>';?>
                </p></TD>
            </TR>
            <TR>
              <TD vAlign=top>&nbsp;</TD>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;DarNet, 
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
