<?php
session_start(); 

require_once("../dbinterface/dbhandler.php");
require_once("../classes/manager.php");
require_once("../classes/report.php");
//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		require_once("../configconstants/file_functions.php");
		require_once("../configconstants/constants.php");
/*
		if(SHOP_DONE == 1)
		 {  
		  //echo REG_DONE; 
		 header ("Location: add_products.php");  //////////    sends error message to index.php of administrators 
		 }
*/

		$man=new manager();
	    $rep=new report();
					     
		
        $msg=$_GET['msg'];
  
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		
		  
		  ?>
		  <title>Admin Panel</title>
			<body background="../page_bg.jpg">
			<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
			  <tr> 
				<td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Administration Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
			  </tr>
			</table>
			
		
<br><table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><font color="#990000" size="4">Welcome Administrator</font></div></td>
  </tr>
</table>
<br>
<table width="75%" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left"><strong><font color="#000099"><em>Admin 
        Panel </em></font></strong></div></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr> 
    <td width="29%" height="680"><table width="112%" height="91" border="0">
        <tr> 
          <td><a href="custom_reg.php">Registration Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_shop.php">Shopping Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_report.php">Report Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_banner.php">Banner Management</a></td>
        </tr>
        <tr> 
          <td><a href="change_password.php">Change Password</a></td>
        </tr>
        <tr> 
          <td><a href="adminlogout.php">Log Out</a></td>
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
      <legend><em><font color="#000066" size="4">Report Customization:Report for 
      Manager</font></em></legend>
      <form action="save_reports.php" method="post" name="customize_report" id="customize_report">
        <table width="100%" height="167" >
          <tr> 
            <td height="42" colspan="2"><div align="left"><font color="#990000">Please 
                choose reports that manager <?php echo $man->get_username('manager');?> 
                can see:</font><br>
              </div></td>
          </tr>
          <tr> 
            <td height="26" colspan="2"><span>Reports:</span> </td>
          </tr>
		 <tr> 
            <td height="11" colspan="2"> <p>
			    <?php
				$r=$rep->get_all_reports() ;
				while($row=mysql_fetch_array($r))
				    {
					?> 
                <input type="checkbox" name="<?php echo $row['rid']; ?>" value="checkbox">
                <?php echo $row['report_name']; ?><br>
				   <?php
				   }
				   
				   ?>
               </p>
             </td>
          </tr> 
          <tr> 
            <td width="44%" height="26">&nbsp;</td>
            <td width="56%"><input type="submit" name="Submit" value="Submit"></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      </fieldset></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td width="71%">&nbsp;</td>
  </tr>
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



