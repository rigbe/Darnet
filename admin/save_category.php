<?php

session_start(); 
require_once("../dbinterface/dbinterface.php");
require_once("../configconstants/file_functions.php");
require_once("../configconstants/constants.php");
require_once("../dbinterface/dbhandler.php");

if(SHOP_DONE == 1)
 {  
  //echo REG_DONE; 
 header ("Location: index.php?ermsg=You have already customized registration!");  //////////    sends error message to index.php of administrators 
 }

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
   {
    $catnum=$_GET['catnum'];
	$act = new dbinterface();
		//for($i=1;$i<=$catnum;$i++)
		foreach($_POST as $key=>$value)
		  {
		     if($value=='')
			   {
			   header("Location:custom_shop.php?ermsg=you have to enter name of every category");
			   exit;
			   }
			   
		    if(strstr($key,'cat'))
			    {
		   //$catname="catname".$i;
		   //$catname=$_POST['catname'];
		  		 $q="INSERT INTO `category` (`cat_name`) VALUES ('$value') ";
				 $act->perform_query($q);	
				}
	      
		 } 
		 
		write_to_file('constants.php',SHOP_DONE,true);
 
          header("Location:add_products.php"); 
  
  
    }
  
  	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	
















?>