<?php
session_start();
include("dbinterface/dbhandler.php"); 
include_once('classes/ahaecardgenclass.php');
include_once('configconstants/constants.php');

    //include_once('file:///C|/Documents and Settings/Administrator/My Documents/ahastyle/admin/commissionhandler.php');
$e=new ECard();
 function count_days( $a, $b )
 {  
  // First we need to break these dates into their constituent parts:   
   $gd_a = getdate( $a );    $gd_b = getdate( $b );    
    // Now recreate these timestamps, based upon noon on each day   
	 // The specific time doesn't matter but it must be the same each day   
	  $a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );    
	  $b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );     
	  // Subtract these two numbers and divide by the number of seconds in a    //  day. Round the result since crossing over a daylight savings time    
	  //  barrier will cause this time to be off by an hour or two.   
	   return round( abs( $a_new - $b_new ) / 86400 );
	   
	   } 


//	global $attempt=0;////////// for locking up the ecard processor form after 5 attempts
//$total=$_SESSION['total_payment'];//the price of the product
//$category=$_SESSION['category'];//category of the prodcut(especially whether or not it should be paid in full or not)
$_SESSION['registrationfee']=REG_FEE;
$registrationfee=REG_FEE;
if(!isset($_SESSION['total_ecard_value']))
{
           $_SESSION['total_ecard_value']=0;//for holding the different amounts entered incase the payment is made by more than one ecard
		   $_SESSION['already_used']=0;//to check whether the user has already entered an ecard
		   }
		$ok_to_order=0;		
		//=echo  $_SESSION['already_used'];
		//echo $category;
