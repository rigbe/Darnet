<?php
session_start();
	if(session_is_registered('fullname'))
		{
    include("dbinterface/dbhandler.php"); 
	require_once("classes/customer.php");
	require("dbinterface/dbinterface.php");
  //////////////   include customer handler
	$c=new customer();
	$new_customer=array();
		//// referrer information
		
			$referrer_fullname=$_SESSION['fullname'];  /// this is referrer's name
			
		
			$referrer_id=$_SESSION['referrer'];
		
			
			$placement_id=$_SESSION['placement_id'];

	
	
		     $placement_side=$_SESSION['placement_side'];
		
		$keys=array();
		//////////   New Customer Information
	   if(isset($_SESSION['salutation'])) 
	         {
			$salutation=$_SESSION['salutation'];
			$sal=array('salutation'=>$salutation);

			//array_push($new_customer,'salutation'=>$salutation);
			}
			
		if(isset($_SESSION['first_name'])) 
		   {
			$first_name=$_SESSION['first_name'];
			//array_push($new_customer,'first_name' => $first_name);
			$fname=array('first_name' => $first_name);

			}
			
		if(isset($_SESSION['middle_name'])) 
		 {
			$middle_name=$_SESSION['middle_name'];
			$mname=array('middle_name' => $middle_name);

			}
			
		if(isset($_SESSION['last_name'])) 
		 {
			$last_name=$_SESSION['last_name'];
			//array_push($new_customer,'last_name' => $last_name);
			$lname=array('last_name' => $last_name);

			}
		
		if(isset($_SESSION['birth_date'])) 
		   {
			$birth_date=$_SESSION['birth_date'];
			$birth_month=$_SESSION['birth_month'];
			$birth_year=$_SESSION['birth_year'];
			///array_push($new_customer,'birth_date' => $birth_date);
			//array_push($new_customer,'birth_month' => $birth_month);
			//array_push($new_customer,'birth_year' => $birth_year);
			
			$bdate=array('birth_date' => $birth_date);
			$bmonth=array('birth_month' => $birth_month);
			$byear=array('birth_year' => $birth_year);

			
			

		   }
	
	 	if(isset($_SESSION['gender'])) 
		   {
			$gender=$_SESSION['gender'];
			//array_push($new_customer,'gender' => $gender);
			$gen=array('gender' => $gender);

			}
			
 	 	if(isset($_SESSION['nationality'])) 
		{
			$nationality=$_SESSION['nationality'];
			//array_push($new_customer,'nationality' => $nationality);
			$nation=array('nationality' => $nationality);

		}		

 	 	if(isset($_SESSION['occupation'])) 
		{
			$occupation=$_SESSION['occupation'];
			//array_push($new_customer,'occupation' => $occupation);
			$occ=array('occupation' => $occupation);

		}	
		
	 
		$id_number=$_SESSION['id_number'];
 
  	 	if(isset($_SESSION['benificiary_name'])) 
		{
		$benificiary_name=$_SESSION['benificiary_name'];
		$relationship=$_SESSION['relationship'];
		//array_push($new_customer,'benificiary_name' => $benificiary_name);
		//array_push($new_customer,'relationship' => $relationship);
			$bname=array('benificiary_name' => $benificiary_name);
			$brel=array('relationship' => $relationship);

		}
		
		$country=$_SESSION['country'];
		$town_or_city=$_SESSION['town_or_city'];
		$state_or_province=$_SESSION['state_or_province'];
		$address1=$_SESSION['address1'];
		$pobox=$_SESSION['pobox'];
		$home_phone_number=$_SESSION['home_phone_number'];
		$office_phone_number=$_SESSION['office_phone_number'];
		$mobile_phone_number=$_SESSION['mobile_phone_number'];
		$bank_account=$_SESSION['bank_account'];
		$email=$_SESSION['email'];
		$password=$_SESSION['password'];
		$password_question=$_SESSION['password_question'];
		$password_answer=$_SESSION['password_answer'];
		
		$new_customer=array('id_number'=>$id_number,'country'=>$country,'town_or_city'=>$town_or_city,'state_or_province'=>$state_or_province,'address1'=>$address1,'pobox'=>$pobox,'home_phone_number'=>$home_phone_number,'office_phone_number'=>$office_phone_number,'mobile_phone_number'=>$mobile_phone_number,'email'=>$email,'bank_account'=>$bank_account);
	    
		///////////////  calling a function .........It identifies the actual placement if the placement
		///////////////   the user provided is already taken.
		$placement_id=$c->get_placementId($placement_id,$placement_side);
		
		
		$referrer_info=array('referrer_id'=>$referrer_id,'placement_id'=>$placement_id);
		
	  /////////////////  Purchase information
	    //$cart=$_SESSION['cart'];
		//$payment_type=$_SESSION['payment_type'];
		//$total=$_SESSION['total_payment'];

		//include("orderhandler.php"); 
		//include("mail/mailhandler.php");
		
		
        $new_customer_id=$c->insert_newcustomer($new_customer,$sal,$fname,$mname,$lname,$bdate,$bmonth,$byear,$gen,$nation,$occ,$bname,$brel,$referrer_info);////////////////////   Found in customer!!  inserts the two important arrays into database
	     
		//// AFTER THE NEW NUM ONLY ID OF THE CUSTOMER IS FOUND...UPDATE THE THE REFERRERS/PARENT'S LEGS 
		//echo $placement_id;
		 $result=$c->update_parent_record($new_customer_id,$placement_id,$placement_side); //////  found in customer handler !!
		  $c->update_referrer_record($referrer_id,$placement_side); //////  found in customer handler !!

 //////////           referrer record has been updated
		 	
	    /////////   After the proper customer table updating is done...
		//////////   we now record the transaction that just happened
		//////this record_transaction method found in order handler is not necessary here because we don't need to record anything in orders yet
		 //$order=record_transaction($cart,$payment_type,$new_customer_id,$total);
		 
		 ///this is important:registering the status of our customer as inactive in customerstatus table.and we will put this function in customer handler
				 
		 $c->record_customerstatus($new_customer_id);////we will the status feild in our table set to 0 by default which means inactive. plus $new_customer_id has no prefix, don't forget this
		 
		 ///now we record the customerid and password of the new customer on customer_account table
		 //echo $password;
		 $c->register_customer_account( $new_customer_id,$password,$password_question,$password_answer);
		 $status=0;
	/////////////////////////   Now transaction has been recorded
	 session_destroy();
	///////////  we can  now display the receipt!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	   //header("location:printreceipt.php");
	   //exit;
		}
	
	 else
	   {
	   
	   header("location:index.php");
	   exit;
	   

	   }


