<?php


//require_once("../dbinterface/dbinterface.php");



 class order
         {
      
	  
	  
	  		function get_numberofsales($pid)
			  {
			  
			  $q="SELECT COUNT(*) as count From orders WHERE pid=$pid";
			  $r=mysql_query($q);
			  $r=mysql_fetch_array($r);
			  return $r['count'];
			  
			  }
			  
			  
			  function Numberof_sales()
				{
						
					$query_allcustomers = "SELECT * FROM orders";
					$all = mysql_query($query_allcustomers) or die(mysql_error());
					$totalRows= mysql_num_rows($all);
					return ($totalRows);
			
				}


/////////////////////////

 function record_transaction($cart,$payment_type,$new_customer_id,$total)
	 {
	 
	 		 $order_date=date("Y-m-d"); 
	 //     writes the customer Id and what he has bought into order table
	 	$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		  }
		//// the cart has been exploded and the quantity of each product id bought is identified
		////    $cart has valued like (1,2,1,3).....meaning the customer has bought two quantities of product id #1 and one each of 
		/////    product id#2 and #3
		 if($payment_type=='partial')
				  {
				   //echo "gg";
					  foreach ($contents as $id=>$qty) 
						{
						   $amount_due=$total-300;
						   $purchase="INSERT into `orders` (`customer_id`,`pid`,`amtordered`,`amount_due`,`date`) VALUES ('".$new_customer_id."','".$id."','".$qty."','". $amount_due."',$order_date)";
						   mysql_query($purchase) or die("Transaction could not be recorded.....please check your order handling");
						 }  
				   }
			 
	 	else 
				{
				//echo $payment_type;
				  foreach ($contents as $id=>$qty) 
					{
					   $purchase="INSERT into `orders` (`customer_id`,`pid`,`amtordered`,`date`) VALUES ('".$new_customer_id."','".$id."','".$qty."',$order_date)";
					   mysql_query($purchase) or die("Transaction could not be recorded.....please check your order handling");
					 }  
				 }
	
	 }





		/*
			function Numberof_salestoday()
			   {
				$query_salestoday = "SELECT * FROM customer WHERE customer.registration_date=SYSDATE() ";
				$newcustomerstoday = mysql_query($query_newcustomerstoday) or die(mysql_error());
				$totalRows_newcustomerstoday = mysql_num_rows($newcustomerstoday);
				return $totalRows_newcustomerstoday;
			   }


		*/





				//var $userid;
				//var $password;
				//var $type;


       }

?>