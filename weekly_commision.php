<?php
session_start(); 
//include_once("databasemanagement/dbhandler.php");
include("dbinterface/dbhandler.php");
include("dbinterface/dbinterface.php");
require_once("classes/customer.php");
require_once("classes/commission.php");
require_once("classes/order.php");
include_once("manager/common_functions.inc");
include_once("configconstants/constants.php");



	if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

 else
  {
   $c=new customer();
   $com=new commission();

  //include_once("customerhandler.php");
  $customer_id=$_SESSION['customer_id'];   ///this variable has the prefix attached yet
  //$customer=getcustomer($customer_id);
   $thismonday=$com->weekbenchmark();
  $customer=$c->getcustomer($customer_id);
  $customer_i=$customer['customer_id'];
  $weekly=$c->my_weekly_commission($customer_id); 
  
  $left_total= $c->calculate_allleftdownlines($customer['left_descendant_id']);
  $right_total=$c->calculate_allrightdownlines($customer['right_descendant_id']);
  
  $allleft_qualified=$c->qualified_allleftdownlines($customer['left_descendant_id']);
  $allright_qualified=$c->qualified_allrightdownlines($customer['right_descendant_id']);

  //$left_over=$customer['left_over'];///the left_over and r_over should be calcualted not from the customer table which will be updated once commission is calculated this week
  //$right_over=$customer['right_over'];
  
   $thisweekregistered_left=$com->calculate_newleftdownlines($customer['left_descendant_id'],$thismonday);//those who got registered on this week
  $thisweekregistered_right=$com->calculate_newrightdownlines($customer['right_descendant_id'],$thismonday);

  $thisweek_left=$com->newleft_qualified($customer['left_descendant_id'],$thismonday);//those who are qualified this week among the registered ones
  $thisweek_right=$com->newright_qualified($customer['right_descendant_id'],$thismonday);

  $left_total=$allleft_qualified-$thisweek_left;
  $right_total=$allright_qualified-$thisweek_right;
	if($left_total <= $right_total)
							  {
							
								$minimum=$left_total;
								$left_over=$minimum%3;
								$right_over=($right_total-$left_total)+$left_over;
							  }
							 else
							   {
							
								$minimum=$right_total;
								$right_over=$minimum%3;
								$left_over=($left_total-$right_total)+$right_over;
	
							   } 
  
  
  
  
  
  //$left_over=$left_total-((($left_total-$thisweek_left) % 3)*3);
  //$right_over=$right_total-((($right_total-$thisweek_right) % 3) * 3);
  $npf_left=$thisweek_left+$left_over;
  $npf_right=$thisweek_right+$right_over;
  if(($npf_left >= 3) && ($npf_right >= 3))
  {
     if($npf_left<= $npf_right)
			{
				$minimum=$npf_left;
			}
	 else
	       {
		      $minimum=$npf_right;
			}
   $pf_left=floor($minimum/3)*3;
   $pf_right=floor($minimum/3)*3;
  }
  
  else
  {
    $pf_left=0;
	$pf_right=0;
  
  }
  $remaining_left=$npf_left-$pf_left;
  $remaining_right=$npf_right-$pf_right;
  
  //$query_payables = "SELECT commission_amount,commission_birr FROM commission WHERE ((TO_DAYS('".$thismonday."')-TO_DAYS(date)<=7) AND (customer_id='$customer_id')";
  $queryded="SELECT *  FROM deductions WHERE `date`='$thismonday' AND customer_id=$customer_i";
  $dedresult=mysql_query($queryded);
  for($i=0;$i<mysql_num_rows($dedresult);$i++)
			{
               $dedfetch=mysql_fetch_array($dedresult); 
			   $totalgross=$totalgross+$dedfetch['gross_amt'];
			   $totalproductdeduction=$totalproductdeduction+$dedfetch['productdeduction_amt'];
			   $totalevoucher=$totalevoucher+$dedfetch['evoucher_amt'];
			   $totalflushoff=$totalflushoff+$dedfetch['flushoff_amt'];
			  }
 
  }
