<?php


///require_once("order.php");
//include_once("common_functions.inc");



 class commission
         {
      
	  
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
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
								  


 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	  
	  
	  
	 function count_days( $a, $b ){  
  // First we need to break these dates into their constituent parts:   
   $gd_a = getdate( $a );    $gd_b = getdate( $b );    
    // Now recreate these timestamps, based upon noon on each day   
	 // The specific time doesn't matter but it must be the same each day   
	  $a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );    
	  $b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );     
	  // Subtract these two numbers and divide by the number of seconds in a    //  day. Round the result since crossing over a daylight savings time    
	  //  barrier will cause this time to be off by an hour or two.   
	   return round( ( $a_new - $b_new ) / 86400 );
	   
	   } 

	 
	 
	 
	 
	 
//////////     CALCULATE_WEEKLY_FORALL() UPDATES THE LEFT_OVER AND RIGHT_OVER OF EVERY CUSTOMER EVERY MONDAY
/////////////     IT CALLS TWO FUNCTIONS THAT DO A PREORDER TRAVERSAL AND COUNT NEW CUSTOMERS THIS WEEK ON BOTH RIGHT AND LEFT SIDE     	 
	 
     function calculate_weekly_forall()
	  {
			 ///                 traverses the whold tree (the customer table and updates the left over and right over of all customers 
			  //// left_over and right_over attiributes in the customer table indicate the remaining balnce after calculating commision 4 on left and 3on right will result 1 on leftover and 0 on right over after paymnet
	  $query_allcustomers="SELECT * FROM customer";
	  $allcustomers=mysql_query($query_allcustomers) or die(mysql_error());
			 	
				//////////////////   now iterate through every customer record to make the update	  
					while($customer_row=mysql_fetch_array($allcustomers))         ////            it starts from customer id 1
					  {
					   
						//$q="SELECT * FROM customer WHERE customer_id ='".$customer['customer_id']."'";
						//$result=mysql_query($q) or die("could not get the record from our customers");
						//$row=mysql_fetch_array($result);
						
						//$newleft=calculate_newleftdownlines($customer_row['left_descendant_id'],weekbenchmark());
					    //$newright=calculate_newrightdownlines($customer_row['right_descendant_id'],weekbenchmark());
						$newleft=$this->newleft_qualified($customer_row['left_descendant_id'],$this->weekbenchmark());
					    $newright=$this->newright_qualified($customer_row['right_descendant_id'],$this->weekbenchmark());

						 $newleftover=$customer_row['left_over'] + $newleft;   //////// the new left_over value is now found
						 $newrightover=$customer_row['right_over'] + $newright;
						 
						  //updating the each customer row
						  echo  $newleft;
						  echo  $newright;
						  //echo $newleftover;

						$query_update="UPDATE customer SET left_over='$newleftover' , right_over='$newrightover' where customer_id='".$customer_row['customer_id']."'";
						mysql_query($query_update) or die("could not update customer table");
					
					   }
			  
	        }  ///////////////////////////   function is over


								  