//if($category!='full')
  //  {
		if(isset($_POST['verify']))
		 {
		 //$_SESSION['refresh']=false;
		$today=date("Y-m-d"); 
		//echo $today;  
		$today=strtotime($today);
		$ecardcode=$_POST['ecardcode'];
		$pincode=$_POST['pincode'];
		//echo $_SESSION['payment_type'];
		//session_register('has_paid');
		   //if(!isset($_SESSION['payment_type']))
		     // $_SESSION['payment_type']=$_POST['payment_option'];
		   //else
		     //echo $_SESSION['payment_type'];//=$_SESSION['payment_type'];   /////////////////////////   the payment type should be registerd
			//switch($_SESSION['payment_type']){
				//	case 'partial':
		          if(!isset($_SESSION['affected_ecards_id']))
				    {
		            $_SESSION['affected_ecards_id']=array();
					$_SESSION['affected_ecards_used']=array();
					}

					$query="SELECT * FROM ecard WHERE ecardnum='$ecardcode' and pincode='$pincode'";
					//echo $query; 
					$result=mysql_query($query);
					if(mysql_num_rows($result)<=0)
							{
								//echo "gg";
								$ermsg="the ecard you provided is a wrong one, please try again";
								$actual_balance="wrong";
								$new_balance="wrong";
								
							}
						
					else
					{
					 
					$row=@mysql_fetch_array($result);
					$generation_date=$row['generation_date'];
					$eid=$row['eid'];
					$ecardnum=$row['ecardnum'];
					$pincode=$row['pincode'];
					$originalvalue=$row['originalvalue'];
					$used=$row['used'];
					$actual_balance=$originalvalue-$used;
					$generation_date=strtotime($generation_date);///for converting the time into a timestamp so that i could get the real representation of the generation date
					// i think i could have also done it using the normal time generation date but i should now the keys to pass as in $generation_date[weekday"]
					//in order to separate the month, day and year to pass to mktime() could have i? normally the mktime function wasn't
					//working fine with the generation_date day when $generation_date was simply passed with out first changing it to a timestamp.
					//echo $generation_date;
					

				        $found_used=0;
							 for($i=0;$i <sizeof($_SESSION['affected_ecards_id']);$i++)
							 {
								if($eid==$_SESSION['affected_ecards_id'][$i])
								{
									 $found_used=1;
								
								}
							
							  }
					if($found_used==1)
					   $_SESSION['already_used']=1;
					else
					     $_SESSION['already_used']=0;  	
			 
			////////////////////////   the following if checkes for double card entry 
			 
			 if($_SESSION['already_used']==0)
			    {		
						if(count_days($today,$generation_date)>180)
						{	
								$ermsg= "sorry, your ecard has expired.please use a valid one(for further information you can contact our support team)";
								$new_balance=0;
						}
						else
						{
							if($actual_balance<=0)
							{
							//echo "gg";
							$ermsg="the ecard you entered has been totally used,please provide a valid one";
							$actual_balance=0;
							$new_balance=0;
							//attempt=attempt+1;	
							}
							else if($actual_balance<$registrationfee)
							{
								
								$_SESSION['total_ecard_value']=($_SESSION['total_ecard_value'])+$actual_balance;
								if(($_SESSION['total_ecard_value'])<$registrationfee)
								{
								   array_push($_SESSION['affected_ecards_id'],$eid);
								   array_push($_SESSION['affected_ecards_used'],$actual_balance);
									$new_balance=0;
									
									//update_ecard($ecardnum,$pincode,$actual_balance);
									$total_paid=$_SESSION['total_ecard_value'];
									$remaining_amt=$registrationfee-($_SESSION['total_ecard_value']);
									$ermsg="you have paid $total_paid.You need to pay $remaining_amt more, please enter another card again";	
								}
								else if($_SESSION['total_ecard_value']==$registrationfee)
								{
									$_SESSION['has_paid']=1;
								   array_push($_SESSION['affected_ecards_id'],$eid);
								   array_push($_SESSION['affected_ecards_used'],$actual_balance);
									$new_balance=0;
									$ok_to_order=1;
									$ermsg="you have paid the necessary amount, you can now register";
									if(isset($_SESSION['total_ecard_value']))
									  unset($_SESSION['total_ecard_value']);
									
		
								}
								else if($_SESSION['total_ecard_value']>$registrationfee)
								{
									$_SESSION['has_paid']=1;
									$new_balance=$_SESSION['total_ecard_value']-$registrationfee;
									$amount_used=$actual_balance-$new_balance;
									//$updateused=$amount_used;
									//array_push($_SESSION['affected_ecards'],$eid,$amount_used);
									 array_push($_SESSION['affected_ecards_id'],$eid);
									 array_push($_SESSION['affected_ecards_used'],$amount_used);
									$ok_to_order=1;
									 /*
									//$row["lover"]=$row["lover"]-150;
									$query="update ecard set used='$updateused' where ecardnum='$ecardnum'";
									$result=mysql_query($query);
									if(!$result)
										echo "could not update ecard table";*/
									
									$ermsg="you have paid the necessary amount, and the last ecard you entered has a remaining amount of '$new_balance',please register now";
									if(isset($_SESSION['total_ecard_value']))
									unset($_SESSION['total_ecard_value']);
								}// end of elseif $_SESSION['total_ecard_value']>300
							
												
							}// end of else if $actual_balance<300 
		
							
							else if($actual_balance>=$registrationfee)
							{
							$_SESSION['has_paid']=1;
							$paid_sofar=$_SESSION['total_ecard_value'];
							$due=$registrationfee-$paid_sofar;
							$new_balance=$actual_balance-$due;
							$amount_used=$due;
							$ok_to_order=1;
							//$row["lover"]=$row["lover"]-150;
							//$query="update ecard set used='$updateused' where ecardnum='$ecardnum' AND pincode='$pincode'";
							//$result=mysql_query($query);
							array_push($_SESSION['affected_ecards_id'],$eid);
							array_push($_SESSION['affected_ecards_used'],$amount_used);
							$ermsg="you have paid the necessary amount, you can now register";
		
							
							}
					}/// end of expiry date checker else
				  }// if already used session is zero.....no double entry
		  
		  
		////////// this else means there is a card used  
				  else
				  {
				  
				    $ermsg="you have already used that card, so please provide another one";
		  
				 
				   }
		  
		  
	          //} 
         }//if($result) is over
		

	
	  }  //// if isset(verify)is closed
     elseif(isset($_POST['order']))
	    {
		 if($_SESSION['has_paid']==1)		
		    {
		    $e->update_ecard($_SESSION['affected_ecards_id'],$_SESSION['affected_ecards_used']);
			//while ( list( $eid, $amt ) = each($_SESSION['affected_ecards'] ) )
            //echo "$eid - $amt<br />";//echo $_SESSION['affected_ecards']; 
		     header("location:registrationreceipt.php");

			 }
		 else
		 $ermsg="You have not made payment,Please finish payment first !";
			 	
		}