?>


<html>
<head>
<title>Weekly,<?php echo  $customer['salutation']." ". $customer['first_name']; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<TABLE width=1022 height="155%" border=0 align="center">
  <TBODY>
    <TR> 
      <!----Header Links---->
      <STYLE type=text/css>.style1 {
	COLOR: #ffcc00
}
</STYLE>
      <TD height="74" colSpan=2 align=right> <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
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
              <TD vAlign=bottom colspan="3"><img src="images/ahhabanner.jpg" width="405" height="53" align="absbottom"><img src="images/ahhatriangle%20.jpg" width="100" height="53" align="absbottom"> 
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
      <TD width="685" height="26"> </TD>
      <TD width="105"><?php echo date("F,j/Y"); ?></TD>
    </TR>
    <TR> 
      <TD height="122" colspan="2"><table width="1013" height="380" border="0" align="center" cellpadding="5" cellspacing="0" style="border:3 dotted cccccc">
          <tr> 
            <td height="31" colspan="4" bgcolor="#CCCCCC"><div align="center"><em><strong><font color="#990000" size="4">Weekly 
                Payment Information</font></strong></em></div></td>
          </tr>
          <tr bgcolor="#FFFFFF" id=form_headers> 
            <td width="201" height="60" >You have a commission of Birr</td>
            <td width="136" height="60"><font size="+1" color="#990000"><?php if($weekly==0) echo "0"; else echo $weekly; ?></font><?php echo "  Net  this week";  ?>&nbsp;</td>
            <td width="640" rowspan="2"><table width="103%" border="0" align="left" cellpadding="2" cellspacing="0" style="border:3 dotted red">
                <tr > 
                  <td width="65%" rowspan="2" style="border-bottom:3 dashed cccccc"><em>Total 
                    downlines:</em></td>
                  <td width="25%" ><font size="3">Left</font><font size="2"><em>:</em></font></td>
                  <td width="10%" ><font size="+1" color="#990000"><?php if($c->calculate_allleftdownlines($customer['left_descendant_id'])==0)echo "-";else echo $c->calculate_allleftdownlines($customer['left_descendant_id']); ?></font></td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc"><font size="3">Right</font><font size="2"><em>:</em></font></td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($c->calculate_allrightdownlines($customer['right_descendant_id'])==0)echo "-";else echo $c->calculate_allrightdownlines($customer['right_descendant_id']); ?></font></td>
                </tr>
				<tr > 
                  <td width="65%" rowspan="2" style="border-bottom:3 dashed cccccc"><em>Total 
                    qualified downlines:</em></td>
                  <td width="25%" ><font size="3">Left</font><font size="2"><em>:</em></font></td>
                  <td width="10%" ><font size="+1" color="#990000"><?php if($allleft_qualified==0)echo "-";else echo $allleft_qualified; ?></font></td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc"><font size="3">Right</font><font size="2"><em>:</em></font></td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($allright_qualified==0)echo "-";else echo $allright_qualified; ?></font></td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc"><em>Registered 
                    downlines this week:</em></td>
                  <td>Left:</td>
                  <td><font size="+1" color="#990000"><?php if($thisweekregistered_left==0)echo "-";else echo $thisweekregistered_left; ?></font></td>
                </tr>
				
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Right:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($thisweekregistered_right==0)echo "-";else echo $thisweekregistered_right; ?></font></td>
                </tr>
				<tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc"><em>Qualified 
                    downlines this week:</em></td>
                  <td>Left:</td>
                  <td><font size="+1" color="#990000"><?php if($thisweek_left==0)echo "-";else echo $thisweek_left; ?></font></td>
                </tr>
				
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Right:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($thisweek_right==0)echo "-";else echo $thisweek_right; ?></font></td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc"><em>Not 
                    paid for:</em></td>
                  <td>Left:</td>
                  <td><font size="+1" color="#990000">
                    <?php if($npf_left==0)echo "-";else echo  $npf_left; ?>
                    </font></td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Right:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($npf_right==0)echo "-";else echo $npf_right; ?></font></td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc">Paid 
                    this week for:</td>
                  <td>Left:</td>
                  <td><font size="+1" color="#990000"><?php if($pf_left==0)echo "-";else echo  $pf_left;?></font></td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Right:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($pf_right==0)echo "-";else echo  $pf_right;?></font></td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc">Remaining:</td>
                  <td>Left:</td>
                  <td><font size="+1" color="#990000"><?php if($remaining_left==0)echo "-";else echo $remaining_left;?></font></td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Right:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"><?php if($remaining_right==0)echo "-";else echo $remaining_right;?></font></td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc">Gross 
                    amount in Birr and flush off for this week:</td>
                  <td >Gross:</td>
                  <td ><font size="+1" color="#990000"> 
                    <?php if($totalgross==0)echo "-";else echo $totalgross; ?></font>
                  </td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Flush 
                    off:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"> 
                    <?php  if($totalflushoff==0) echo "-"; else echo $totalflushoff; ?>
                    </font> </td>
                </tr>
                <tr> 
                  <td rowspan="2" style="border-bottom:3 dashed cccccc">Deposit(evoucher 
                    and product deduction):</td>
                  <td>Evoucher:</td>
                  <td><font size="+1" color="#990000"> 
                    <?php  if($totalevoucher==0)echo "-";else echo $totalevoucher; ?></font>
                  </td>
                </tr>
                <tr> 
                  <td style="border-bottom:3 dashed cccccc">Product:</td>
                  <td style="border-bottom:3 dashed cccccc"><font size="+1" color="#990000"> 
                    <?php if($totalproductdeduction==0)echo "-";else echo $totalproductdeduction; ?></font>
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td><font size="+1" color="blue">Net:</font></td>
                  <td><font size="+1" color="blue"><?php if($weekly==0)echo "0";else echo $weekly; ?></font></td>
                </tr>
              </table></td>
          </tr>
          <tr bgcolor="#FFFFFF" id=form_headers> 
            <td height="224" colspan="2">&nbsp;</td>
          </tr>
        </table></TD>
    </TR>
    <!--<TR> 
      <TD height="22" colspan="2"><div align="center">
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tr> 
              <td style="border:3 dotted cccccc"><strong><em>Gross commission 
                amount</em></strong></td>
              <td style="border:3 dotted cccccc"><strong><em>Product deduction</em></strong></td>
              <td style="border:3 dotted cccccc"><strong><em>Evoucher deductiion</em></strong></td>
              <td style="border:3 dotted cccccc"><strong><em>Flash off deduction</em></strong></td>
            </tr>
            <tr>
			
			   
              <td style="border:3 dotted cccccc"><font size="+1" color="#990000"><?php if($totalgross==0)echo "-";else echo $totalgross; ?></font></td>
              <td style="border:3 dotted cccccc"><font size="+1" color="#990000"><?php if($totalproductdeduction==0)echo "-";else echo $totalproductdeduction; ?></font></td>
              <td style="border:3 dotted cccccc"><font size="+1" color="#990000"><?php  if($totalevoucher==0)echo "-";else echo $totalevoucher; ?></font></td>
              <td style="border:3 dotted cccccc"><font size="+1" color="#990000"><?php  if($totalflushoff==0) echo "-"; else echo $totalflushoff; ?></font></td>
			  </tr>
			 
             <tr> 
              <td colspan="4" style="border:3 outset red"><strong><font size="5">Total deduction:</font></strong><font size="+1" color="#990000"><?php echo $totalproductdeduction+$totalevoucher+$totalflushoff;?> </font>
              </td>
            </tr>
          </table> 
          <em><font size="2">* Thank you for being ahha's business partner</font></em></div></TD>
    </TR>-->
    <TR>
      <TD colspan="2">&nbsp;</TD>
    </TR>
  </TBODY>
</TABLE>
<map name="Map">
  <area shape="rect" coords="7,10,99,30" href="index.php" alt="Ahha Home">
</map>
</body>
</html>
