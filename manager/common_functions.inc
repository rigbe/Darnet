<?php

//////////////##############  this are common function to be used by all

				function weekbenchmark()
				{
				
				 $today = getdate();
			   	$day=$today["weekday"];
					  switch($day)
						 {
						  case 'Monday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-0,date("Y"));
						   break;
						  case 'Tuesday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-1,date("Y"));
						   break;
						  case 'Wednesday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-2,date("Y"));
						   break;
						  case 'Thursday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-3,date("Y"));
						   
						   break;
						  case 'Friday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-4,date("Y"));
						   break;
						  case 'Saturday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-5,date("Y"));
						   break;
						  case 'Sunday':
						   $monday_thisweek= mktime(0,0,0,date("m"),date("j")-6,date("Y"));
						   break;
						} // switch is over
					  
							   $week_benchmark=date("Y-m-d", $monday_thisweek);
							   return $week_benchmark;
							   ////////////   the bench mark is the day when every week paymnet report should be generated ...this time it is alway monday. If 
							   ///////////    we ask for the report say on thursday....we will get the report of last week the bench mark being near last monday				
                      ////////////   the moday has been identified
					  }
								  






?>