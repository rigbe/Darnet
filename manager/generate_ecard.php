<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");
require_once("../classes/manager.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser") )
        {
		$man=new manager();
		$reports=$man->get_myreports('manager');// manager type is hard coded	
  
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		
		  
		  ?>
		  <title>Admin Panel</title>
			<body background="../page_bg.jpg">
			<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
			  <tr> 
				<td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Manager Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
			  </tr>
			</table>
			
		
<br><table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><font color="#990000" size="4">Welcome, <?php echo $_SESSION['properuser'];?> 
        !</font></div></td>
  </tr>
</table>
<br>
<table width="75%" height="80" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left"><strong><font color="#000099" size="4"><em>Manager 
        Panel </em></font></strong></div></td>
    <td height="21">&nbsp;&nbsp;</td>
  </tr>
  <tr> 
    <td width="29%" height="494"><table width="112%" height="91" border="0">
        <tr> 
          <td><font color="#330000"><strong><em>Reports</em></strong></font></td>
        </tr>

        <?php 
		while($row=mysql_fetch_array($reports))
		 {
		 $link_file=$row['report_name'].".php";
		 $filename = ereg_replace(" ", "_", $link_file);

		 ?>
        <tr> 
          <td><a href="<?php echo $filename; ?>"><?php echo $row['report_name']; ?></a></td>
        </tr>
		<?php
		}
		?>
		<tr> 
          <td><hr align="left" width="50%" color="#CC0066"></td>
        </tr>

		<tr> 
          <td><font color="#330000"><strong><em>Options</em></strong></font></td>
        </tr>

		<tr> 
          <td><a href="com_amt.php">Commission Amount</a></td>
        </tr>
		<tr> 
          <td><a href="generate_ecard.php">Ecard Generation</a></td>
        </tr>
		<tr> 
          <td><a href="change_account.php">Modify Account</a></td>
        </tr>

		 <tr> 
          <td><a href="managerlogout.php">Log Out</a></td>
        </tr>

      </table>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="71%"><fieldset>
      <form action="newecarddisplay.php" method="post" name="ecardgenerator" id="ecardgenerator">
        <table width="93%" border="0" cellpadding="4" cellspacing="4">
          <tr bgcolor="#495e83"> 
            <td height="26" colspan="3"><font color="#FFFFFF">E-card Generator</font></td>
          </tr>
          <tr> 
            <td width="41%" height="24">E-card Value</td>
            <td width="42%"><select name="ecardvalue" size="1">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="300">300</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
              </select></td>
            <td width="17%">&nbsp;</td>
          </tr>
          <tr> 
            <td>How many</td>
            <td><input name="txtQuantity" type="text" id="txtQuantity" size="10" maxlength="2"> 
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td height="31">Enter prefix</td>
            <td><select name="txtprefix" id="txtprefix">
                <option value="AW">AW</option>
                <option value="AA">AA</option>
                <option value="BD">BD</option>
                <option value="MK">MK</option>
                <option value="NA">NA</option>
                <option value="GM">GM</option>
                <option value="DL">DL</option>
                <option value="BL">BL</option>
                <option value="HR">HR</option>
                <option value="GN">GN</option>
                <option value="AS">AS</option>
                <option value="DD">DD</option>
              </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td height="28" colspan="3">&nbsp;</td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td height="31" colspan="3"><div align="center"> 
                <input type="submit" name="Submit" value="generate">
              </div></td>
          </tr>
        </table>
      </form>
      </fieldset>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></tr>
</table>
</body>
			
           <?php
				
		
	    }
	
	
	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	



		///////////////////////////           FUNCTIONS.........................
		
		
		
		
		
		/////////////    this diplays ecards that  have been generated 


?>