?>




<html>
<head>
<title><?php echo SYSTEM_NAME;?>-registration payment</title>
<LINK href="common/ahha_css.css" type="text/css" rel="stylesheet">
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="imagetoolbar" content="false">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->

if (document.all){  
document.onkeydown = function (){  
var key_f5 = 116; // 116 = F5  

if (key_f5==event.keyCode){  
event.keyCode = 27;  

return false;  
}  
}  
}  












</script>

<style type="text/css">
<!--
.style1 {
	color: #990000;
	font-size: 14px;
}
-->
</style>
</head>

<body >
<TABLE width=80% height="100%" border=0 align="center">
  <TBODY>
    <TR> 
      <!----Header Links---->
      <STYLE type=text/css>.style1 {
	COLOR: #ffcc00
}
</STYLE>
      <SCRIPT language=javascript>
function destroy_cookie(){
	var expdate = new Date();
	expdate.setTime (expdate.getTime() - (3*24*60*60*1000));
	document.cookie = "recipient=''; expires=" + expdate.toGMTString();
	document.cookie = "subject=''; expires=" + expdate.toGMTString();
	document.cookie = "message=''; expires=" + expdate.toGMTString();
}
</SCRIPT>
      <TD align=right colSpan=2 height="25%"> <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
          <TBODY>
            <TR id=form_headers height=15> 
              <TD width="2%" align=left noWrap><SPAN id=link_titles 
            style="FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #0c4c4c"></SPAN><A 
            id=scroll_up name=scroll_up></A></TD>
              <TD align=right colSpan=3><A style="COLOR: #0c4c4c" 
            href="index.php">Home</A>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp;&nbsp; 
                <A style="COLOR: #0c4c4c" 
            href="signin.php">Login</A>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp; 
                <a style="COLOR: #0c4c4c" href="why.php">why join us</a>&nbsp;&nbsp;&nbsp;<span style="color: #0c4c4c">||</span>&nbsp;&nbsp; 
                <A 
            style="COLOR: #0c4c4c" 
            href="contactus.php">Contact Us</A> 
                <!--&nbsp;&nbsp;&nbsp;<span style="color:#0C4C4C; font-weight:bolder">::</span>&nbsp;&nbsp;
			    <a href="contacts.php" style="color:#0C4C4C">Privacy Terms</a>-->
              </TD>
            </TR>
            <TR height=92> 
              <TD vAlign=bottom colspan="3"><img src="images/ahhabanner.jpg" width="405" height="53" align="absbottom"><img src="images/ahhatriangle .jpg" width="100" height="53" align="absbottom"> 
              </TD>
              <TD width="20%" ><img src="images/ahhalink.jpg" width="100" height="53" border="0" align="absbottom" usemap="#Map" href="../index.php"></TD>
            </TR>
            <TR style="BACKGROUND-COLOR: #0c4c4c" align=middle width="100%"> 
              <TD noWrap colSpan=6></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
    <TR> 
      <TD width="20%"></TD>
      <TD width="80%"></TD>
    </TR>
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
      <SCRIPT language=JavaScript>
