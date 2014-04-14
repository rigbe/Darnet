
<?php
//################################  first page for administrators ###############################
require_once("../dbinterface/dbhandler.php");


?>
<title>Manager Login</title>
<body background="../page_bg.jpg">
<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
  <tr> 
    <td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Manager Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
  </tr>
</table>

<p>&nbsp;</p>
<table width="40%" height="262" border="0" align="center" cellpadding="6" cellspacing="8"  >
  <!--DWLayoutTable-->
  <tr> 
    <td valign="top" class="vertical"> <form action="managerchecker.php" method="post" name="adminlogin" id="adminchecker.php">
        <table width="89%" height="172" border="0" cellpadding="4" cellspacing="4" bordercolor="#CCCCCC" bgcolor="#CCCCCC">
          <tr bgcolor="#495e83"> 
            <td height="26" colspan="4"><font color="#FFFFFF">Manager Login</font></td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td width="28%" height="30">Username:</td>
            <td colspan="3"><input name="adminid" type="text" id="adminid"></td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td height="30">Password:</td>
            <td colspan="3"><input name="adminpass" type="password" id="adminpass"></td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td height="28" colspan="4"><hr align="center"></td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td height="32" colspan="2">&nbsp;</td>
            <td width="45%"><input name="submit" type="submit" id="submit" value="Log In"></td>
            <td width="19%">&nbsp;</td>
          </tr>
        </table>
        <table width="89%" border="0">
          <tr> 
            <td height="23"> 
              <?php $ermsg=$_REQUEST['ermsg'];echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>';?>
              &nbsp;</td>
          </tr>
        </table>
      </form></td>
  </tr>
  <tr>
    <td height="27" valign="top" class="vertical"><div align="left"><font color="#000099" size="2">Powered 
        by DarNet</font></div></td>
  </tr>
</table>
</body>