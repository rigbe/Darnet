<?
	//include("DbHandler.php"); 
include("../databasemanagement/dbhandler.php");
	
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
		
		
	}// end of class
	
$ecard	= new ECard();

?>