<?php
session_start();
include("dbinterface/dbhandler.php"); 

$referrer_id=$_POST['referrer_id'];
$placement_id=$_POST['placement_id'];
$placement_side=$_POST['side'];
//echo $referrer_id;
//echo $placement_id;
//if(isset($_POST['placement'])
//$placement=$_POST['placement'];

if(checkcustomer($placement_id) && checkreferrer($referrer_id))
{
header("location:customer_registration.php");
}
else
{
header("location:referrer_registration.php?ermsg=Sorry, wrong Referrer ID and /or PLacement ID.Try again !");
}
/*function customerid_numonly($placement_id)
	{
	$id_numonly=(float)substr($placement_id,3);  /// starts from the third character of the string (it is a numner)
	return $id_numonly;
	}*/

function checkcustomer($placement_id)
     {
	 $id=$placement_id;
	 $query_checkcustomer="SELECT * FROM customer WHERE customer_id='$id' ";
	 $query_checkcustomer=mysql_query($query_checkcustomer);
	 $num_results=mysql_num_rows($query_checkcustomer);
	 if($num_results>0){
	 	//session_register("placement_id");
		  $_SESSION['placement_id']=$placement_id;////    this is referrer's ID
		 $_SESSION['placement_side']=$placement_side;///
	    return true;
		 }
	  else
	    return false;	 
		
	 }
	function checkreferrer($referrer_id)
		{
		$referrer_id=$referrer_id;
		$query="SELECT * FROM customer WHERE customer_id=$referrer_id";
		$result=mysql_query($query);
		$num_results=mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		$referrer=$row['customer_id'];
		$firstname=$row['first_name'];
		//$middlename=$row['middle_name'];
		//$lastname=$row['last_name'];
		//$fullname=$firstname." ".$middlename." ".$lastname;
		//include("customerhandler.php");
		//$referrer=Numberof_newcustomerstoday($referrer);

				if($num_results>0)
				{
				//displayreferrername($referrer);
				$_SESSION['fullname']=$firstname; //////   this is referrer's name
		        $_SESSION['referrer']=$_POST['referrer_id'];////    this is referrer's ID
			    //$_SESSION['placement_id']=$placement_id;////    this is referrer's ID
			    //$_SESSION['placement_side']=$placement_side;////    this is referrer's ID

				return true;
				}
				else
				{
				//displaynosuchreferrer();
				return false;
				}
		
		}
//$_SESSION['placement']=$placement;
?>