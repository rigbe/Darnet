<?php
/////////////////   this is the sign in page
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");


?>


<html>
<head>
<title><?php echo SYSTEM_NAME;?> - About Us</title>
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
      <TD width="23%"></TD>
      <TD width="77%"></TD>
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
      <td width="23%" align=middle vAlign=top bgcolor="#FFFFFF"> <TABLE width=184 height="181" border=0>
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
              <TD align=middle height=18><font size="3"><?php echo SYSTEM_NAME;?> </font></TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD height="117" id=form_headers><p>&quot;Business is an 
                          activity that humans perform to survive. There are no 
                          barriers,excuses,and certainties&quot;.</p></TD>
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
        <p>&nbsp; </p></td>
      <TD align=left><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr> 
            <td><fieldset>
              <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td>Message from the company
                    <p>&quot;There's a point in your life where you're disillusioned 
                      and where you go from being a naive person who will trust 
                      basically anyone... to the realization that not everyone 
                      is good and not everyone is well-intentioned. Then it becomes 
                      your decision how to deal with that&#8212;whether to become 
                      bitter and cynical right off or whether to become a good 
                      person and just be more cautious in seeing who's trustworthy 
                      and who isn't. We think that's the real maturation that 
                      everyone goes through&#8212;and We think it's the &#8220;turning 
                      point in everyone's life; the point of ahha&#8221;&quot;<br>
                      Life has so many turning points. Each turning point involves 
                      a choice, a decision to be made. Why not be at your best? 
                      You can be at your best, with excellent, beneficial decisions. 
                      The same is true in your business, to make the best, the 
                      very best of your decades on planet earth. Here is the best 
                      business opportunity with the best product.<br>
                      Make your choice, <a href="referrer_registration.php">sign 
                      up now.</a></p>
                    <p><font size="3"><?php echo SYSTEM_NAME;?></font> Global 
                      Network<br>
                    </p></td>
                </tr>
              </table>
              </fieldset>
       
<hr>
              <fieldset><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr> 
                  <td><p><font color="#993333" size="2"><em>COMPANY PROFILE</em></font></p>
                    <p><br>
                      <font size="3"><?php echo SYSTEM_NAME;?> </font>is organized 
                      by passionate, well experienced, Integrated and hard working 
                      giants from different background and profession. Have you 
                      come across with the word ahha? Have you ever said ahha 
                      in your life? Point of ahha is a turning point in everyone's 
                      life.Our&#8217;s founding team and leaders are those who 
                      made the best decision to be the very best they can. The 
                      company is known for:- </p>
                    <blockquote> 
                      <blockquote>
                        <p>&#8226; Quality management<br>
                          &#8226; Quality and consumable local products<br>
                          &#8226; Contextualized applicable and customer oriented 
                          training<br>
                          &#8226; Customer centered service<br>
                          &#8226; Addressing the whole parts of the society </p>
                      </blockquote>
                    </blockquote>
                    <p></p></td>
  </tr>
</table>
</fieldset></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table> </TD>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;DarNet,&nbsp;All 
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
