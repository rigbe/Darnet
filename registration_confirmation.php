<?php
session_start();
include("dbinterface/dbhandler.php"); 

if(isset($_POST['submit']) && $_POST['submit']=='its right')
					{
						header("location:registration_ecardprocessor.php");

				//displayreferrerpage();
					exit;
					}

if(isset($_POST['submit']) && $_POST['submit']=='back')
					{
						header("location:customer_registration.php");

				//displayreferrerpage();
					exit;
					}

if(isset($_POST['submit']) && $_POST['submit']=='cancel')
					{
						header("location:index.php");

				//displayreferrerpage();
					exit;
					}


?>




<html>
<head>
<title><?php echo SYSTEM_NAME;?> -Registration Confirmation</title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
              <TD align=middle height=18>Note:</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;Please make 
                        sure the information you have provided is accurate and 
                        you are represented well in our database.You can press 
                        the back button to go back and make some changes.&nbsp;</TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
            </TR>
            <TR> 
              <TD height=18></TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp; </p>
        <TABLE width=157 height="66" border=0>
          <TBODY>
            <TR id=form_headers> 
              <TD align=middle height=15>Truth</TD>
            </TR>
            <TR> 
              <TD height=28 bgcolor="#CCCCCC" id=form_headers>Your personal information 
                will only be used to maintain professional business partnership.</TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp;</p>
        <p>&nbsp; </p>
      </TD>
      <TD align=left> <TABLE height=500 width=615 border=0>
          <TBODY>
            <TR> 
              <TD vAlign=top> <table width="85%" align="center" bgcolor="#FFFFFF" style="border-width:1;border-style:dashed; border-color:#cccccc">
                  <tr bgcolor="#FFFFFF"> 
                    <td height="51" colspan="3"><div align="left">
                       <font size="4"><strong>Registration confirmation</strong></font><br>
                        <hr>
                      </div></td>
                  </tr>
                  <tr> 
                    <td width="34%" bgcolor="#FFFFFF" id="main_content"><div align="left">your 
                        referrer's fullname is:</div></td>
                    <td width="49%" bgcolor="#FFFFFF"><?php echo $_SESSION['fullname']?></td>
                    <td width="17%" rowspan="24" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td height="25" bgcolor="#FFFFFF" id="main_content"><div align="left">your 
                        referrer id:</div></td>
                    <td bgcolor="#FFFFFF"><?php echo $_SESSION['referrer']?></td>
                  </tr>
                  <tr> 
                    <td height="23" bgcolor="#FFFFFF" id="main_content"><div align="left">first 
                        name:</div></td>
                    <td height="23" bgcolor="#FFFFFF"><?php echo $_SESSION['first_name'] ?></td>
                  </tr>
				  <?php
				  if(isset($_SESSION['middle_name']))
				   {
				   ?>
                  <tr> 
                    <td height="23" bgcolor="#FFFFFF" id="main_content"><div align="left">middle 
                        name:</div></td>
                    <td height="23" bgcolor="#FFFFFF"><?php echo $_SESSION['middle_name'] ?></td>
                  </tr>
				  <?php
				  }
				  ?>
				  <?php
				  if(isset($_SESSION['last_name']))
				   {
				   ?>
                  <tr> 
                    <td height="24" bgcolor="#FFFFFF" id="main_content"><div align="left">last 
                        name:</div></td>
                    <td height="24" bgcolor="#FFFFFF"><?php echo $_SESSION['last_name'] ?></td>
                  </tr>
				   <?php
				  }
				  ?>
				  
				   <?php
				  if(isset($_SESSION['birth_date']))
				   {
				   ?>
                  <tr> 
                    <td height="10" bgcolor="#FFFFFF" id="main_content"><div align="left">birth 
                        date:</div></td>
                    <td height="10" bgcolor="#FFFFFF"><?php echo $_SESSION['birth_date'] ?></td>
                  </tr>
				   
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">month:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['birth_month'] ?></td>
                  </tr>
                  <tr> 
                    <td height="23" bgcolor="#FFFFFF" id="main_content"><div align="left">year:</div></td>
                    <td height="23" bgcolor="#FFFFFF"><?php echo $_SESSION['birth_year'] ?></td>
                  </tr>
				   <?php
				  }
				  ?>
				  
				    <?php
				  if(isset($_SESSION['gender']))
				   {
				   ?>
                  <tr> 
                    <td height="23" bgcolor="#FFFFFF" id="main_content"><div align="left">gender:</div></td>
                    <td height="23" bgcolor="#FFFFFF"><?php echo $_SESSION['gender'] ?></td>
                  </tr>
				   <?php
				  }
				  ?>
				  
				   <?php
				  if(isset($_SESSION['nationality']))
				   {
				   ?>
				  
                  <tr> 
                    <td height="23" bgcolor="#FFFFFF" id="main_content"><div align="left">nationality:</div></td>
                    <td height="23" bgcolor="#FFFFFF"><?php echo $_SESSION['nationality'] ?></td>
                  </tr>
                    <?php
				  }
				  ?>
				  
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">id 
                        number:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['id_number'] ?></td>
                  </tr>
				  
				    <?php
				  if(isset($_SESSION['benificiary_name'] ))
				   {
				   ?>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">benificiary 
                        name:</div></td>
                    <td height="22" bgcolor="#FFFFFF" ><?php echo $_SESSION['benificiary_name'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">relationship:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['relationship'] ?></td>
                  </tr>
				   <?php
				  }
				  ?>
				  
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">country:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['country'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">town:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['town_or_city'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">state:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['state_or_province'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">address:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['address1'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">p.o.box:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['pobox'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">home 
                        phone number:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['home_phone_number'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">office 
                        phone number:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['office_phone_number'] ?></td>
                  </tr>
                  <tr> 
                    <td height="10" bgcolor="#FFFFFF" id="main_content"><div align="left">mobile 
                        phone number:</div></td>
                    <td height="10" bgcolor="#FFFFFF"><?php echo $_SESSION['mobile_phone_number'] ?></td>
                  </tr>
                  <tr> 
                    <td height="10" bgcolor="#FFFFFF" id="main_content"><div align="left">Your 
                        Bank account: </div></td>
                    <td height="10" bgcolor="#FFFFFF"><?php echo $_SESSION['bank_account'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22" bgcolor="#FFFFFF" id="main_content"><div align="left">email:</div></td>
                    <td height="22" bgcolor="#FFFFFF"><?php echo $_SESSION['email'] ?></td>
                  </tr>
                  <tr> 
                    <td height="22">&nbsp;</td>
                    <td height="22" colspan="2"><form name="form1" method="post" action="registration_confirmation.php">
                        <p> 
                          <input name="submit" type="submit" value="its right">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                          <input type="submit" name="submit" value="back">
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                          <input type="submit" name="submit" value="cancel">
                        </p>
                      </form></td>
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
