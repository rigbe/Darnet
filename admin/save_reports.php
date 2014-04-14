<?php

session_start(); 
require_once("../dbinterface/dbinterface.php");
require_once("../classes/report.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");
require_once("../dbinterface/dbhandler.php");

if(REPORT_DONE == 1)
 {  
  //echo REG_DONE; 
 header ("Location: index.php?ermsg=You have already customized reports!");  //////////    sends error message to index.php of administrators 
 }

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
   {
    //$catnum=$_GET['catnum'];
	$act = new dbinterface();
	$rep = new report();


		//for($i=1;$i<=$catnum;$i++)
		foreach($_POST as $key=>$value)
		  {
		    if($value)
			    {
		   //$catname="catname".$i;
		   //$catname=$_POST['catname'];
				 $rep->set_type($key,'manager');	
				}
	      
		 } 
		 
		write_to_file('constants.php',REPORT_DONE,true);
 
        header("Location:index.php?ermsg=The reports have been assigned right. "); 
  
  
    }
  
  	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	
















?>