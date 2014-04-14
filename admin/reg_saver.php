<?php
session_start(); 
//################################  first page for administrators ###############################
require_once("../classes/customer.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");
require_once("../dbinterface/dbhandler.php");
require_once("../dbinterface/dbinterface.php");

if(REG_DONE == 1)
 {  
  //echo REG_DONE; 
 header ("Location: index.php?ermsg=You have already customized registration!");  //////////    sends error message to index.php of administrators 
 }
 
if(session_is_registered("properuser"))
        {
	$fields=array();
	if(!isset($_POST['mname']))		
  		array_push($fields,"middle_name");
	if(!isset($_POST['lname']))
    	array_push($fields,"last_name");
	if(!isset($_POST['birthdate']))	
  		array_push($fields,"birth_date");
	if(!isset($_POST['gender']))
  		array_push($fields,"gender");
	if(!isset($_POST['nationality']))
  		array_push($fields,"nationality");
	if(!isset($_POST['occupation']))
  		array_push($fields,"occupation");
	if(!isset($_POST['benname']))
	{
  		array_push($fields,"benificiary_name");  
		array_push($fields,"benificiary_relationship");
	}
	/*
	if(!isset($_POST['benrel']))
			array_push($fields,"benificiary_relationship");*/
			
	if(!isset($_POST['salutation']))
  		array_push($fields,"salutation");
  $regfee=$_POST['regfee'];
  //$regfee="registration fee is:".$regfee;    
		
  		$c1=new customer();
        $result=$c1->deletecustomer_parameter($fields);
		//create_file('constants.php');
		write_to_file('constants.php',REG_FEE,$regfee);
		write_to_file('constants.php',REG_DONE,true);
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		//if($result)
		//echo "rigbe";
		//else
		//echo "dawit";
		  
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
<table width="75%" height="415" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left">Admin Panel </div></td>
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
      <p>&nbsp;</p></td>
    <td colspan="3" rowspan="2"> 
    <td width="71%" height="128"> <table width="100%" height="88" >
        <tr> 
          <td height="21"><div align="left"><font color="#990000">Registration 
              successfully customized!</font></div></td>
        </tr>
        <tr> 
          <td>you have successfully customized registration. your changes have 
            been saved. once you have customized a process you will not be able 
            to make more changes. </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p> 
  <tr> 
    <td width="29%" height="128">&nbsp;</td>
    <td> <p>&nbsp;</p>
      <p>&nbsp;</p> 
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



