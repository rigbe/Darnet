<?php


require_once("../dbinterface/dbinterface.php");


 class report
         {
      

				var $report_id;
				var $report_name;
				var $type;

				
	  
	  
////////////////////////////////   FINISSH THE CHANGE PASSWORD FUNCTION WHEN SESSIONS ARE DONE   //////////////////////

				function set_type($rid,$manager)
				{
				 $act = new dbinterface();
				$q="UPDATE report set type='$manager' where rid='$rid'";
				if($t=$act->perform_query($q))
				return 1;
				else 
				return 0;
				
				}

//**************checks the eligibility of a user*******************


                function get_all_reports()
				 {
				    $act = new dbinterface();
					$getuser="SELECT * from report";
		
					if($t = $act->perform_query($getuser))
				      return $t; 
				 } 
				 
				 
				function get_report_by_type($type)
				  {
				  	$act = new dbinterface();
					$getuser="SELECT * from report where type='$type'";
		
					if($t = $act->perform_query($getuser))
				      return $t; 

				  
				  
				  } 



       }

?>