?>



<html>
<head>
<title>Receipt to! <?phpphp echo $salutation." ".$first_name." ".$middle_name; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<TABLE width=80% height="100%" border=0 align="center">
  <TBODY>
    <TR> 

     <?php            
//////    get the new customer data from the database to display a printable receipt	
 
	 //$customer=getcustomer($new_customer_id);
	// $customer_address=getcustomeraddress($new_customer_id);    
	 //$customer_transaction=get_orders($new_customer_id);
	 ////   we can use the variables above to display transaction information
	 
	 
	 $fullname=$salutation." ".$first_name." ".$middle_name." ".$last_name;
	//////////////////////////      THIS RECEIPT HAS TO BE EMAILED TO OUR CUSTOMER 
	
///////////	################   receipt has been sent
	 
	 ?> 

      <TD align=left><div align="center"><font size="4">Customer Registration 
           Receipt</font></div></TD>
    </TR>
    <TR> 
      <TD height="22" align=left><div align="center"><font color="#990000" size="2"><strong>We recommend 
          that you <a href="Javascript:window.print()">print out this page</a> 
          for future reference</strong></font></div></TD>
    </TR>
    <TR> 
      <TD align=left><TABLE width=799 height=531 border=0 align="center">
          <TBODY>
            <TR> 
              <TD height="22" vAlign=top> <em></em></TD>
              <TD height="22" colspan="2" vAlign=top><em><font color="#990000" size="3"><?php echo $salutation." ".$first_name." ".$middle_name." ".$last_name;   ?> 
                You are now a member of <?php echo SYSTEM_NAME; ?>! online business.please login using the following Id and password you have provided during registration and start shopping and enjoying! </font></em></TD>
            </TR>
            <TR> 
              <TD width="199" height="276" vAlign=top>&nbsp;</TD>
              <TD width="440" height="276" vAlign=top><table width="433" height="237" style="border:2 dotted red" cellpadding="4" cellspacing="8">
                  <tr> 
                    <td height="22" colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000066">Personal
                        Information </font></div></td>
                  </tr>
				  <tr> 
                    <td width="167" height="27" id="main_content"><div align="right">Your 
                        Customer ID:</div></td>
                    <td width="219"><?php echo $new_customer_id;?>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><div align="right" id="main_content">Your Referrer is:</div></td>
                    <td><?php echo $referrer_fullname;?>(<?php echo $referrer_id;?>)&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><div align="right" id="main_content">Placement ID:</div></td>
                    <td><?php echo strtoupper($placement_id).' '.$placement_side; ?>&nbsp;</td>
                  </tr>
				  <tr> 
                    <td><div align="right" id="main_content">Status:</div></td>
                    <td><?php echo $status.'(unqualified)'?>&nbsp;</td>
                  </tr>
				  <tr> 
                    <td height="22" colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000066">Payment 
                        Information </font></div></td>
                  </tr>
				   <tr> 
                    <td width="161"><div align="right" id="main_content">Registration 
                        fee:</div></td>
                    <td width="266"><?php echo $_SESSION['registrationfee'];?> Birr</td>
                  </tr>

                </table>
                <?php
				/*
				 if ($payment_type=='partial') {
				 
				    $prepayment="200 Birr";
					$total=300;
					}
				else
				  {
				   $prepayment=$total-100;
				   $total=$total;
				   }*/
				
				
				
				
				
				 	 //if(registrationsendReceipt($email,$fullname,showcustomerid($new_customer_id),$referrer_fullname,$referrer_id,strtoupper($placement_id),$status))
	                    //echo "The email You provided is not right !";
                       ?>
                <p>&nbsp;</p>              </TD>
              <TD width="146" height="276" vAlign=top>&nbsp;</TD>
            </TR>
            <TR> 
              <TD height="30" colspan="3" vAlign=top> <hr></TD>
            </TR>
            <TR> 
              <TD height="54" colspan="3" vAlign=top> <fieldset >
                </fieldset></TD>
            </TR>
            <TR> 
              <TD height="27" colspan="3" vAlign=top><div align="center"><a href="javascript:window.print()"><img src="images/printer.JPG" width="41" height="22"><em>Print 
                  My Receipt</em></a></div></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
<?php
/*
if(isset($_SESSION['payment_type']))
									  unset($_SESSION['payment_type']);
									  */?>


</body>
</html>
