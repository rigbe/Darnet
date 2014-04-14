<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");
require_once("../dbinterface/dbinterface.php");

require_once("../classes/manager.php");
require_once("../classes/customer.php");
require_once("../classes/commission.php");
require_once("../configconstants/constants.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser") )
        {
		$man=new manager();
		$reports=$man->get_myreports('manager');// manager type is hard coded	
        $com= new commission();
		$thismonday=$com->weekbenchmark();
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	

		  
		  ?>
		  <title>Admin Panel</title>
			<body background="../page_bg.jpg">
			<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
			  <tr> 
				<td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Manager Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
			  </tr>
			</table>
			
		
<br><table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><font color="#990000" size="4">Welcome, <?php echo $_SESSION['properuser'];?> 
        !</font></div></td>
  </tr>
</table>
<br>
<table width="75%" height="80" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left"><strong><font color="#000099" size="4"><em>Manager 
        Panel </em></font></strong></div></td>
    <td height="21">&nbsp;&nbsp;</td>
  </tr>
  <tr> 
    <td width="23%" height="494"><table width="112%" height="91" border="0">
        <tr> 
          <td><font color="#330000"><strong><em>Reports</em></strong></font></td>
        </tr>

        <?php 
		while($row=mysql_fetch_array($reports))
		 {
		 $link_file=$row['report_name'].".php";
		 $filename = ereg_replace(" ", "_", $link_file);

		 ?>
        <tr> 
          <td><a href="<?php echo $filename; ?>"><?php echo $row['report_name']; ?></a></td>
        </tr>
		<?php
		}
		?>
		<tr> 
          <td><hr align="left" width="50%" color="#CC0066"></td>
        </tr>

		<tr> 
          <td><font color="#330000"><strong><em>Options</em></strong></font></td>
        </tr>

		<tr> 
          <td><a href="com_amt.php">Commission Amount</a></td>
        </tr>
		<tr> 
          <td><a href="generate_ecard.php">Ecard Generation</a></td>
        </tr>
		<tr> 
          <td><a href="change_account.php">Modify Account</a></td>
        </tr>

		 <tr> 
          <td><a href="managerlogout.php">Log Out</a></td>
        </tr>

      </table>

      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="77%"><fieldset>
     
      <table width="106%" height="255" border="0" cellpadding="2" cellspacing="0">
        <tr bgcolor="#CCCCCC"> 
          <td height="24" colspan="10"><div align="center">Customers to be payed 
              this week</div></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td width="10%" height="15" style="border-bottom:1 dashed cccccc">&nbsp;</td>
          <td width="4%" style="border-bottom:1 dashed cccccc">&nbsp;</td>
          <td width="7%" style="border-bottom:1 dashed cccccc">&nbsp;</td>
          <td colspan="2" style="border-bottom:1 dashed cccccc;border-left:1 dashed cccccc;border-right:1 dashed cccccc"><div align="center"><font color="#000000" size="2">Deduction&nbsp; 
              </font></div></td>
          <td width="12%" style="border-bottom:1 dashed cccccc">&nbsp;</td>
          <td colspan="4" style="border-bottom:1 dashed cccccc;border-left:1 dashed cccccc;border-right:1 dashed cccccc"><div align="center"><font color="#000000" size="2">Mailing 
              Address</font></div></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td width="10%" height="14" style="border-bottom:1 dashed cccccc"><font color="#000000" size="2">Full 
            Name</font></td>
          <td width="4%" style="border-bottom:1 dashed cccccc"><font color="#000000" size="2">ID</font></td>
          <td width="7%" style="border-bottom:1 dashed cccccc"><font color="#000000" size="2">Gross 
            </font></td>
          <td width="10%" style="border-bottom:1 dashed cccccc;border-left:1 dashed cccccc">evoucher</td>
          <td width="11%" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc">product</td>
          <td width="12%" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><font color="#000000" size="2">Net</font></td>
          <td width="14%" style="border-bottom:1 dashed cccccc">city</td>
          <td width="12%" style="border-bottom:1 dashed cccccc">pobox</td>
          <td width="11%" style="border-bottom:1 dashed cccccc">Bank A/C</td>
          <td width="9%" style="border-bottom:1 dashed cccccc">Tel</td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td height="24" colspan="10"><hr></td>
        </tr>
        <?php /////////////////////////  this starts displaying the payable customers ////////////////////////?>
        <?php
									 // how many rows to show per page 
							$rowsPerPage = 20;
							// by default we show first page 
							$pageNum = 1; 
						// if $_GET['page'] defined, use it as page number 
							if(isset($_GET['page'])) 
							{ 
							$pageNum = $_GET['page']; 
							} 
				
			
						   // counting the offset 
							$offset = ($pageNum - 1) * $rowsPerPage;  
							$numrows= $com->number_of_payables();
							$maxPage=ceil($numrows/$rowsPerPage);
												
	
							
		        $payables=$com->show_commissions($offset,$rowsPerPage);
				 /*$queryded="SELECT *  FROM deductions WHERE `date`='$thismonday' GROUP BY `customer_id`";
                $dedresult=mysql_query($queryded);
                  for($i=0;$i<mysql_num_rows($dedresult);$i++)
						{
						   $dedfetch=mysql_fetch_array($dedresult); 
						   $totalgross=$totalgross+$dedfetch['gross_amt'];
						   $totalproductdeduction=$totalproductdeduction+$dedfetch['productdeduction_amt'];
						   $totalevoucher=$totalevoucher+$dedfetch['evoucher_amt'];
						   $totalflushoff=$totalflushoff+$dedfetch['flushoff_amt'];
						  }*/

				$onecommission=COMMISSION_AMOUNT;  
                 $grosstotal=0;
				 $totalgross=0;
				 $totalproductdeduction=0;
				 $totalevoucher=0;
				 $totalflushoff=0;
					for($i=0; $i<mysql_num_rows($payables); $i++) {
					$row=mysql_fetch_array($payables);
					$customer_id=$row['customer_id'];
					   $queryded="SELECT *  FROM `deductions` WHERE  `customer_id`=$customer_id AND `date`='$thismonday'";
					   //echo $queryded;
                      $dedresult=mysql_query($queryded);
					  //echo mysql_num_rows($dedresult);
                       for($j=0;$j<mysql_num_rows($dedresult);$j++)
						{
						   $dedfetch=mysql_fetch_array($dedresult); 
						   //echo $dedfetch['gross_amt'];
						   $totalgross=$totalgross+$dedfetch['gross_amt'];
						   $totalproductdeduction=$totalproductdeduction+$dedfetch['productdeduction_amt'];
						   $totalevoucher=$totalevoucher+$dedfetch['evoucher_amt'];
						   $totalflushoff=$totalflushoff+$dedfetch['flushoff_amt'];
						  }
					
						
					    if($row['commission_amount']==0)
						     $commission_in_birr=$row['commission_birr'];
						else
						  	 $commission_in_birr=$row['commission_amount']*$onecommission;	
							?>
        <tr bgcolor="#FFFFFF"> 
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#000000"> 
              <?php if($row['first_name']==" ") echo "-"; else echo $row['first_name'];?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#000000"> 
              <?php if($row['customer_id']==" ") echo "-"; else echo $row['customer_id'];?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#990000"> 
              <?php if($totalgross==0) echo "-"; else echo $totalgross;?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#990000"> 
              <?php if($totalevoucher==0) echo "-"; else echo $totalevoucher;?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#990000"> 
              <?php if($totalproductdeduction==0) echo "-"; else echo  $totalproductdeduction;?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#990000"> 
              <?php if($row['commissionsum']==0) echo "-"; else echo $row['commissionsum'];?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"><div align="left"><font color="#000000"> 
              <?php if($row['town_or_city']==" ") echo "-";else echo $row['town_or_city'];?>
              </font></div></td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"> 
            <?php  if($row['pobox']==" ") echo "-"; else echo $row['pobox'];?>
          </td>
          <td height="3" style="border-bottom:1 dashed cccccc;border-right:1 dashed cccccc"> 
            <?php if($row['bank_account']==" ") echo "-";else echo $row['bank_account'];?>
          </td>
          <td height="3" style="border-bottom:1 dashed cccccc"> 
            <?php if($row['mobile_phone_number']==" ") echo "-"; else echo $row['mobile_phone_number'];?>
          </td>
        </tr>
        <?php 
				  
					 $grosstotal=$grosstotal+$totalgross; 
				     $nettotal=$nettotal+$row['commissionsum']; ////////////////////////////////   not done yet !!!! 
					 /////////////   ecard display is over                    ///////////////////////// 
			       //$totalgross=0;
				   }
			?>
        <tr bgcolor="#CCCCCC"> 
          <td height="3"><div align="left"><font color="#990000"> <strong>TOTAL 
              </strong> </font></div></td>
          <td height="3"><div align="left"><font color="#000000"> </font></div></td>
          <td height="3" bgcolor="#CCCCFF"><div align="left"><font color="blue"> 
              <?php echo $grosstotal;?> </font></div></td>
          <td height="3" colspan="2" bgcolor="#CCCCCC"><div align="left"><font color="#000000"> 
              </font></div>
            <div align="left"><font color="#000000"> </font></div></td>
          <td height="3" bgcolor="#CCCCFF"><div align="left"><font color="blue"> 
              <?php echo $nettotal;?> </font></div></td>
          <td height="3" colspan="4"><div align="left"><font color="#000000"> 
              </font></div></td>
        </tr>
        <tr > 
          <td height="106" colspan="10" align="center"> <p> 
            <p> 
              <?php $self = $_SERVER['PHP_SELF']; 
							$nav = ''; 
							for($page = 1; $page <= $maxPage; $page++) 
							{ 
								if ($page == $pageNum) 
								{ 
									$nav .= " Page$page ";   // no need to create a link to current page 
								} 
								else 
								{ 
									$nav .= " <a href=\"$self?report=weekly&page=$page\">Page$page</a> "; 
								}         
							} 
							
							// creating previous and next link 
							// plus the link to go straight to 
							// the first and last page 
							
							if ($pageNum > 1) 
							{ 
								$page = $pageNum - 1; 
								$prev = " <a href=\"$self?report=weekly&page=$page\">[Prev]</a> "; 
								 
								$first = " <a href=\"$self?report=weekly&page=1\">[First Page]</a> "; 
							}  
							else 
							{ 
								$prev  = '&nbsp;'; // we're on page one, don't print previous link 
								$first = '&nbsp;'; // nor the first page link 
							} 
							
							if ($pageNum < $maxPage) 
							{ 
								$page = $pageNum + 1; 
								$next = " <a href=\"$self?report=weekly&page=$page\">[Next]</a> "; 
								 
								$last = " <a href=\"$self?report=weekly&page=$maxPage\">[Last Page]</a> "; 
							}  
							else 
							{ 
								$next = '&nbsp;'; // we're on the last page, don't print next link 
								$last = '&nbsp;'; // nor the last page link 
							} ?>
            </p>
            <p> 
              <?php
			
					   echo $first . $prev . $nav . $next . $last; 
							?>
            </p></td>
        </tr>
      </table>
	  
	   <p>&nbsp;</p></fieldset>
	  
	  
	  
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></tr>
</table>
</body>
			
           <?php
				
		
	    }
	
	
	else
	   {
	   
	 
		 header ("Location: index.php?ermsg=You are not logged in,You have to first log in !");  //////////    sends error message to index.php of administrators
	 
	  }              //////////////////////     if the user is not a registed user
	



		///////////////////////////           FUNCTIONS.........................
		
		
		
		
		
		/////////////    this diplays ecards that  have been generated 


?>