///////////////////////    these functions get the number of new customers in this week for a CUSTOMER

			function calculate_newleftdownlines($leftroot,$thismonday)
				  {
				 ///////////       get the number of new customers this week ....   does a preorder traversal
				 $totalcustomers_left;
				   
					if($leftroot!=NULL)
					  {
								$customerid=$leftroot;
								$q="SELECT * FROM customer WHERE customer_id='$customerid'";
								$result=mysql_query($q);////                    gets the recordset
								$row=mysql_fetch_array($result);
								$registrationdate=$row['registration_date'];
										 if($this->count_days(strtotime($thismonday),strtotime($registrationdate)) <= 7)   //////////////////    NOT SURE IF IT IS THE RIGHT LOGIC
											$totalcustomers_left=1;
								
							 //////////////     check to see if the registration date is within a week ago from the bench mark
							$totalcustomers_left+=$this->calculate_newleftdownlines($row['left_descendant_id'],$thismonday);
						   $totalcustomers_left+=$this->calculate_newleftdownlines($row['right_descendant_id'],$thismonday);
						 
						} 
	                 
						return $totalcustomers_left;
						//echo "fuck";

						
				     }
				  
			  
			function calculate_newrightdownlines($rightroot,$thismonday)
				  {
							 ///////////       get the number of new customers this week on the rigth side....   does a preorder traversal
				   $totalcustomers_right=0;
					if($rightroot!=NULL)
					  {
								$customerid=$rightroot;
								$q="SELECT * FROM customer WHERE customer_id='$customerid'";
								$result=mysql_query($q);////                    gets the recordset
								$row=mysql_fetch_array($result);
								$registrationdate=$row['registration_date'];
										 if($this->count_days(strtotime($thismonday),strtotime($registrationdate)) <= 7)   //////////////////    NOT SURE IF IT IS THE RIGHT LOGIC
											 $totalcustomers_right=1;
								
							 //////////////     check to see if the registration date is within a week ago from the bench mark
								$totalcustomers_right+=$this->calculate_newrightdownlines($row['left_descendant_id'],$thismonday);
								$totalcustomers_right+=$this->calculate_newrightdownlines($row['right_descendant_id'],$thismonday);
						}
						
						return $totalcustomers_right;
				  
				  }
     
	 /////////   this function performs actual commision calculation
	 
	 
	 
	 
	 /////i need two functions that can calculate the new left and right downlines in regards to the order date
	 function newleft_qualified($leftroot,$thismonday)
	 {
	           $totalcustomers_left=0;
				   
					if($leftroot!=NULL)
					  {
								$customerid=$leftroot;
								$q="SELECT * FROM customer WHERE customer_id='$customerid'";
								$result=mysql_query($q);////                    gets the recordset
								$row=mysql_fetch_array($result);

								$qo="SELECT * FROM orders WHERE customer_id='$customerid'";
								$resulto=mysql_query($qo);//// gets the recordset
								if($resulto)
								{                  
								$rowo=mysql_fetch_array($resulto);
								$ordersdate=$rowo['date'];
								//echo $ordersdate;
								//echo $thismonday;
								//$what=strtotime($thismonday);
								//$w2=strtotime($ordersdate);
								//if($ordersdate!=' ')
								//{
								$datedifference=$this->count_days(strtotime($thismonday),strtotime($ordersdate));
								//echo $datedifference;
										 if((1<=$datedifference) && ($datedifference<= 7))   //////////////////    NOT SURE IF IT IS THE RIGHT LOGIC
											$totalcustomers_left=1;
								}
							 //////////////     check to see if the registration date is within a week ago from the bench mark
							$totalcustomers_left+=$this->newleft_qualified($row['left_descendant_id'],$thismonday);
						   $totalcustomers_left+=$this->newleft_qualified($row['right_descendant_id'],$thismonday);
						 
						} 
	                 
						return $totalcustomers_left;
						//echo "fuck";

						
				     }
	 
	 
	 
	 
	 
	 function newright_qualified($rightroot,$thismonday)
	 {
	 
	 
	 $totalcustomers_right=0;
					if($rightroot!=NULL)
					  {
								$customerid=$rightroot;
								$q="SELECT * FROM customer WHERE customer_id='$customerid'";
								$result=mysql_query($q);////                    gets the recordset
								$row=mysql_fetch_array($result);

								$qo="SELECT * FROM orders WHERE customer_id='$customerid'";
								$resulto=mysql_query($qo);////                    gets the recordset
								if($resulto)
								{
								$rowo=mysql_fetch_array($resulto);
								$ordersdate=$rowo['date'];
								//if($ordersdate!=' ')
								//{
								$datedifference=$this->count_days(strtotime($thismonday),strtotime($ordersdate));
										 if((1<=$datedifference) && ($datedifference <= 7))   //////////////////    NOT SURE IF IT IS THE RIGHT LOGIC
											 $totalcustomers_right=1;
								}
							 //////////////     check to see if the registration date is within a week ago from the bench mark
								$totalcustomers_right+= $this->newright_qualified($row['left_descendant_id'],$thismonday);
								$totalcustomers_right+= $this->newright_qualified($row['right_descendant_id'],$thismonday);
						}
						
						return $totalcustomers_right;
	 
	 
	 
	 }
	  
	  function calculate_commission()
	       {
		    
			$q="SELECT * FROM customer WHERE ((customer.numberof_rightdirects <> 0) AND (customer.numberof_leftdirects <> 0)) ";
			$allcustomer=@mysql_query($q);// or die("could't connect to database");
			while($customer_row=mysql_fetch_array($allcustomer))
			  {
		     
				$commission_amount=0;  ///                     counts the number of commission for each customer
				//$query="SELECT * FROM customer where customer_id='$i'";
			    //$r=mysql_query($query) or die("could't connect to database");
		  		//$row=mysql_fetch_array($r);
				$leftover=$customer_row['left_over'];
		  		$rightover=$customer_row['right_over'];
				
				$newleftover=$leftover;
				$newrightover=$rightover;
			////////////    we chech if the left and right overs are below 3 if so ....no commision so no change in left over values
			////////////   but in this case we need have new values for both	
				if( ($leftover>=3) && ($rightover >=3) )
				      {
					    $deduction_date=$this->weekbenchmark();
							if($leftover <= $rightover)
							  {
							
								$minimum=$leftover;
								$newleftover=$minimum%3;
								$newrightover=($rightover-$leftover)+$newleftover;
							  }
							 else
							   {
							
								$minimum=$rightover;
								$newrightover=$minimum%3;
								$newleftover=($leftover-$rightover)+$newrightover;
	
							   } 
								$commission_amount=floor($minimum/3);
								$gross=$commission_amount;
								//echo $gross; 
								//echo " ".$commission_amount;
								$gross_amt=$commission_amount*300;
								$commission_amount=$this->check_flushoff($customer_row['customer_id'],$commission_amount);
								//echo $commission_amount;  ////////  flash off is done before evoucher deduction			     	
								$flushoff_amt=($gross-$commission_amount)*300;
								////////////////////////   THE FLASH OFF HAS BEEN DONE#######################
								$evoucher_commissionamt=$commission_amount;/////the amount after flush off is deducted which is the right amount for calculating evoucher and the $evoucher_amt
								//$evoucher_commissionamt=calculate_evoucher($gross, $customer_row['customer_id'],$customer_row['steps']);
								//$evoucher_amt=($gross-$evoucher_commissionamt)*300;

								$commission_amount=$this->calculate_evoucher($commission_amount, $customer_row['customer_id'],$customer_row['steps']);
								$evoucher_amt=($evoucher_commissionamt-$commission_amount)*300;
								$this->insertto_dedtbl_gfe($customer_row['customer_id'],$gross_amt,$flushoff_amt,$evoucher_amt,$deduction_date);
								////// returns the updated $commission_amount 
								/////         here we have to know if the customer has and debts and deduct that.
								//#################################   PRODUCT DEBT DEDECTION
								$customer_id=$customer_row['customer_id'];
								   $query_checkdebt="SELECT `amount_due`,`alternate_payment` FROM orders WHERE customer_id='$customer_id'";
								   
								    $result_debt=mysql_query($query_checkdebt);
									$result=mysql_fetch_array($result_debt);
									$amount_due=$result['amount_due']; 
								    $alternate_payment=$result['alternate_payment'];					

							////////////////////    The while wil be implemented if the user gets to buy more than one product in which case he may have
							/////////////////////  more than one debt		
									/*while($result=mysql_fetch_array($result_debt))
									    { 
										$amount_due=$amount_due+$result['amount_due']; 
										$alternate_payment=$result['alternate_payment'];					
										} 
										*/
										
					if($commission_amount!=-1)
					   {
						$commission_day=$this->weekbenchmark();
					
						 //$commission_birr=300*$commission_amount;    IF MORE THAN ONE PRODUCT IS BOUGHT AND THE DEBT IN THAT CORDANCE	
						 for($i=0;$i<$commission_amount;$i++)
						  {
						  $commission_birr=COMMISSION_AMOUNT;	


						  
							if($amount_due != 0)
							{
									   	if($alternate_payment==1)
											   {
											   $commission_birr=$commission_birr - $amount_due;
											 
												if($commission_birr <= 0)
												  {
												  
												  $new_amtdue=abs($commission_birr);
												  $productdeduction_amt=300;
												  insertto_dedtbl_product($customer_id,$productdeduction_amt,$deduction_date);
												   //echo $new_amtdue;
												   
												  $query_update="UPDATE `orders` SET alternate_payment=0,amount_due='$new_amtdue' WHERE customer_id='$customer_id'";
												  mysql_query($query_update);
												  $amount_due=$new_amtdue;
												  $alternate_payment=0;
												
												  }
												else 
												  {
												     $productdeduction_amt=$amount_due;
													 insertto_dedtbl_product($customer_id,$productdeduction_amt,$deduction_date);
													$query_insertcom="INSERT INTO commission (`customer_id`,`date`,`commission_birr`) VALUES ('".$customer_row['customer_id']."','$commission_day','$commission_birr')";
													 mysql_query($query_insertcom) or die("Problem while writing commision information to database, please try again");
												  $query_update="UPDATE `orders` SET alternate_payment=0,amount_due=0 WHERE customer_id='$customer_id'";
												  mysql_query($query_update);
												  $amount_due=0;
												  $alternate_payment=0;
                   
												  
												  }
												
												 
											   }   /////////////////alternate payment if is over
											   
										else 
											  {
											  
												$query_insertcom="INSERT INTO commission (`customer_id`,`date`,`commission_birr`) VALUES ('".$customer_row['customer_id']."','$commission_day','$commission_birr')";
												mysql_query($query_insertcom) or die("Problem while writing commision information to database, please try again");
												$query_update="UPDATE `orders` SET alternate_payment=1 WHERE customer_id='$customer_id' ";
												mysql_query($query_update);
												$alternate_payment=1;
	                                          }									   
										 									 
										  
                                   }  /////////////////////  if amount_due!=0 is over
									
									
									  
							  else 
							  
							  {
						   
						   ///////////////////////    NO deductions  as the customer has no debt(amount_due)
								$query_insertcom="INSERT INTO commission (`customer_id`,`date`,`commission_birr`) VALUES ('".$customer_row['customer_id']."','$commission_day','$commission_birr')";
							   mysql_query($query_insertcom) or die("Problem while writing commision information to database, please try again");
							   }
						   
						   
						   
						}///////////////   END OF FOR LOOP	

							      
				 }   /////////////////////commission _amount=====-1	
									
										
								
								
								//############################# 
								
								/*
								if($commission_amount!=-1)
								   {
								   	
							        $commission_day=weekbenchmark();
									///////////   now we  record the commission for each customer
									$query_insertcom="INSERT INTO commission (`customer_id`,`date`,`commission_amount`) VALUES ('".$customer_row['customer_id']."','$commission_day','$commission_amount')";
									mysql_query($query_insertcom) or die("Problem while writing commision information to database, please try again");
                                    //echo $commission_amount;
								  }*/


		 }                //// if is over
   
		///// we need to update customer table  
		$query_updatecustomer="UPDATE customer SET left_over='$newleftover',right_over='$newrightover' WHERE customer_id='".$customer_row['customer_id']."' ";
		mysql_query($query_updatecustomer) or die("Proble while updating customer table");

		}                 ////////////// while loop



 }  ///////////////// function is over



