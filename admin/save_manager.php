<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");
include("../classes/manager.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");


require_once("../dbinterface/dbinterface.php");
require_once("../classes/product.php");


if(MAN_DONE == 1)
 {  
  //echo REG_DONE; 
 header ("Location: index.php?ermsg=You have already created a Manager!");  //////////    sends error message to index.php of administrators 
 }

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		
				if(isset($_POST['Submit']))
				   {
				        $username=$_POST['man_username'];
						$type="manager";
	                    $act=new dbinterface();
						   if(!empty($_POST['man_password']))
							   $new_pass=$_POST['man_password'];
								else
								 {
								   $new_pass=$_SESSION['password'];
								   $_POST['new_pass2']=$_SESSION['password'];
								   }
							  
							  
							
							if($new_pass==$_POST['man_password2'])
							 {
							 
							  $query_acc="INSERT INTO userverify(`userid`,`password`,`type`) VALUES ('$username','$new_pass','$type')";
							  if($act->perform_query($query_acc))
								{
								   write_to_file('constants.php',MAN_DONE,true);
			                       header("Location:report_chooser.php");
								}
							  else
								  header("Location:custom_report.php?msg=The changes could not be made,Please try again");
							 
							 } 
							 
							else
							   header("Location:custom_report.php?msg=The passwords You entered are not the same,Confirm your password again");
			  
					}      //////   the submit if is over
	

      }
		
		
		
		
		  
		  
	
	
	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	



		///////////////////////////           FUNCTIONS.........................
		
		
		
		
		
		/////////////    this diplays ecards that  have been generated 


?>