var openImg = new Image();
function showBranch(branch){
	var objBranch = document.getElementById(branch).style;
	if(objBranch.display=="block")
		objBranch.display="none";
	else
		objBranch.display="block";
}
function selectMenu(obj){
	//var objMenu;
	/*if(get_cookie('clicked_menu')!=null){
		document.cookie="old_menu =" + get_cookie('clicked_menu');
		delete_cookie('clicked_menu');
	}
	document.cookie="clicked_menu =" + mnu;
	alert(get_cookie('clicked_menu'));*/
	//mnu.style.bgColor="#990000";
	//alert(obj.tagName);
	//objMenu=getElementById(mnu.href);
	//objMenu.style.color = '#990000';
	//document.mnu.style.color = '#990000';
	//getElementById(pageName[0])
}
function delete_cookie(cookie_name){
    var expdate = new Date();
    expdate.setTime (expdate.getTime() - (3*24*60*60*1000));
    document.cookie = cookie_name + "=''; expires=" + expdate.toGMTString();
}

</SCRIPT>
      <TD width="20%" rowspan="2" align=middle vAlign=top> <TABLE width=157 border=0>
          <TBODY>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR></TR>
            <TR id=form_headers> 
              <TD align=middle height=18>Note</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''"><div align="left"><span class="style1"><font color="#990000" size="2">Here 
                          you enter ecards for registration purpose. After you 
                          have paid the necessary amount(which is 100 birr) click 
                          on the register button to receive a receipt. </font></span></div></TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
            </TR>
            <TR> 
              <TD height=18></TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp; </p>
        <p>&nbsp; </p>
        
      </TD>
      <TD align=left><font size="4"><strong><?php echo SYSTEM_NAME;?> e-card Payment</strong></font></TD>
    </TR>
    <TR>
      <TD align=left><TABLE height=514 width=709 border=0>
          <TBODY>
            <TR> 
              <TD vAlign=top><form action="registration_ecardprocessor.php" method="post" name="registrationecardprocessor" id="ecardprocessor">
                  <table width="104%" border="0" align="center">
                    <tr > 
                      <td colspan="6" id="main_content"><em>For registration you need an ecard with an amount greater or equal to <?php echo $registrationfee; ?> Ethiopian birr</em> </td>
                    </tr>
                    <tr bgcolor="#CCCCCC"> 
                      <td width="21%" height="25" id="main_content">Ecard code</td>
                      <td width="21%" id="main_content">Pin code</td>
                      <td width="21%" id="main_content">Entered Ecard</td>
                      <td width="6%" id="main_content">Value</td>
                      <td width="17%" id="main_content">Remaining Balance</td>
                      <td width="10%">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td><input type="text" name="ecardcode"></td>
                      <td><input type="password" name="pincode"></td>
                      <td><?php echo $ecardcode;?></td>
                      <td><?php echo $actual_balance;?></td>
                      <td><?php echo $new_balance;?></td>
                      <td> <div align="left"> 
					  <?php
					     if($ok_to_order==1)
						  {
						 ?>
                          <input name="verify" type="submit" id="verify" value="verify" disabled >
						 <?php
						 }
						 else if($ok_to_order==0)
						 {
						 ?> 
					     <input name="verify" type="submit" id="verify" value="verify">
                          <?php
						  }
						  ?>
                        </div></td>
                      <td width="4%">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="24" colspan="6"> <div align="center"> 
                          <input name="order" type="submit" id="order" value="Register">
                        </div></td>
                    </tr>
                  </table>        
                <p>&nbsp;</p></form> 
                <table width="98%" height="28" border="0">
                  <tr>
                    <td><?php if(isset($ermsg)) echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>';?></td>
                  </tr>
                </table>
                <p>&nbsp;</p></TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
    <TR height=23> 
      <TD colSpan=2></TD>
    </TR>
    <TR> 
      <!----Footer Links---->
      <TD align=right colSpan=2> <TABLE cellSpacing=0 cellPadding=0 width="100%">
          <TBODY>
            <TR id=form_headers align=left height=15> 
              <TD>&nbsp;</TD>
              <TD align=right><SPAN 
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;www.ahhanet.com&nbsp;&nbsp;All 
                Rights Reserved</SPAN> </TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
</body>
</html>