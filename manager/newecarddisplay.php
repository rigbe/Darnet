<?php
session_start(); 

if( session_is_registered("properuser") )
     {
		 require_once("../dbinterface/dbhandler.php");
		 include("../classes/ahaecardgenclass.php");  /////////////////////       needs to be changed if the directory changes
		  $ecard= new ECard();
		
			 
/*
    if(isset($_POST['printecards']))
	      {
				   webheader(); 
		 /////////////////                  inserting new ecards into database          
				   $notAddedECards = array();
				   $notAdded = 0;
				for($i=0; $i<$_POST[ 'hdnQuantity' ]; $i++){
					$txtE = "txtE".$i;
					$txtP = "txtP".$i;
					$time=1;
					$topage="fmanager.php";
					
						
						//send insert stmt to the db;
					$added = mysql_query("INSERT INTO `ecard` ( `ecardnum` ,`pincode` , `originalvalue`) 
											VALUES ('".$_POST[ $txtE ]."', '".$_POST[ $txtP ]."','".$_POST[ 'hdnecardvalue' ]."')");
					
						if(!$added){
								array_push($notAddedECards,$_POST[ $txtE ]);
								$notAdded++;
							  }
					}
					////////////     for loop is over
				 if($notAdded > 0)
					{
				
					  echo "Already exists";
				echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" />";  
				////    to avoid running this script again if refresh is touched on the browser
				////           there should be a better solution to these !!!!!!!!!!!!
		
				   }	   
				else
					{
					 header("location:print_ecards.php");
			
							
				echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" />";
		   ///////////////////////                                                       printing code  here
		   ////////////////////////////////////////                              this has to be done
		   
					}
			 }        /////////// the if is over
		 
	  else
	    {
	   
	  */ ///////////////////   these variables enable creation of ecards
				
					$prefix = $_POST['txtprefix'];
					$ecardAndPin = array();
					$ecardN = $ecard->generateECard($prefix);
					$ecardNumOnly = (float)substr($ecardN,2);
					$txtE;
					$txtP;
					$checkN;
			
				
				?>
					<html>
						<head>
						<title><?php echo SYSTEM_NAME; ?> - New Ecards</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						<link href="../common/style2.css" rel="stylesheet" type="text/css"></head> <body> 
				
				<table width="80%" border="0" cellpadding="6" cellspacing="8" align="center"  >
				  <!--DWLayoutTable-->
				  <tr> 
					<td width="676" height="296" valign="top" bgcolor="#FFFFFF" class="vertical"> 
					  <form action="print_ecards.php" method="post" name="ecardgenerator" target="_blank" id="ecardgenerator">
						<table width="93%" border="0" cellpadding="4" cellspacing="4">
						  <tr bgcolor="#495e83"> 
							<td height="11" colspan="3"><div align="center"> 
								<p><font color="#FFFFFF">New Ecards</font></p>
							  </div></td>
						  </tr>
						  <tr bgcolor="#CCCCCC"> 
							<td height="3"><div align="center"><font color="#000000">E-card Number</font></div></td>
							<td height="3"><div align="center"><font color="#000000">Pin Code</font></div></td>
							<td height="3"><div align="center"><font color="#000000">Value</font></div></td>
						  </tr>
          <?php /////////////////////////  this starts displaying the ecards ////////////////////////?>
          <?php
					
					for($i=0; $i< $_POST[ 'txtQuantity' ]; $i++) {
						$ecardNumOnly++;
						$nextECard = $prefix.$ecardNumOnly;
						$pinN =	$ecard->generatePin();
						array_push($ecardAndPin,array('ecard' => $nextECard , 'pin'=> $pinN ));
						$txtE = "txtE".$i;
						$txtP = "txtP".$i;
						
					?>
          <tr bgcolor="#FFFFFF"> 
            <td height="3"><div align="center"><font color="#000000"> 
                <input type="text" value="<?php echo $nextECard; ?>" size="15" maxlength="12" disabled>
                <input name="<?php echo $txtE; ?>" type="hidden" value="<?php echo $nextECard; ?>">
                <?php ///  !!!!!    a bit of kkkkkkkk code   the   hidden types are used to pass the ecard and pin values to the next page ?>
                </font></div></td>
            <td height="3"><div align="center"><font color="#000000"> 
                <input type="text" value="<?php echo $pinN; ?>" size="10" maxlength="6" disabled >
                <input name="<?php echo $txtP; ?>" type="hidden" value="<?php echo $pinN; ?>" >
                </font></div></td>
            <td height="3"><div align="center"><font color="#000000"><?php echo $_POST['ecardvalue'];?></font></div></td>
          </tr>
          <?php 
					 /////////////   ecard display is over                    ///////////////////////// 
					}
					 ///////////////    the for loop is over///////////////////////
					 
				  ?>
          <tr bgcolor="#CCCCCC"> 
            <td height="0" colspan="3"><div align="center"> 
                <input type="submit" name="printecards" value="Print Ecards">
              </div></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="-2" colspan="3"><div align="center"> 
                <hr width="50%" >
                <hr>
              </div></td>
          </tr>
          <?php    ///    pass some values via hidden input type        ?>
          <input type="hidden" name="hdnQuantity" value="<?php echo $_POST[ 'txtQuantity' ]; ?>" >
          <input type="hidden" name="hdnecardvalue" value="<?php echo $_POST[ 'ecardvalue' ]; ?>" >
          <?php
		////////////////                 these should be done to allow continues creation of ecards		  
				  
				  
				 /*
				  <tr bgcolor="#495e83">
					<td height="-2" colspan="3"><div align="center"><font color="#FFFFFF">Generate 
						More E-cards</font></div></td>
				  </tr>
				  <tr> 
					<td width="34%" height="24">E-card Value</td>
					<td width="40%"><select name="ecardvalue" size="1" id="ecardvalue">
						<option value="300">300</option>
						<option value="1428">1428</option>
						<option value="1146">1146</option>
						<option value="864">864</option>
					  </select></td>
					<td width="26%">&nbsp;</td>
				  </tr>
				  <tr> 
					<td>How many</td>
					<td><input name="txtQuantity" type="text" id="txtQuantity" size="10" maxlength="2"> </td>
					<td>&nbsp;</td>
				  </tr>
				  <tr> 
					<td height="31">Enter prefix</td>
					<td><input name="txtprefix" type="text" id="txtprefix" size="10" maxlength="2"></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr> 
					<td height="28" colspan="3">&nbsp;</td>
				  </tr>
				  <tr bgcolor="#CCCCCC"> 
					<td height="32" colspan="3"><div align="center"> 
						<input type="submit" name="Submit" value="generate">
					  </div></td>
				  </tr>
				  */
				  ?>
        </table>
      </form>
      <p>&nbsp;</p></td>
  </tr>
</table>
		
			<?php	 
			/////////////////// THIS WILL BE THE FOOTER
		/////////////////  
			
			      /////////////////////   finishes the if for printecard checking
		
          }             ////////////////////  if is over for session cheching is over

else
   {

      header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
 
    }              //////////////////////     if the user is not a registed user




		///////////////////////////           FUNCTIONS.........................
		

		
		
		/////////////    this diplays ecards that  have been generated 
		







?>
