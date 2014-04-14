<?php
/////////////////   this is the products page
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");

?>


<html>
<head>
<title><?php echo SYSTEM_NAME;?> - Products</title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<TABLE width=800 height="184%" border=0 align="center">
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
      <TD width="9%"></TD>
      <TD width="91%"></TD>
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
      <TD colspan="2" align=middle vAlign=top>
<table width="100%" height="901" border="0" align="center" cellpadding="2" cellspacing="2">
          <tr> 
            <td height="14" colspan="2"><div align="center"><font color="#990000" size="3" face="Arial Narrow"><?php echo SYSTEM_NAME;?>
                Product display</font> </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="56%" height="14" bgcolor="#FFFFFF"><div align="center"></div></td>
            <td width="44%" height="14"><font color="#495e83">______________________________________________________</font></td>
          </tr>
          <tr> 
            <td height="36" colspan="2"> <fieldset>
              <div align="right"> <font color="#000000" size="2"><em>Do business with us!</em></font> <font color="#CC3300"><img src="images/collection2.jpg" width="115" height="130"></font> 
              </div>
              </fieldset></td>
          </tr>
          <tr> 
            <td height="10" colspan="2" bgcolor="#FFFFFF"> <div align="center"></div></td>
          </tr>
          <tr bgcolor="#495e83"> 
            <td height="11" bgcolor="#495e83"><div align="center"></div>
              <a href="referrer_registration.php"> 
              <marquee behavior="slide">
              </marquee>
              </a> <div align="center"></div></td>
            <td height="11" bgcolor="#FFFFFF"><a href="referrer_registration.php"> 
              <marquee behavior="slide">
              You have to be a registered <?php echo SYSTEM_NAME;?> customer to buy a product. 
              </marquee>
              </a></td>
          </tr>
          <tr> 
            <td height="658" colspan="2"><table width="94%" height="260" border="0" align="center" style="border:3 dotted red">
                <?php
$sql = 'SELECT * FROM product ORDER BY pid';
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
if(file_exists("productimages/".$row['productname'].".jpg"))
    {
	 
      $size=GetImageSize("productimages/".$row['productname'].".jpg");
	  }
  ?>
                <tr> 
                  <td height="132" colspan="2"><div align="left"><img src="productimages/<?php echo $row['productname'].".jpg"; ?>" border="0" width="130" height="130"></div></td>
                </tr>
                <tr> 
                  <td width="7%" id="main_content">product:</td>
                  <td width="29%" bordercolor="#9999FF" bgcolor="#FFFFFF"><?php echo $row['productname']; ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="20" id="main_content">price:</td>
                  <td height="20" bgcolor="#FFFFFF"><?php echo $row['price']; ?></td>
                  <td width="26%"></td>
                </tr>
                <tr bgcolor="#99CC66"> 
                  <td height="14" colspan="4" ><?php echo $row['description']; ?></td>
                </tr>
                <tr> 
                  <td height="22" colspan="4" ><hr></td>
                </tr>
                <?php
     }
//echo join('',$output); 
?>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p></td>
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
