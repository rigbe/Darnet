<?php


//require("../dbinterface/dbinterface.php");


 class customer
         {
      

				//var $userid;
				//var $password;
				//var $type;

				  function verify_customer($customer_id,$password)
					{
				     $act = new dbinterface();
					 $q="SELECT customer_id from customer_account WHERE (customer_id='$customer_id' AND password='$password')";
					 $e=$act->perform_query($q);
					 //$result=mysql_query( $query_customer) or die("customer couldn't be Identified");
					 if (mysql_num_rows($e) >= 1 ) 
					   return mysql_fetch_array($result);
					 else
					   return false;  
					
					}





////////////////////////////
						function deletecustomer_parameter($fields)
						  {
						     
								$act = new dbinterface();
							 	
								foreach($fields as $value)
								{
									
								 $q="ALTER TABLE `customer` DROP $value";
								 //echo $q;
								 $e=$act->perform_query($q);
								 
								}
							return true;	
							 
							
		
						
						}
	  				 
					///////////////////////////////
					
					
					function Numberof_newcustomerstoday()
					   {
						$query_newcustomerstoday = "SELECT * FROM customer WHERE customer.registration_date=SYSDATE() ";
						$newcustomerstoday = mysql_query($query_newcustomerstoday) or die(mysql_error());
						$totalRows_newcustomerstoday = mysql_num_rows($newcustomerstoday);
						return $totalRows_newcustomerstoday;
					   }
 
 
					  function Numberof_customers()
						{
								
							$query_allcustomers = "SELECT * FROM customer";
							$allcustomers = mysql_query($query_allcustomers) or die(mysql_error());
							$totalRows_customers = mysql_num_rows($allcustomers);
							return ($totalRows_customers-1);
					
						}


                ///////////////// registration related functions

				 function generate_newid()
				 {
				  
					$query="SELECT count(*) as number_of_customers FROM customer";
					$result=mysql_query($query);
					$result=mysql_fetch_array($result);
					$num=$result['number_of_customers'];
					$customerid=$num+1;
				    return $customerid;	
					}
				
				
				
				function checkcustomer($id)
				 {
				 $id=customerid_numonly($id);
				 $query_checkcustomer="SELECT * FROM customer WHERE customer_id='$id' ";
				 $query_checkcustomer=mysql_query($query_checkcustomer);
				 if(mysql_num_rows($query_checkcustomer)>0)
					 return true;
				  else
					return false;	 
				 }
			


			   function insert_newcustomer($customer_data,$sal,$fname,$mname,$lname,$bdate,$bmonth,$byear,$gen,$nation,$occ,$bname,$brel,$referrer_data)
			   {
			  
			   /////           IT TOOK A WHILE TO COMPLETE......BASICALLY BECAUSE OF SPELLING DISCREPANCIES BETWEEN THE CUSTOMER
			   /////////       TABLE IN THE DATABASE AND ATTRIBUTE NAMES SITED IN THE SQL STATEMENT !!!!!!!!!!!!
				$new_customer_id=$this->generate_newid();
				 
			   $referrer_id=$referrer_data['referrer_id']; //////////////////// adding prefix to referrer id
			   $registration_date=date("Y-m-d");   ////////////////////   registration date is system date
			   if(isset($bdate))
			   			$birthdate=$byear['birth_year']."-".$bmonth['birth_month']."-".$bdate['birth_date'];////////////   changing the birth date into mysql date format
				
			   //$new_customer="INSERT INTO `customer` (`customer_id`,`first_name` ,`middle_name` ,`last_name`,`birth_date` ,`gender` ,`nationality`,`id_number` , `benificiary_name`,`benificiary_relationship` ,`registration_date` , `referer_id`,`parent_id` ,`salutation`) VALUES ('$new_customer_id','".$customer_data['first_name']."', '".$customer_data['middle_name']."','".$customer_data['last_name']."', '".$birthdate."','".$customer_data['gender']."','".$customer_data['nationality']."','".$customer_data['id_number']."','".$customer_data['benificiary_name']."','".$customer_data['relationship']."','".$registration_date."','".$referrer_id."','".$referrer_data['placement_id']."','".$customer_data['salutation']."')";
			    $new_customer="INSERT INTO `customer` (`customer_id`,`first_name`,`id_number`,`registration_date` , `referer_id`,`parent_id`) VALUES ('$new_customer_id','".$fname['first_name']."','".$customer_data['id_number']."','".$registration_date."','".$referrer_id."','".$referrer_data['placement_id']."')";
			   	$result=mysql_query($new_customer) or die("New customer data could not be inserted into the database");
				
				
					
						 
				
						if(isset($mname))
						   {
							$new_customer="UPDATE `customer` SET `middle_name`='".$mname['middle_name']."' WHERE `customer_id`=$new_customer_id";
							//echo $new_customer;
						    $result=mysql_query($new_customer) or die("Middle name data could not be inserted into the database");
		
						   }
		
						if(isset($sal))
						   {
							$new_customer="UPDATE `customer` SET salutation='".$sal['salutation']."' WHERE `customer_id`= $new_customer_id";
							//echo $new_customer;
							$result=mysql_query($new_customer) or die("salutation data could not be inserted into the database");
		
						   }
		
						if(isset($lname))
						   {
							$new_customer="UPDATE `customer` SET last_name='".$lname['last_name']."' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("last name data could not be inserted into the database");
							//echo $new_customer;
						   }
		
		
						if(isset($bdate))
						   {
							$new_customer="UPDATE `customer` SET `birth_date`='$birthdate' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("birth date data could not be inserted into the database");
		
						   }
		
						if(isset($gen))
						   {
							$new_customer="UPDATE `customer` SET `gender`='".$gen['gender']."' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("gender data could not be inserted into the database");
		
						   }
		
						if(isset($nation))
						   {
							$new_customer="UPDATE `customer` SET `nationality`='".$nation['nationality']."' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("Nationality data could not be inserted into the database");
		
						   }
		
		
						if(isset($occ))
						   {
							$new_customer="UPDATE `customer` SET occupation='".$occ['occupation']."' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("Occupation data could not be inserted into the database");
		
						   }
		
						if(isset($bname))
						   {
							$new_customer="UPDATE `customer` SET `benificiary_name`='".$bname['benificiary_name']."' , benificiary_relationship ='".$brel['benificiary_relationship']."' WHERE `customer_id`=$new_customer_id";
							$result=mysql_query($new_customer) or die("benificiary name data could not be inserted into the database");
		
						   }
		
					   
			   
				//$new_customer_id=mysql_insert_id();
			
				///////////////////    INSERTING CUSTOMER'S ADDRESS INTO ADDRESS TABLE     adds the customer _id without prefixes
				   $new_customer_address="INSERT INTO `address` (`customer_id` ,`mobile_phone_number` ,`home_phone_number`,`office_phone_number` ,`country` ,`town_or_city`,`state_or_province` ,`address` , `pobox`,`email`,`bank_account`) VALUES ('$new_customer_id', '".$customer_data['mobile_phone_number']."','".$customer_data['home_phone_number']."', '".$customer_data['office_phone_number']."','".$customer_data['country']."','".$customer_data['town_or_city']."','".$customer_data['state_or_province']."','".$customer_data['address1']."','".$customer_data['pobox']."','".$customer_data['email']."','".$customer_data['bank_account']."')";
				   $result=mysql_query( $new_customer_address) or die("New customer address could not be written into the database");
			
				return $new_customer_id;
				
			   
			   }
			















////////////////////   gets my downlines today
   function howmany_joined_me_today($customer_id)
     {
	 	 $customer_id=customerid_numonly($customer_id);

 			$query_newcustomerstoday = "SELECT * FROM customer WHERE customer.registration_date=SYSDATE() ";
			$newcustomerstoday = mysql_query($query_newcustomerstoday) or die(mysql_error());
			$totalRows_newcustomerstoday = mysql_num_rows($newcustomerstoday);
			return $totalRows_newcustomerstoday;
				  
				   $query_payables = "SELECT customer.first_name, customer.last_name, customer.customer_id, address.email, commission.commission_amount,commission.commission_birr FROM customer, commission,address WHERE ((TO_DAYS('".$thismonday."')-TO_DAYS(commission.date)<=7) AND (customer.customer_id=commission.customer_id) AND (customer.customer_id=address.customer_id))";

   
   
     }


 //////////////   calculates weekly commission for a customer
	  function my_weekly_commission($customer_id)
		   {
			 //$customer_id=customerid_numonly($customer_id);
			 $thismonday=weekbenchmark();
		
			 //$query_payables = "SELECT commission_amount,commission_birr FROM commission WHERE ((TO_DAYS('".$thismonday."')-TO_DAYS(date)<=7) AND (customer_id='$customer_id')";
			 $query_payables = "SELECT commission_amount,commission_birr FROM commission WHERE customer_id='$customer_id' AND `date`='$thismonday' ";
            
			 $my_commission =@mysql_query($query_payables) or die(mysql_error());
							
				$onecommission=COMMISSION_AMOUNT;  
				$grosstotal=0;
				
						 if(mysql_num_rows($my_commission)>0)
							{
								for($i=0; $i<mysql_num_rows($my_commission); $i++) 
									{
									$row=mysql_fetch_array($my_commission);
									if($row['commission_amount']==0)
										 $grosstotal=$grosstotal+$row['commission_birr'];
									else
										 $grosstotal=$grosstotal+($row['commission_amount']*$onecommission);
			
								
									 } /// for loop is over
									 
							
								  return $grosstotal;
						   
							 }
						 
							else
							 {

							 return 0;
							 
							 } 
					 
			  
			    }   ////////////////////   funtion is over



/////////////////////////#####################     functions that change address and password acounts  
			
			  function change_my_password($customer_id,$new_password)
				{
				//$customer_id=customerid_numonly($customer_id);
				$query_change="UPDATE `customer_account` SET `password`='$new_password' WHERE `customer_id`='$customer_id'";
				if (mysql_query($query_change))
				  return 1;
				else
				 return 0;  	
				}			
			
			function change_my_address($customer_id,$change_pinfo)
			 {
			 $customer_id=customerid_numonly($customer_id);
			 $query_change="UPDATE `address` SET `country`='".$change_pinfo['country']."',`town_or_city`='".$change_pinfo['town_or_city']."',`address`='".$change_pinfo['address']."',`pobox`='".$change_pinfo['pobox']."',`home_phone_number`='".$change_pinfo['home_phone_number']."',`office_phone_number`='".$change_pinfo['office_phone_number']."', `mobile_phone_number`='".$change_pinfo['mobile_phone_number']."',`email`='".$change_pinfo['email']."',`bank_account`='".$change_pinfo['bank_account']."' WHERE `customer_id`='$customer_id'";
			  if (mysql_query($query_change))
				  return 1;
				else
				 return 0;  	
			 
			 }
			
			/////////////////////////#####################     







/////////////////////////  downlines ////////////////////

	   function Number_of_downlines($customer_id)
		  {
			 //$customer_id=customerid_numonly($customer_id); 
			  
			  $query_allcustomers="SELECT * from customer WHERE customer_id='$customer_id'";
			  $allcustomers=mysql_query($query_allcustomers) or die(mysql_error());	
			   $customer_row=mysql_fetch_array($allcustomers);         ////            it starts from customer id 1
									
				$allleft=$this->calculate_allleftdownlines($customer_row['left_descendant_id']);
				$allright=$this->calculate_allrightdownlines($customer_row['right_descendant_id']);
				
				return ($allleft+$allright);
							  
			 }  ///////////////////////////   function is over
	
	



		function calculate_allleftdownlines($leftroot)
		  {
		 ///////////       get the number of new customers this week ....   does a preorder traversal
		 $totalcustomers_left=0;
		   
			if($leftroot!=NULL)
			  {
						$customerid=$leftroot;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						 $totalcustomers_left=1;
					 //////////////     check to see if the registration date is within a week ago from the bench mark
					$totalcustomers_left+=$this->calculate_allleftdownlines($row['left_descendant_id']);
				   $totalcustomers_left+=$this->calculate_allleftdownlines($row['right_descendant_id']);
				 
				} 
			 
				return $totalcustomers_left;
				

				
			 }

		function calculate_allrightdownlines($rightroot)
		  {
		 ///////////       get the number of new customers this week ....   does a preorder traversal
		 $totalcustomers_right=0;
		   
			if($rightroot!=NULL)
			  {
						$customerid=$rightroot;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						$totalcustomers_right=1;
					 //////////////     check to see if the registration date is within a week ago from the bench mark
					$totalcustomers_right+=$this->calculate_allrightdownlines($row['left_descendant_id']);
				   $totalcustomers_right+=$this->calculate_allrightdownlines($row['right_descendant_id']);
				 
				} 
			 
				return $totalcustomers_right;
				
	
				
			 }
	
	/////////////////////   my placement ID
	
	
	  function get_placementId($placement_id,$placement_side)
	    {
			if($placement_side=='left')
			    {
				   do
					{
						//$customerid=customerid_numonly($placement_id);
						$final_placement_id=$placement_id;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						$placement_id=$row['left_descendant_id'];
						
					 } while($row['left_descendant_id'] != NULL);		
			
			    }
			
			
			 else
			   {
			  
				   do
					{
						//$customerid=customerid_numonly($placement_id);
						$final_placement_id=$placement_id;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						$placement_id=$row['right_descendant_id'];
						
					 } while($row['right_descendant_id'] != NULL);		
			  
			     }
	
	
			
			
		    return $final_placement_id;	
			
			}
			
			/////////////////////// gettin customer infor
			
			
			
				function getcustomer($customer_id)
				 {
				 //$customer_id=customerid_numonly($customer_id);
				 $query_customer="SELECT * FROM customer WHERE customer_id='$customer_id'";
				 $result=mysql_query($query_customer) or die("customer data couldn't be retrieved");
				 $customer=mysql_fetch_array($result);
				 return $customer; 
				 }
				 
		    function getcustomeraddress($customer_id)
			{
			//$customer_id=customerid_numonly($customer_id);
			$query_address="SELECT * FROM address WHERE customer_id='$customer_id'";
			$result=mysql_query($query_address) or die("customer address couldn't be retrieved");
			$customer_address=mysql_fetch_array($result);
			return $customer_address; 
		   
			}

			/////////////////////////////////                    updates the left or right descendant field of parents
 function update_parent_record($new_customer_id,$placement_id,$placement_side)
        {
	/////////////////////          we have to check if the parent's left or right leg is already taked..other wise
	/////////////////             this may overwrite the old referee...THIS IS NOT DONE !! IT HAS TO BE DONE
	   $downline_id=$new_customer_id;
	   $placement_id=$placement_id;
	    switch($placement_side)
		  {
	         case 'left':
			    $update="UPDATE customer SET  left_descendant_id='".$downline_id."' WHERE customer_id='$placement_id'";	
		        if($result=mysql_query( $update))
				    return true;
			    else
				  return false;		
		       break;
		
			 case 'right':
			    $update="UPDATE customer SET  `right_descendant_id`='".$downline_id."' WHERE customer_id='$placement_id'";	
		        if($result=mysql_query( $update))
				    return true;
			    else
				  return false;		
		       break;
			}   


       ////////////////////    WHAT IF THERE IS ALREADY A DESCENDANT THERE ????????????????????????? /////
		}
		
	function update_referrer_record($referrer_id,$placement_side)
	 {
	 //$referrer_id=customerid_nu$referrer_id);
	$query_directs="SELECT numberof_rightdirects,numberof_leftdirects FROM customer WHERE customer_id='$referrer_id'";
	 $result=@mysql_query($query_directs);
	 $row=mysql_fetch_array($result);
	 $numberof_rightdirects=$row['numberof_rightdirects'];
	 $numberof_leftdirects=$row['numberof_leftdirects'];
		 switch($placement_side)
			{
			 case 'left':
				 $numberof_leftdirects= $numberof_leftdirects+1;
				 $query="UPDATE customer SET numberof_leftdirects='$numberof_leftdirects' WHERE customer_id='$referrer_id'";
				 @mysql_query($query);
				 break;
			 case 'right':
				  $numberof_rightdirects= $numberof_rightdirects+1;	 
				  $query="UPDATE customer SET numberof_rightdirects='$numberof_rightdirects' WHERE customer_id='$referrer_id'";
                   @mysql_query($query);
				 break;
				 
			}
	     
	   }	
		
		
	function record_customerstatus($new_customer_id)
		{
		$querystatus="INSERT INTO `customerstatus`(`customer_id`) VALUES ('".$new_customer_id."')";
		mysql_query($querystatus) or die("customer status information couldn't be recorded");
		
		}
		
    function update_customerstatus($customer_id)
		{
		$updatestatus="UPDATE `customerstatus` SET `status`=1 WHERE customer_id='$customer_id'";
		mysql_query($updatestatus) or die("customer status couldn't be updated");



		}
		
/////////////////////////////
  function register_customer_account( $new_customer_id,$password,$password_question,$password_answer)
	 {
	 //$new_customer_id=showcustomerid($new_customer_id); ///// attaching the prefix
	 $query_account="INSERT INTO `customer_account` (`customer_id` ,`password` ,`password_question`,`password_answer`) VALUES ('".$new_customer_id."', '".$password."','".$password_question."','".$password_answer."')";
	  mysql_query( $query_account) or die("Customer account information could not be inserted into database");	 
	 }
 
	
		///////////functions that calculate qualified downlines 
	
	
	function qualified_allleftdownlines($leftroot)
		  {
		 ///////////       get the number of new customers this week ....   does a preorder traversal
		 $totalcustomers_left=0;
		   
			if($leftroot!=NULL)
			  {
						$customerid=$leftroot;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						$qs="SELECT * FROM customerstatus WHERE customer_id='$customerid' AND status=1";
						$results=mysql_query($qs);
						if(mysql_num_rows($results) > 0)
						 $totalcustomers_left=1;
					 //////////////     check to see if the registration date is within a week ago from the bench mark
					$totalcustomers_left+=$this->qualified_allleftdownlines($row['left_descendant_id']);
				   $totalcustomers_left+=$this->qualified_allleftdownlines($row['right_descendant_id']);
				 
				} 
			 
				return $totalcustomers_left;
				

				
			 }

		function qualified_allrightdownlines($rightroot)
		  {
		 ///////////       get the number of new customers this week ....   does a preorder traversal
		 $totalcustomers_right=0;
		   
			if($rightroot!=NULL)
			  {
						$customerid=$rightroot;
						$q="SELECT * FROM customer WHERE customer_id='$customerid'";
						$result=mysql_query($q);////                    gets the recordset
						$row=mysql_fetch_array($result);
						$qs="SELECT * FROM customerstatus WHERE customer_id='$customerid' AND status=1";
						$results=mysql_query($qs);
						if(mysql_num_rows($results) > 0)
						$totalcustomers_right=1;
					 //////////////     check to see if the registration date is within a week ago from the bench mark
					$totalcustomers_right+=$this->qualified_allrightdownlines($row['left_descendant_id']);
				   $totalcustomers_right+=$this->qualified_allrightdownlines($row['right_descendant_id']);
				 
				} 
			 
				return $totalcustomers_right;
				
	
				
			 }
	

	
	
	
	
	
	
	
	
	
	
					 
					 
				 




       }

?>