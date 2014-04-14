<?php
session_start(); 

require_once("../dbinterface/dbhandler.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		require_once("../dbinterface/dbhandler.php");
		if(isset($_POST['Submit']))
		   {
		 
		    $uploaddir = "../images/";
			$filename = trim($_FILES['upfile']['name']);
			$filename = substr($filename, -20);
			$filename = ereg_replace(" ", "", $filename);
			if((ereg(".jpg", $filename)) || (ereg(".gif", $filename))) {
			$filename=substr_replace($filename,SYSTEM_NAME,0,strpos($filename,'.')); // replacing the file name by system name  
			$uploadfile = $uploaddir . $filename;
			//echo $_FILES['upfile']['tmp_name'];
			//echo $uploadfile;
			$todelete=$uploadfile;
			if(file_exists($todelete))
			   unlink($todelete); // deletes the banner image file if it already exists
			   
			    if(move_uploaded_file($_FILES['upfile']['tmp_name'],$uploadfile)) {
							chmod($uploadfile, 0644);
							write_to_file('constants.php',SYS_BANNER,$filename);
							//unlink($uploadfile);
							 //echo $filename;
							header("Location:banner.php");
								} 
							else {
							$msg="File upload failed, you already have a banner !";
							}
				} 
				else {
				$msg="Only images are allowed, upload failed";
				}
		   
            }
  
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		
		  
		  ?>
		  <title>Upload Banner file</title>
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
      <legend><em><font color="#000066" size="4">System Banner Upload</font></em></legend>
	  <?php
			if (@$msg <> "") {
		?>
	    <p><span class="ewmsg"><font color="#990033"><?php echo $msg; ?></font></span></p>
	     <?php
			$msg= ""; // Clear message
		 }

	  
	  
	  
	  
	  
	  ?>
      <form enctype="multipart/form-data" action="custom_banner.php" method="post" name="upload" >
        <table width="100%" height="173" >
          <tr> 
            <td height="50" colspan="2"><div align="left"><strong>Please Upload 
                a JPEG or JIF image that will be used as your system banner.</strong><em><font color="#990000" size="2">For 
                better results upload an image that is 600 x 100 px.</font></em></div></td>
          </tr>
          <tr> 
            <td height="11" colspan="2"> <p align="center">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <em><font color="#000000" size="2">Max allowed size is 1MB</font>.</em></p>
            </td>
          </tr>
          <tr> 
            <td width="29%" height="11">Select Your Image: </td>
            <td width="71%"><input name="upfile" type="file">
              </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Upload"></td>
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