///////////////////     THIS FUNCTIONS CHANGES THE STEPS FIELD OF CUSTOMERS AND RECORDS EVOUCHERS FOR EVERY 6TH EVOUCHER
//////             IT RETURNS THE AMOUNT OF PAYMENTS THAT SHOULD BE MADE TO THE CUSTOMER.
   function calculate_evoucher($steps_thisweek,$customer_id,$oldsteps)
      {
	  ///   $old steps comes from the customer steps field
	   $total=$steps_thisweek+$oldsteps;
	   $evoucher= floor($total/6);
	   $newsteps=$total%6;     //////////////////////     new steps to be recorded in for customer
	   $commission_amount=$steps_thisweek-$evoucher; //////////////////////  actual commision payable after evoucher deduction
	  $query_steps="UPDATE customer SET steps=' $newsteps',number_evoucher='$evoucher' WHERE customer_id='$customer_id'";
	   if(@mysql_query($query_steps))
	     {
		  return $commission_amount;
		 }
	   else
	    return -1; 
	  
	  }
////////////////////////////         CHECHING FLASH OFF USING HOW MANY DIRECT REFERRALS A CUSTOMER HAS

       function customer_numberof_directs($customer_id)
	    {
		$query_directs="SELECT numberof_rightdirects,numberof_leftdirects FROM customer WHERE customer_id='$customer_id'";
		$result=@mysql_query($query_directs) or die("can not retrieve number of directs");
		$row=mysql_fetch_array($result);
		return min($row['numberof_rightdirects'],$row['numberof_leftdirects']);	 
		}
