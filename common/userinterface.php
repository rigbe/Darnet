

<?php
/////////////////////                                           INTERFACE FUNCTIONS COMMON TO EVERY PAGE///////////////////////
//////////////////////////////////             HEADER AND FOOTER

////////////////////////////////
function webfooter()
{
?>
<TABLE cellSpacing=0 cellPadding=0 width="82%" align="center" bgcolor="#495e83">
          <TBODY>
            <TR align=left height=15> 
              <TD>&nbsp;</TD>
              <TD align=right><SPAN 
            style="FONT-SIZE: 12px; COLOR: #ffffff">Copyright © 2007.&nbsp;&nbsp;www.ahha.com&nbsp;&nbsp;All 
                Rights Reserved</SPAN> </TD>
            </TR>
          </TBODY>
        </TABLE>
		
		</body>
        </html>

<?
}
/////////////////////////////////////////////////
/////////////////////////////                                    header                 

function webheader()
{
include("counter.php");
///////there is an animation in the function
?>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		
		<link href="common/ahha_css.css" rel="stylesheet" type="text/css"></head>
		<body>
<table width="78%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr> 
    <td width="305" height="26" bgcolor="#495e83"></td>
    <td width="406" height="26" bgcolor="#495e83"></td>
    <td width="2"></td>
  </tr>
  <tr> 
    <td height="100" align="left" valign="middle" bgcolor="#495e83"><img src="images/ahhaglobal.jpg" width="257" height="96"> 
    <td bgcolor="#495e83"></td>
  </tr>
  <tr> 
    <td height="32" valign="middle" bgcolor="#CCCCCC" id=form_headers> <p><a style="COLOR: #0c4c4c" href="index.php" target="_self" class="links"> 
        &nbsp; </a></p>
      </td>
    <td bgcolor="#CCCCCC" id=form_headers><!--DWLayoutEmptyCell-->&nbsp; </td>
    <td></td>
  </tr>
</table>
<?
}

///////////////////////


?>
