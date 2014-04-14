<?php
session_start(); 
include_once("dbinterface/dbhandler.php");

//include("customerhandler.php");
/////////////*************************               assigment of http post variables to local vars
$customer_id=$_POST['customer_id'];
$password=$_POST['password'];
/////////////////////check who the user is     and call the appropriate page
//////////////////    this function should be in the customerhandler.php file.............


 function verify_customer($customer_id,$password)
					{
					 $q="SELECT customer_id from customer_account WHERE (customer_id=$customer_id AND password=$password)";
					 //$e=$act->perform_query($q);
					 $result=mysql_query($q) or die("customer couldn't be Identified");
					 if (mysql_num_rows($result) >= 1 ) 
					   return mysql_fetch_array($result);
					 else
					   return false;  
					
					}
					
					
//########################### LOGGING IN ##################################					
					
$customer=verify_customer($customer_id,$password);

///////////////   the customer is session registered once the customer is verified
	if ($customer) 
		{
		$customer_id=$customer['customer_id'];
		$_SESSION['customer_id']=$customer_id;
		header ("Location: customerpage.php");
        exit;
		 }
   else  
   {
     //echo $row['type'];
     header ("Location: signin.php?ermsg=Sorry, wrong ID and /or Password.Try again !");
		
		/*if (isset($_SESSION['db_is_logged_in']))
		{
			unset($_SESSION['db_is_logged_in']);
			setcookie('user','');
			
			header("Location: adminCheck.php?ermsg=Please login first");*/
		
	}

/////////////////////////////         user has been identified




?>