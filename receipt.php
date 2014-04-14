<?php
session_start();
if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }
	if(session_is_registered('fullname'))
		{
		$pid=$_SESSION['product_id'];
		$pname=$_SESSION['product_name'];
		$customer_id=$_SESSION['customer_id'];/////i'm gonna use this for recording transactions made by this particular customer and this has a prefix so i need to separate it
		require_once("dbinterface/dbhandler.php");
		require_once("classes/customer.php");
		require_once("dbinterface/dbinterface.php");
		
		$c=new customer();
		
	    $customer_id=$customer_id;
		//$cid=$_SESSION['customer_id'];
		$fullname=$_SESSION['fullname'];
		$q="SELECT * FROM address WHERE `customer_id`='$customer_id'";
		$q=mysql_query($q);
		$row=mysql_fetch_array($q);
		$email=$row['email'];
		//// referrer information
		//$referrer_fullname=$_SESSION['fullname'];  /// this is referrer's name
		//$referrer_id=$_SESSION['referrer'];
		//$placement_id=$_SESSION['placement_id'];
		//$placement_side=$_SESSION['placement_side'];
		
		//////////   New Customer Information
		//$salutation=$_SESSION['salutation'];
		//$first_name=$_SESSION['first_name'];
		//$middle_name=$_SESSION['middle_name'];
		//$last_name=$_SESSION['last_name'];
		//$birth_date=$_SESSION['birth_date'];
		//$birth_month=$_SESSION['birth_month'];
		//$birth_year=$_SESSION['birth_year'];
 		//$gender=$_SESSION['gender'];
		//$nationality=$_SESSION['nationality'];
		//$occupation=$_SESSION['occupation'];
 		//$id_number=$_SESSION['id_number'];
		//$benificiary_name=$_SESSION['benificiary_name'];
		//$relationship=$_SESSION['relationship'];
		//$country=$_SESSION['country'];
		//$town_or_city=$_SESSION['town_or_city'];
		//$state_or_province=$_SESSION['state_or_province'];
		//$address1=$_SESSION['address1'];
		//$pobox=$_SESSION['pobox'];
		//$home_phone_number=$_SESSION['home_phone_number'];
		//$office_phone_number=$_SESSION['office_phone_number'];
		//$mobile_phone_number=$_SESSION['mobile_phone_number'];
		//$bank_account=$_SESSION['bank_account'];
		//$email=$_SESSION['email'];
		//$password=$_SESSION['password'];
		//$password_question=$_SESSION['password_question'];
		//$password_answer=$_SESSION['password_answer'];
		//$new_customer=array('salutation'=>$salutation,'first_name'=>$first_name,'middle_name'=>$middle_name,'last_name'=>$last_name,'birth_date'=>$birth_date,'birth_month'=>$birth_month, 'birth_year'=>$birth_year,'gender'=>$gender,'nationality'=>$nationality,'occupation'=>$occupation,	'id_number'=>$id_number,'benificiary_name'=>$benificiary_name,'relationship'=>$relationship,'country'=>$country,'town_or_city'=>$town_or_city,'state_or_province'=>$state_or_province,'address1'=>$address1,'pobox'=>$pobox,'home_phone_number'=>$home_phone_number,'office_phone_number'=>$office_phone_number,'mobile_phone_number'=>$mobile_phone_number,'email'=>$email,'bank_account'=>$bank_account);
	    
		///////////////  calling a function .........It identifies the actual placement if the placement
		///////////////   the user provided is already taken.
		//$placement_id=get_placementId($placement_id,$placement_side);
		
		
		//$referrer_info=array('referrer_id'=>$referrer_id,'placement_id'=>$placement_id);
		
	  /////////////////  Purchase information
	    $cart=$_SESSION['cart'];
		$payment_type=$_SESSION['payment_type'];
		$total=$_SESSION['total_payment'];

		include("classes/order.php"); 
		
		$o=new order();
		//include("mail/mailhandler.php");
		
		
        //$new_customer_id=insert_newcustomer($new_customer, $referrer_info);////////////////////   Found in customer!!  inserts the two important arrays into database
	     
		//// AFTER THE NEW NUM ONLY ID OF THE CUSTOMER IS FOUND...UPDATE THE THE REFERRERS/PARENT'S LEGS 
		//echo $placement_id;
		 //$result=update_parent_record($new_customer_id,$placement_id,$placement_side); //////  found in customer handler !!
		 // update_referrer_record($referrer_id,$placement_side); //////  found in customer handler !!

 //////////           referrer record has been updated
		 	
	    /////////   After the proper customer table updating is done...
		//////////   we now record the transaction that just happened
		
		 $order=$o->record_transaction($cart,$payment_type,$customer_id,$total);
		 ///now we record the customerid and password of the new customer on customer_account table
		 //echo $password;
		 //register_customer_account( $new_customer_id,$password,$password_question,$password_answer);
	/////////////////////////   Now transaction has been recorded
	$c->update_customerstatus($customer_id);///this is a function in customer handler which will update the customer's status to 1
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
<title>Receipt to! <?php echo $salutation." ".$first_name." ".$middle_name; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<TABLE width=800 height="103%" border=0 align="center">
  <TBODY>
    <TR> 
      <!----Left Links---->
      <STYLE>BODY {
	FONT-SIZE: 10pt; COLOR: navy
}
TD {
	BACKGROUND-REPEAT: no-repeat
}
.trigger {
	CURSOR: pointer
}
.branch {
	DISPLAY: none; MARGIN-LEFT: 16px
}
</STYLE>
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

      <TD align=left><div align="center"><font size="4"> Product Purchase Receipt</font></div></TD>
    </TR>
    <TR> 
      <TD height="22" align=left><div align="center"><font color="#990000" size="2"><strong>We 
          recommend that you <a href="Javascript:window.print()">print out this 
          page</a> for future reference</strong></font></div></TD>
    </TR>
    <TR> 
      <TD align=left><TABLE width=799 height=389 border=0 align="center">
          <TBODY>
            <TR> 
              <TD height="22" vAlign=top> <em></em></TD>
              <TD height="22" vAlign=top><em><font color="#990000" size="3"><?php echo $salutation." ".$first_name." ".$middle_name." ".$last_name;   ?> 
                You can now enjoy your commissions!.</font></em></TD>
              <TD height="22" vAlign=top>&nbsp;</TD>
            </TR>
            <TR> 
              <TD width="199" height="276" vAlign=top>&nbsp;</TD>
              <TD width="440" height="276" vAlign=top><hr> 
                <?php
				 if ($payment_type=='partial') {
				 
				    $prepayment=200 ;
					$total=$prepayment;
					}
				else
				  {
				   $prepayment=$total;
				   $total=$prepayment;
				   }
				
				
				
				
				
				?>
                <table width="437" height="114" style="border:1 dotted red">
                  <tr> 
                    <td height="22" colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000066">Product 
                        Information </font></div></td>
                  </tr>
                  <tr> 
                    <td width="161"><div align="right"  id="main_content">Product 
                        Id:</div></td>
                    <td width="266"><?php echo $pid;?></td>
                  </tr>
                  <tr> 
                    <td><div align="right" id="main_content">Product Name:</div></td>
                    <td><?php echo $pname;  ?></td>
                  </tr>
                </table>
                <table width="437" height="224" style="border:1 dotted red">
                  <tr> 
                    <td height="22" colspan="2" bgcolor="#CCCCCC"><div align="center"><font color="#000066">Payment 
                        Information </font></div></td>
                  </tr>
                  <tr> 
                    <td width="161"><div align="right"  id="main_content">Product prepayment:</div></td>
                    <td width="266"><?php echo $prepayment." "."Birr";?></td>
                  </tr>
                  <tr> 
                    <td><div align="right" id="main_content">Payment Type:</div></td>
                    <td><?php echo $payment_type;  ?></td>
                  </tr>
                  <tr> 
                    <td><div align="right">Total:</div></td>
                    <td><?php echo $total." "."Birr"; ?>&nbsp;</td>
                  </tr>
                </table>
				 <?php 	 //if(purchasesendReceipt($email,$fullname,$pid,$pname,$prepayment,$payment_type,$total))
	                    //echo "The email You provided is not right !";
                       ?>
                <?php //	 if(sendReceipt($email,$fullname,showcustomerid($new_customer_id),$referrer_fullname,$referrer_id,strtoupper($placement_id),$prepayment,$payment_type,$total))
	                 //   echo "The email You provided is not right !";
                       ?>
                <p><a href="javascript:window.print()"><img src="images/printer.JPG" width="41" height="22"></a><a href="javascript:window.print()"><em>Print 
              My Receipt</em></a></p>              </TD>
              <TD width="146" height="276" vAlign=top>&nbsp;</TD>
            </TR>
            <TR> 
              <TD height="4" colspan="3" vAlign=top> <hr></TD>
            </TR>
            <TR>            </TR>
           
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
<?php
if(isset($_SESSION['payment_type']))
									  unset($_SESSION['payment_type']);
									  ?>


</body>
</html>
