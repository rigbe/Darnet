<?php
	//include("DbHandler.php"); 
//require_once("../dbinterface/dbhandler.php");
	
	 	class ECard {
		function generateECard($prefix){
		//pre : accept the two letter prefix
		//post : returns a 12 char e-card the first 2 are letters and the others are digits
			$ecard = $prefix;
			$randNum;
			for($i=0; $i<5; $i++){            //////////////      for unknown reason it outputted an 8 digit ecard...so changed to 6
				$randNum=rand(10,99);		// random two digit number
				$ecard.=$randNum;
			}//end of for
			
			return $ecard;
		}// end of generateECard
	
		function generatePin(){
		//pre : 
		//post : returns a 6 char pin code (randomly selected)
			$chars = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$pin='';
			$randChar;
			$charOrNum;
			
			for($i=0; $i<6; $i++){
				$charOrNum=rand(1,2);
				if($charOrNum == 1)
					$randChar = rand(0,9);						// random one digit number
				elseif($charOrNum == 2){
					$randChar=rand(0,25);
					$randChar = $chars[ $randChar ];
				}// end of elseif 
				
				$pin.=$randChar;
			}// end of for
			
			return $pin;
		}// end of generatePin
		
		function validateECardAndPin($ecard, $pin){
			//pre : accepts ecard number and corrosponding pin code
			//post :if ecard is valid returns 1 else return -1
			$select = mysql_query("SELECT * FROM ecards WHERE ecardNum = '".$ecard."' AND pinCode = '".$pin."'");
			$row = mysql_fetch_array($select);
			if($row > 0)
				return 1;
			else
				return -1;
		}// end of validate ECard And Pin
		function updateValue($ecard,$pin,$newValue){
			//pre : accepts ecard number and corrosponding pin code
			//post : if valid ecard -> updates the value newValue and returns 1 else returns -1
			$rs=0;
			$rs = mysql_query("UPDATE `ecards` SET `value` = '".$newValue."' WHERE CONVERT( `ecardNum` USING utf8 ) = '".$ecard."' AND 
								CONVERT( `pinCode` USING utf8 ) = '".$pin."' LIMIT 1 ");
			if($rs)
				return 1;		// value updated 
			else
				return -1;			// invalid ecard 
		}// end of update value
		
		function returnValueOf($ecard,$pin){
			//pre : accepts id number
			//post : if valid ecard -> returns the value else return -1
			$res = mysql_query("SELECT * FROM ecards WHERE ecardNum = '".$ecard."' AND pinCode = '".$pin."'");
			$row = mysql_fetch_array($res);
			if($row>0)	// ecard exits
				return $row[ 'value' ];
			else 
				return -1;		// invalid ecard
		}// end of method return value of
		
		function deleteECard($ecard,$pin){
			// pre : accepts ecard Num and Pin Num  of the ecard 
			// post : deletes that specific ecard and returns 1 if successful else -1
			$res = mysql_query("DELETE FROM `ecards` WHERE CONVERT(`ecardNum` USING utf8) = '".$ecard."' AND 
								CONVERT(`pinCode` USING utf8) = '".$pin."' LIMIT 1;");
			if($res)
				return 1;
			else
				return -1;
		}	// end of delete ECard
		
		function changeStatus($ecard,$pin,$status){
			//pre: accepts ecard Num, Pin Num and the status of the ecard
			//post: changes the status of the ecard to $status  and return 1 if successful 0 otherwise
			$rs = mysql_query("UPDATE `ecards` SET `status` = $status WHERE CONVERT( `ecardNum` USING utf8 ) = $ecard AND
								 CONVERT( `pinCode` USING utf8 ) = $pin LIMIT 1 ;");
			if($rs)
				return 1;
			else
				return 0;
		}//end of method change status
		
		/*function getIdOf($ecard,$pin){
			//pre : accepts the ecard number and corrosponding pin code
			//post : returns the id if valid else -1
			$res = mysql_query("SELECT * FROM ecards WHERE ecardNum = '$ecard' AND pinCard = '$pin'");
			$row = mysql_fetch_array($res);
			if($row>0)	// ecard exits
				return $row[ 'id' ];
			else 
				return -1;
		} //end of get id of */
		
		function getUsedPrefixes(){
			//pre : 
			//post : returs an array of used prefixes
			$arr_reptPrefixs = array();
			$arr_prefixs = array();
			$count=0;
			$res = mysql_query("SELECT ecardNum FROM ecards");
			while($rw = mysql_fetch_array($res)){
				array_push($arr_reptPrefixs,substr($rw[ 'ecardNum' ],0,2));
				$count++;
			} // end of while rw
			if($count>0){
				sort($arr_reptPrefixs);
				$temp = $arr_reptPrefixs[ 0 ];
				array_push($arr_prefixs,$temp);
				for($i=1; $i<$count; $i++){			// to push the distinct ones		
					if($temp!=$arr_reptPrefixs[ $i ]){
						$temp = $arr_reptPrefixs[ $i ];
						array_push($arr_prefixs,$temp);
					}// end of if temp
				}// end of for
				return $arr_prefixs;
			}// end of if count
			else
				return 0;
					
		}// end of get used prefixes
		
	//////////////////////////////////
	
		function numberof_new_ecardsthisweek()
	  {
	  $today=date("Y-m-d");
	  $query_ecards="SELECT * FROM `ecard`  WHERE (TO_DAYS('$today')-TO_DAYS(`generation_date`)<=7)";
	  $result=mysql_query($query_ecards);
	  $result=mysql_num_rows($result);
	   return $result;
	  }
	
//////////////////////////////////


   function ecards_thisweek_foreacharea()
     {
	  $today=date("Y-m-d");
	  $query_ecards="SELECT * FROM `ecard`  WHERE (TO_DAYS('$today')-TO_DAYS(`generation_date`)<=7)";
	  $result=mysql_query($query_ecards);
	  $array_ofecards=array();
	  while($ecard=mysql_fetch_array($result))
	       {
               $prefix=substr($ecard['ecardnum'],0,2);
			   $value=$ecard['originalvalue'];
			//echo $prefix;
			   $array_ofecards[$value][$prefix]+=$value;
               //echo $array_ofecards[$value][$prefix];

	       }
	 return $array_ofecards;
	 
	   }

///////////////////////////////////////////

   function ecards_thisweek_list()
     {
	  $today=date("Y-m-d");
	  $query_ecards="SELECT * FROM `ecard`  WHERE (TO_DAYS('$today')-TO_DAYS(`generation_date`)<=7)";
	  $result=mysql_query($query_ecards);
	  /*
	  $array_ofecards=array();
	  while($ecard=mysql_fetch_array($result))
	       {
               $prefix=substr($ecard['ecardnum'],0,2);
			   $value=$ecard['originalvalue'];
			//echo $prefix;
			   $array_ofecards[$value][$prefix]+=$value;
               //echo $array_ofecards[$value][$prefix];

	       }*/
	 return $result;
	 
	   }
////////////////////////////////



	  function update_ecard($ecards_id,$amounts)
	     {
		   for($i=0;$i < sizeof($ecards_id);$i++)
		   //while ( list( $eid, $amtused ) = each($ecards ) )
		   {
		    $eid=$ecards_id[$i];
		   $query="SELECT * FROM `ecard` WHERE eid='$eid'";
	
	
	          $result=mysql_query($query);
			   
			  //echo $result;
	               	
					$row=mysql_fetch_array($result);
					$originalvalue=$row['originalvalue'];
					$used=$row['used'];
			       $updateused=$used+$amounts[$i];
				  $query="UPDATE ecard SET used='$updateused' where eid='$eid'";
				  //	echo $query;

					$result=mysql_query($query);
					//if(!$result)
					//echo $query;
			  }
	   
	      }

////////////////////////////////////////////////////////////
		function ecard_checker($ecardnum,$pincode)
		{
					$today=date("Y-m-d"); 
					$today=strtotime($today);
					$today_month=date("m",$today);
					$today_year=date("Y",$today);

					
					
					$query="SELECT * FROM ecard WHERE ecardnum='$ecardnum' and pincode='$pincode'";
					$result=mysql_query($query);
					if(!$result)
						$ermsg="the ecard you provided is a wrong one, please try again.";
					$row=@mysql_fetch_array($result);
					$generation_date=$row['generation_date'];
					$originalvalue=$row['originalvalue'];
					$used=$row['used'];
					$actual_balance=$originalvalue-$used;
					
					$generation_date=strtotime($generation_date);
					$m=date("m",$generation_date);
					$d=date("d",$generation_date);
					$y=date("Y",$generation_date);
				if($m<=06)
					{
					$ecard_expirydate= mktime(0,0,0,$m+6,$d,$y);
					$expiry_month=date("m",$ecard_expirydate);
					$expiry_year=date("Y",$ecard_expirydate);

					}
				else
					{
					$num_year=($m+6)-12;
					$ecard_expirydate= mktime(0,0,0,$m,$d,$y+$num_year);
					$expiry_month=date("m",$ecard_expirydate);
					$expiry_year=date("Y",$ecard_expirydate);

					}

				
				if($expiry_month-$today_month > 6 && $today_year != $expiry_year)
				{	
					$ermsg="Your card has expired.(you can contact our support team for more information)";
				}
				
				else
				{
					$ermsg="Your card has a value of '$actual_balance'.";				
				}
		
		return $ermsg;
		}

///////////////////////////////////////////////////////	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}// end of class
	
$ecard	= new ECard();

?>