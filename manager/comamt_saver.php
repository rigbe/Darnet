<?php

session_start(); 
require_once("../dbinterface/dbinterface.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");
require_once("../dbinterface/dbhandler.php");

if(COMMISSION_AMOUNT > 1)
 {  
  //echo REG_DONE; 
 header ("Location: managerpanel.php?ermsg=You already have a commission amount value!");  
 exit;//////////    sends error message to index.php of administrators 
 }

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
   {
	$act = new dbinterface();
		//for($i=1;$i<=$catnum;$i++)
	$com_amt=$_POST['comamt'];	 
		write_to_file('constants.php',COMMISSION_AMOUNT,$com_amt);
 
     header ("Location: managerpanel.php?ermsg=Commission amount has been set!");  //////////    sends error message to index.php of administrators 
  
  
    }
  
  	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	
















?>