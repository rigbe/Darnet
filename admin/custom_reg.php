<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");


//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		require_once("../configconstants/file_functions.php");
		require_once("../configconstants/constants.php");

		if(REG_DONE == 1)
		 {  
		  //echo REG_DONE; 
		 header ("Location: adminpanel.php?ermsg=You have already customized registration.");  //////////    sends error message to index.php of administrators 
		 }
	

  
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
    <td width="29%"><table width="112%" height="91" border="0">
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
      <p>&nbsp;</p></td>
    <td width="71%" rowspan="2"><fieldset>
      <legend><em><font color="#000066" size="4">Registration Customization</font></em></legend>
      <form action="reg_saver.php" name="customize_reg" method="post">
        <table width="100%" height="163" >
          <tr> 
            <td height="23" colspan="2"><div align="left"><strong>Customer Parameters</strong> 
                : Customer information you need during registration.</div></td>
          </tr>
          <tr> 
            <td height="11" colspan="2"> <p> 
                <input type="checkbox" name="mname" value="checkbox">
                Middle Name<br>
                <input type="checkbox" name="lname" value="checkbox">
                Last Name<br>
                <input type="checkbox" name="birthdate" value="checkbox">
                Birth Date<br>
                <input type="checkbox" name="gender" value="checkbox">
                Gender<br>
                <input type="checkbox" name="nationality" value="checkbox">
                Nationality<br>
                <input type="checkbox" name="occupation" value="checkbox">
                Occupation<br>
                <input type="checkbox" name="benname" value="checkbox">
                Beneficiary Name<br>
                <input type="checkbox" name="benrel" value="checkbox">
                Beneficiary Relation<br>
                <input type="checkbox" name="salutation" value="checkbox">
                Salutation (title, e.g Ato)</p>
              <p><br>
              </p></td>
          </tr>
          <tr> 
            <td width="30%" height="11"><strong>Registration Fee</strong>: </td>
            <td width="70%"><input name="regfee" type="text" id="regfee" value="0">
              Birr. </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Save"></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      </fieldset></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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



