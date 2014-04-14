<?php


require_once("../dbinterface/dbinterface.php");
require_once("report.php");

 class manager
         {
      

				var $userid;
				var $password;
				var $type;

				
	  
	  
////////////////////////////////   FINISSH THE CHANGE PASSWORD FUNCTION WHEN SESSIONS ARE DONE   //////////////////////

				function changepassword($newpass,$id)
				{
				$opass=$this->getpassword();
				$q="UPDATE userverify set password='$newpass' where userid='$id'";
				if($t=$act->perform_query($q))
				return 1;
				else 
				return 0;
				
				}

//**************checks the eligibility of a user*******************


                function check_admin($userid,$password)
				 {
				    $act = new dbinterface();
					$getuser="SELECT * from userverify WHERE (userid='$userid' And password='$password') And type='admin' ";
		
					if($t = $act->perform_query($getuser))
				      return $t; 
				 } 
				////////////////////////////////////// 
			   function check_manager($userid,$password)
				 {
				    $act = new dbinterface();
					$getuser="SELECT * from userverify WHERE (userid='$userid' And password='$password') And type='manager' ";
		
					if($t = $act->perform_query($getuser))
				      return $t; 
				 } 

			
				 
			function get_username($type)
				 {
				    $act = new dbinterface();
					$getuser="SELECT userid from userverify WHERE type='$type' ";
					$username=0;
					if($t = $act->perform_query($getuser))
					   {
					     $username=mysql_fetch_array($t);
						 $username=$username['userid'];
						} 
				      return $username; 
				 } 

           //////////////////////////////
		   
		    function get_myreports($type)
			  {
				$rep=new report();
				if($r=$rep->get_report_by_type($type))
				 return $r;
		     }		 
				
			  


				function adduser($userid,$password,$privilege)
				  {
					
						 $q="INSERT into account values('$userid','$password','$privilege')";
						  if(mysql_query($q)) 
							 return 1;
						  else 
							
							return 0;
				}


       }

?>