<?php
session_start(); 
include("../classes/manager.php");
/////////////*************************               assigment of http post variables to local vars
$userid=$HTTP_POST_VARS['adminid'];
$password=$HTTP_POST_VARS['adminpass'];
$mgr= new manager();
/////////////////////check if the admin exists
$result=$mgr->check_admin($userid,$password);

	if (mysql_num_rows($result) >= 1 ) 
		{
		  $row=mysql_fetch_array($result);
		  $usertype=$row['type'];
		  $properuser=$row['userid']; 
		  $_SESSION['properuser']=$properuser;                       ////////      session variable
		  session_register("properuser");
		  //$_SESSION['account_type']=admin;
		  //$_SESSION['password']=$password;
		                                       /////////   registering a session variable...the user id
			    header("Location: adminpanel.php");
			
		  exit;	
		}
		
		
   else  
       {
     //echo $row['type'];
     header ("Location: index.php?ermsg=Sorry, wrong username and /or password");
		
		
		
     	}






?>


