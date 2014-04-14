<?php
session_start(); 

if( session_is_registered("properuser") )
{
	 include("../dbinterface/dbhandler.php"); 
	 include("../classes/ahaecardgenclass.php");  /////////////////////       needs to be changed if the directory changes
		 /////////////////                  inserting new ecards into database    
		 
		if(isset($_POST['printecards']))
	      {
                 ?>
				 
				 					<html>
						<head>
						<title>Print Ecards</title>
						<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
						<link href="../common/style2.css" rel="stylesheet" type="text/css"></head> <body>
						
					
<table width="679"   border="0" align="left" cellpadding="12" cellspacing="13">
  <tr> 
    <td colspan="2"  bgcolor="#CCCCCC"><div align="center"><strong>Click on Print 
        To print these E-cards</strong></div></td>
  </tr>
  <?php
				 
				 
    
	
	
				   $notAddedECards = array();
				   $notAdded = 0;
				   $generation_date=date("Y-m-d");
				   $generation_d=strtotime($generation_date);
				for($i=0; $i<$_POST[ 'hdnQuantity' ]; $i++){
					$txtE = "txtE".$i;
					$txtP = "txtP".$i;
					$time=1;
					$topage="fmanager.php";
					///calculating the expiry date
					$m=date("m",$generation_d);
					//echo $m;
					$y=date("Y",$generation_d);
					//echo $y;

					$d=date("d",$generation_d);
					
					
					if($m<=06)
					{
					$ecard_expirydate= mktime(0,0,0,$m+6,$d,$y);
					//echo $ecard_expirydate;
					//echo date("Y-m-d",$ecard_expirydate);
					//$ecard_expirydate=date("Y-m-d",$ecard_expirydate);
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
				 $ecard_expirydate=date("Y-m-d", $ecard_expirydate);
				
				////////////  expiry date calculation is over	
						
						//send insert stmt to the db;
					$added = mysql_query("INSERT INTO `ecard` ( `ecardnum` ,`pincode` , `originalvalue`,`generation_date`) 
											VALUES ('".$_POST[ $txtE ]."', '".$_POST[ $txtP ]."','".$_POST[ 'hdnecardvalue' ]."', '$generation_date')");
					
						if(!$added){
								array_push($notAddedECards,$_POST[ $txtE ]);
								$notAdded++;
							  }
					  
					  //////////////  display the ecard here using html table columns
					
////////////////////////////   #########   THIS PART IS PRETTY TRICKY
///////////////////////////////     IF ID IS EVEN IT PRINTS THE CARD ON THE LEFT TD OF EVERY TR ELSE ON THE RIGHT SIDE OF EACH TR					
					  
					    if(($i % 2)==0)
						 {
						 ?>
  <tr > 
    <td width="295" height="170" >
<table width="292" height="56%" align="center" cellpadding="0" cellspacing="2"  style="border:1 dashed">
        <tr bgcolor="#495e83"> 
          <td height="19" colspan="2" ><div align="center"><font color="#FFFFFF"><em><strong><?php echo SYSTEM_NAME; ?> 
              Online System</strong></em></font></div></td>
          <td height="19" bgcolor="#FFFFFF" ><font color="#990000"><em>DarNet 
            Powered</em></font></td>
        </tr>
        <tr> 
          <td height="6" colspan="3" bgcolor="#FFFFFF"><div align="center"> <div align="left"><img src="ecardback.jpg" width="282" height="12"></div></td>
        </tr>
        <tr> 
          <td width="23%" height="33"><div align="left"><font color="#000000" size="2">E-card 
              :</font></div></td>
          <td width="33%"><table width="100%" height="30" border="0" cellpadding="2" cellspacing="2">
              <tr> 
                <td height="22" bgcolor="#CCCCCC"><font color="#000000"><?php echo $_POST[ $txtE ];?></font></td>
              </tr>
            </table></td>
          <td width="44%"><div align="center"><font color="#FFFFFF" size="2"><em> 
              </em></font> <font color="#FFFFFF" size="2"><em> </em></font></div></td>
        </tr>
        <tr> 
          <td height="21"><div align="left"><font color="#000000" size="2">Pin 
              :</font></div></td>
          <td><table width="36%" border="0" cellspacing="2" cellpadding="2">
              <tr> 
                <td bgcolor="#CCCCCC"><font color="#000000"><?php echo $_POST[ $txtP ];?></font></td>
              </tr>
            </table></td>
          <td width="44%"><font color="#000000"><b><?php echo "Birr ".$_POST[ 'hdnecardvalue' ]; ?></b></font>&nbsp;</td>
        </tr>
        <tr> 
          <td height="15" colspan="3"><div align="center"><font color="#00FF00" size="2"><font color="#000000" size="1">Expiry 
              date:</font><font color="#000000"><?php echo  $ecard_expirydate;?> 
              </font></font></div></td>
        </tr>
        <tr> 
          <td height="19" colspan="3"><div align="center"><font color="#990000" size="2"><em>* 
              Use the card for purchase or registration</em></font></div></td>
        </tr>
      </table>
      <div align="left"></div></td>
    <?php
						  }
						 else
						  {
						  ?>
    <td width="349"  ><div align="left"></div>
      <table width="292" height="141"   align="center" cellpadding="0" cellspacing="2"  style="border:1 dashed">
        <tr bgcolor="#495e83"> 
          <td height="19" colspan="2" ><div align="center"><font color="#FFFFFF"><em><strong><?php echo SYSTEM_NAME; ?> 
              Online System</strong></em></font> </div></td>
          <td height="19" bgcolor="#FFFFFF" ><font color="#990000"><em> DarNet 
            Powered </em></font></td>
        </tr>
        <tr> 
          <td height="6" colspan="3" bgcolor="#FFFFFF"> <div align="left"><img src="ecardback.jpg" width="282" height="12"></div></td>
        </tr>
        <tr> 
          <td width="19%" height="33"><div align="left"><font color="#000000" size="2">E-card 
              :</font></div></td>
          <td width="35%"><table width="38%" height="30" border="0" cellpadding="2" cellspacing="2">
              <tr> 
                <td height="22" bgcolor="#CCCCCC"><font color="#000000"><?php echo $_POST[ $txtE ];?></font></td>
              </tr>
            </table></td>
          <td width="46%"><div align="center"><font color="#FFFFFF" size="2"><em> 
              </em></font> <font color="#FFFFFF" size="2"><em> </em></font></div></td>
        </tr>
        <tr> 
          <td height="21"><div align="left"><font color="#000000" size="2">Pin 
              :</font></div></td>
          <td><table width="36%" border="0" cellspacing="2" cellpadding="2">
              <tr> 
                <td bgcolor="#CCCCCC"><font color="#000000"><?php echo $_POST[ $txtP ];?></font></td>
              </tr>
            </table></td>
          <td width="46%"><font color="#000000"><b><?php echo "Birr ".$_POST[ 'hdnecardvalue' ]; ?></b></font>&nbsp;</td>
        </tr>
        <tr> 
          <td height="15" colspan="3"><div align="center"><font color="#00FF00" size="2"><font color="#000000" size="1">Expiry 
              date:</font><font color="#000000"><?php echo  $ecard_expirydate;?> 
              </font></font></div></td>
        </tr>
        <tr> 
          <td height="19" colspan="3"><div align="center"><font color="#990000" size="2"><em>* 
              Use the card for purchase or registration</em></font></div></td>
        </tr>
      </table></td>
  </tr>
  <?php
	////////////////////////////////////////////////////////   THE TRICKY PART IS 
						    }
					      }					////////////     for loop is over

					
					//////////////////   the table should be over...	
				  ?>
  <tr > 
    <td height="35" colspan="2" ><div align="center" style="page-break-before: always"><a href="javascript:window.print()"><img src="../images/printer.JPG" width="41" height="22"><em> 
        Print </em></a>&nbsp;</div></td>
  </tr>
</table>
	
					
<?php   /////////    starting PHP
						
				 if($notAdded > 0)
					{
				
					  echo "Already exists";
				echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" />";  
				////    to avoid running this script again if refresh is touched on the browser
				////           there should be a better solution to these !!!!!!!!!!!!
		
				   }	   
				else
					{
					 //header("location:print_ecards.php");
			
							
				   // echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" />";
		   ///////////////////////                                                       printing code  here
		   ////////////////////////////////////////                              this has to be done
		   
					}
	
	
	
	       }   /// this if ends here......checking if the post printecards is posted
		   
		   
		   
		   
		   
		   
	
	  }////   sessions
	
	else
   {

      header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
 
    }              //////////////////////     if the user is not a registed user

	
	
	
	
	
	
	
		 
?>
