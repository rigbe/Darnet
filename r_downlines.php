<?php
session_start(); 
include("dbinterface/dbhandler.php");
include("dbinterface/dbinterface.php");
require_once("classes/customer.php");
	if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

 else
  {
   $c=new customer();
  $customer_id=$_SESSION['customer_id'];   ///this variable has the prefix attached yet
  //$customer=getcustomer($customer_id);
  $customer=$c->getcustomer($customer_id);
  }
?>


<html>
<head>
<title>Geneology,<?php echo  $customer['salutation']." ". $customer['first_name']; ?></title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<TABLE width=903 height="155%" border=0 align="center">
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
      <TD height="61" colspan="2"><table width="926" height="120" border="0" cellpadding="5" cellspacing="4">
          <tr> 
            <td height="31" colspan="8" bgcolor="#CCCCCC"><div align="center"><em><strong><font color="#990000" size="4">right 
                side Geneology </font></strong></em></div></td>
          </tr>
          <tr bgcolor="#FFFFFF" id=form_headers> 
            <td width="87" height="36">Customer ID </td>
            <td width="158">Customer Full Name</td>
            <td width="88">Referrer ID</td>
            <td width="107">Immediate Left</td>
            <td width="137">Immediate Right</td>
            <td width="88">Registration date (Y-M-D)</td>
            <td width="89">status</td>
          </tr>
          <?php
	/////////////    here we need a recursive function:  call it or do it	 
	   display_downlines($customer['right_descendant_id']);
	   
			function display_downlines($root_id)
				  {
					if($root_id!=NULL)
					  {
								$customerid=$root_id;
								$q="SELECT * FROM customer WHERE customer_id='$customerid'";
								$result=mysql_query($q);////                    gets the recordset
								$row=mysql_fetch_array($result);
								
								$qs="SELECT * FROM customerstatus WHERE customer_id='$customerid'";
								$results=mysql_query($qs);////                    gets the recordset
								$rows=mysql_fetch_array($results);
								?>
          <tr bgcolor="#FFFFFF" > 
            <td width="87" height="10"><?php echo $row['customer_id'];   ?> 
            </td>
            <td width="158"><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];  ?></td>
            <td width="88"><?php echo $row['referer_id'];    ?></td>
            <td width="107"> 
              <?php if($row['left_descendant_id']==NULL) echo "  -"; else echo $row['left_descendant_id']; ?>
            </td>
            <td width="137"> 
              <?php if($row['right_descendant_id']==NULL) echo "  -"; else echo $row['right_descendant_id']; ?>
            </td>
            <td width="88"> 
              <?php echo $row['registration_date']; ?>
            </td>
            <td width="89"><?php echo $rows['status']; ?></td>
          </tr>
          <?php
							
							 //////////////     check to see if the registration date is within a week ago from the bench mark
							display_downlines($row['left_descendant_id']);
						    display_downlines($row['right_descendant_id']);
						 
						} 
	                 
						
				     }  
		 
		 
		 ?>
		
        </table></TD>
    </TR>
    <TR>
      <TD colspan="2"></TD>
    </TR>
  </TBODY>
</TABLE>
<map name="Map">
  <area shape="rect" coords="7,10,99,30" href="index.php" alt="Ahha Home">
</map>
</body>
</html>
