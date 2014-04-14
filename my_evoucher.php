<?
session_start(); 
include("databasemanagement/dbhandler.php");
	if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

 else
  {
  include("customerhandler.php");
  $customer_id=$_SESSION['customer_id'];   ///this variable has the prefix attached yet
  $customer_evoucher=getevoucher($customer_id);
  $customer=getcustomer($customer_id);
  }
?>


<html>
<head>
<title>Welcome,<? echo  $customer['salutation']." ". $customer['first_name']; ?></title>
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
      <TD width="11%"></TD>
      <TD width="89%"></TD>
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
      <TD width="11%" align=middle vAlign=top bgcolor="#FFFFFF"> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></TD>
      <TD align=left><table width="614" height="403" border="0" cellpadding="5" cellspacing="4">
          <tr> 
            <td height="24" colspan="2"><div align="right"><? echo date("F,j/Y"); ?></div></td>
          </tr>
          <tr id=form_headers> 
            <td height="10" colspan="2"> <div align="left"><a style="COLOR: #0c4c4c" href="logout.php"><strong>Log 
                Out </strong></a>here<br>
              </div></td>
          </tr>
          <tr> 
            <td height="10" colspan="2"><div align="center"><font size="+1"><? echo $customer['salutation']." ".$customer['first_name']." ".$customer['middle_name']." ".$customer['last_name'];  ?></font> 
              </div>
              <hr width="50%"></td>
          </tr>
          <tr> 
            <td height="30" colspan="2"><div align="center"><em><strong><font color="#990000">E-voucher 
                Summary</font></strong></em></div></td>
          </tr>
          <tr> 
            <td height="152" id="main_content"><fieldset>
              <font size="3">You have <? echo  $customer_evoucher['number_evoucher']; ?> 
              E-vouchers </font> 
              </fieldset>
              </td>
            <td width="332"> 
              <?
	  if($customer_evoucher['number_evoucher'] > 0)
	       {
		   //echo $customer_evoucher['number_evoucher'];
		//$numof_spendable_evouchers=floor($customer_evoucher['number_evoucher']/4);
		//$money_value=$numof_spendable_evouchers*300; /////////////   if the commision is 300 for 3/3
		$_SESSION['numberevoucher']=$customer_evoucher['number_evoucher'];
		//$evoucher=$_SESSION['numberevoucher'];
		//echo $evoucher;
		//$_SESSION['money_value']=$money_value;
		 ?>
              <table width="100%" height="103" style="border:1 dotted cccccc">
                <tr bgcolor="#CCCCCC"> 
                  <td height="27" id="main_content">Click on the shopnow link 
                    to use your evoucher. </td>
                </tr>
                <tr> 
                  <td height="47"><div align="left"><font color="#990000">Please 
                      <a href="shopwithevoucher.php">shopnow</a></font></div></td>
                </tr>
                <tr> 
                  <td height="21">&nbsp;</td>
                </tr>
              </table>
              <?
           }
           ?>
              &nbsp; </td>
          </tr>
          <tr> 
            <td height="87" colspan="2">&nbsp;</td>
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
