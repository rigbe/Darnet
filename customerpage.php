<?php
session_start(); 
require_once("dbinterface/dbhandler.php");
require_once("classes/customer.php");
require_once("dbinterface/dbinterface.php");

	if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

 else
  {
  $customer_id=$_SESSION['customer_id'];   ///this variable has the prefix attached yet
  $c=new customer();
  $customer=$c->getcustomer($customer_id);
  $customer_address=$c->getcustomeraddress($customer_id);
  }
  //	$id=customerid_numonly($customer_id);
 	$query="SELECT * FROM orders WHERE customer_id=$customer_id AND amount_due <=0 AND delivery_status=0";
 	$query=mysql_query($query);
 if(mysql_num_rows($query)!=0)
 	{
 	$delivery_info=1;
 	}
	$_SESSION['fullname']=$customer['first_name']." ".$customer['middle_name']." ".$customer['last_name'];
	//$q="SELECT * FROM customerstatus WHERE customer_id=$id";
	//$q=mysql_query($q);
	//$qrow=mysql_fetch_array($q);
?>


<html>
<head>
<title>Welcome,<?php echo  $customer['salutation']." ". $customer['first_name']; ?></title>
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
              <td><table id=link_titles cellspacing=0 cellpadding=0 width="100%" 
            align=left border=0>
                  <tbody>
                    <tr align=left> 
                      <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''">&nbsp;&nbsp;&nbsp;<a href="change_password.php">&nbsp;Change 
                        Password</a></td>
                    </tr>
                    <tr align=left> 
                      <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''">&nbsp;&nbsp;&nbsp;&nbsp;<a 
                  href="change_personal_info.php">Change My Address</a></td>
                    </tr>
                    <tr align=left> 
                      <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''">&nbsp; </td>
                    </tr>
                  </tbody>
                </table></td>
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
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="downlines.php" target="_blank">&nbsp;&nbsp;List 
                        All downlines</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;<a href="r_downlines.php" target="_blank">&nbsp;Right 
                        downlines</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="l_downlines.php" target="_blank">&nbsp;&nbsp;Left 
                        downlines</a></TD>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
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
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;<a href="weekly_commision.php" target="_blank">&nbsp;&nbsp;Commission 
                        this week</a></TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;</TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;&nbsp;&nbsp;&nbsp;</TD>
                    
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">&nbsp;</TD>
                    </TR>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
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
      <TD align=left><table width="614" height="831" border="0" cellpadding="5" cellspacing="4">
          <tr> 
            <td height="24" colspan="2"><div align="right"><?php echo date("F,j/Y"); ?></div></td>
          </tr>
          <tr id=form_headers> 
            <td height="23"> <div align="left"><a style="COLOR: #0c4c4c" href="logout.php"><strong>Log 
                Out </strong></a>here<br>
              </div></td>
			  <?php
			  if($qrow['status']==0)
			  {
			  ?>
            <td height="23"><div align="right"><a href="shopnow.php">shopnow</a></div></td>
			<?php
			}
			?>
          </tr>
          <tr>
            <td height="10" colspan="2"><div align="center">
              </div>
              <hr width="50%"></td>
          </tr>
          <tr> 
            <td width="259" height="145"><fieldset>
              <legend>Referrer Information</legend>
              <table width="100%" height="74" border="0">
                <tr> 
                  <td width="50%" height="34"><div align="right">Your Referrer:</div></td>
                  <td width="50%"><b><?php echo $customer['referer_id']; ?></b>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="34"><div align="right">Placement Id:</div></td>
                  <td><b><?php echo $customer['parent_id']; ?></b>&nbsp;</td>
                </tr>
              </table>
              </fieldset></td>
            <td width="323"><div align="right"> 
                <p align="center"><em><font size="3"><?php echo SYSTEM_NAME;?></font><font color="#990000" size="3" face="Times New Roman, Times, serif"> 
                  Virtual Office desk</font></em></p>
                <p><em></em></p>
              </div></td>
          </tr>
          <tr> 
            <td height="166">&nbsp;</td>
            <td><fieldset>
              <legend>Fast Update</legend>
              <table width="90%" height="93" border="0">
                <tr bgcolor="#FFFFFF"> 
                  <td height="22" colspan="2"><div align="center"><font color="#990000"><em><strong>Number 
                      of downlines</strong></em></font></div></td>
                </tr>
                <tr> 
                  <td width="70%" bgcolor="#FFFFFF" id=main_content>-&gt;Number 
                    of RIGHT downlines:</td>
                  <td width="30%" bgcolor="#CCCCCC"><?php echo $c->calculate_allrightdownlines($customer['right_descendant_id']); ?></td>
                </tr>
                <tr> 
                  <td bgcolor="#FFFFFF" id=main_content>-&gt;Number of LEFT downlines:</td>
                  <td bgcolor="#CCCCCC"><?php echo $c->calculate_allleftdownlines($customer['left_descendant_id']); ?></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF" id=main_content>-&gt;Number of TOTAL downlines:</td>
                  <td bgcolor="#CCCCCC"><?php echo $c->Number_of_downlines($customer_id); ?></td>
                </tr>
              </table>
              <p>&nbsp;</p></fieldset>
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