////////////////////////      DOES THE FLASH OFF
	   function check_flushoff($customer_id,$commission_amount)
		   {
		   $direct_referals=$this->customer_numberof_directs($customer_id);
		   
			   switch($direct_referals)
				  {
				   case 1:
					  if($commission_amount > 10)
						 $commission_amount=10;/////////////  only 12 steps per week payable if 1/1 direct referals and 6/6 per day
						break;
				   case 2:
					  if($commission_amount > 10)
						 $commission_amount=10;
					   break;
				   case 3:
					  if($commission_amount > 15)
						 $commission_amount=15;
					   break;
		   
				   case 4:
					  if($commission_amount > 15)
						 $commission_amount=15;
					   break;
				   case 5:
					  if($commission_amount > 15)
						 $commission_amount=15;
					   break;
				   case 6:
					  if($commission_amount > 25)
						 $commission_amount=25;
					   break;
                  case 7:
					  if($commission_amount >25 )
						 $commission_amount=25;
					   break;

                 case 8:
					  if($commission_amount > 25)
						 $commission_amount=25;
					   break;



                 case 9:
					  if($commission_amount > 35)
						 $commission_amount=35;
					   break;

                case 10:
					  if($commission_amount > 35)
						 $commission_amount=35;
					   break;

                case 11:
					  if($commission_amount > 35)
						 $commission_amount=35;
					   break;



              case 12:
					  if($commission_amount > 50)
						 $commission_amount=50;
					   break;

				  default:
						$commission_amount=50;
				}
				
			return 	$commission_amount; 
		   }
	////////////////////////   FUNCTION IS OVER
	
	function show_commissions($offset, $rowsPerPage)
	 {
	 			$thismonday=$this->weekbenchmark();
				$query_commissiondate="SELECT * from `commission_tracker`";
				$result=mysql_query($query_commissiondate);
				$row=mysql_fetch_array($result);
				$last_commissiondate=$row['commission_date'];
				//echo $thismonday;
				if($thismonday==$last_commissiondate)
				  {

				   /////////////////    payables from commissions tables as this has been done before this week
				   $query_payables = "SELECT customer.first_name,customer.customer_id,address.town_or_city,address.pobox,address.bank_account,address.mobile_phone_number,commission.commission_amount,commission.commission_birr,SUM(commission.commission_birr) as commissionsum FROM customer,commission,address WHERE (( commission.date='$thismonday' ) AND (customer.customer_id=commission.customer_id) AND (customer.customer_id=address.customer_id)) GROUP BY customer.customer_id LIMIT $offset, $rowsPerPage";
				   $payables = mysql_query($query_payables) or die(mysql_error());
				   //echo $query_payables;
				   //$payables=mysql_fetch_array($payables);
				   //echo $payables['first_name'];
 				    return $payables;
	              }
				else
				  {
				  //	echo $thismonday;
				  $this->calculate_weekly_forall(); /////////////////////////////    check this out
				 $this->calculate_commission();
				  $query_updatecommissiondate="UPDATE `commission_tracker` SET `commission_date`='$thismonday' WHERE `commission_date`='$last_commissiondate'";
				  //echo $query_updatecommissiondate;
				  
				  $result=mysql_query($query_updatecommissiondate);
				  ///////////  sending a recordset of new commissions payables this week
				   $query_payables = "SELECT customer.first_name, customer.customer_id,address.town_or_city,address.pobox,address.bank_account,address.mobile_phone_number, commission.commission_amount,commission.commission_birr,SUM(commission.commission_birr) as commissionsum FROM customer, commission,address WHERE ((commission.date='$thismonday') AND (customer.customer_id=commission.customer_id) AND (customer.customer_id=address.customer_id)) GROUP BY customer.customer_id LIMIT $offset, $rowsPerPage";
				   $payables = mysql_query($query_payables) or die(mysql_error());
				   return $payables;	  
				  
				  }  
	 
	 }
	 
	 /////////////////////////////////////////////////////
	 
     function number_of_payables()
	 {
	 	 		$thismonday=$this->weekbenchmark();

	 			$query_payables = "SELECT * FROM commission WHERE ((TO_DAYS('".$thismonday."')-TO_DAYS(commission.date)<=7)) GROUP BY customer_id ";
				   $payables = mysql_query($query_payables) or die(mysql_error());
				   $numrows=mysql_num_rows($payables);
				   return $numrows;	  

	 
	 
	 
	 }	 
	
///////////////////////////////   function that shows the commissions is done and over	
	
	
///////functions that inserts values in to the deduction table that will later on be used when calculating commision deductions

		function insertto_dedtbl_gfe($customer_id,$gross_amt,$flushoff_amt,$evoucher_amt,$date)
				{
				$query_insertded="INSERT INTO deductions (`customer_id`,`gross_amt`,`flushoff_amt`,`evoucher_amt`,`date`) VALUES ('$customer_id','$gross_amt','$flushoff_amt','$evoucher_amt','$date')";
				 mysql_query($query_insertded) or die("Problem while writing deduction information to database, please try again gfe");
				}
				
		function insertto_dedtbl_product($customer_id,$productdeduction_amt,$date)
		{
				$query_insertded="INSERT INTO deductions (`customer_id`,`productdeduction_amt`,`date`) VALUES ('$customer_id','$productdeduction_amt','$date')";
				 mysql_query($query_insertded) or die("Problem while writing deduction information to database, please try again");
	
		}
	




			  








				//var $userid;
				//var $password;
				//var $type;


       }

?>