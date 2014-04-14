<?php
session_start(); 
require_once("../dbinterface/dbhandler.php");
require_once("../classes/manager.php");
require_once("../classes/customer.php");
require_once("../classes/ahaecardgenclass.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser") )
        {
		$man=new manager();
		$reports=$man->get_myreports('manager');// manager type is hard coded	
  		$ecard=new ECard();
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
    <td width="29%" height="494"><table width="112%" height="91" border="0">
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
      <p>&nbsp;</p></td>
    <td width="71%"><fieldset>
      <table width="100%" height="184" border="0">
        <tr> 
          <td height="26" colspan="2" bgcolor="#CCCCCC"><font color="#990000">E-card 
            Summary</font></td>
        </tr>
        <tr> 
          <td width="73%" height="13"><font color="#000000">Number of E-cards 
            Generated this Week .</font></td>
          <td width="27%"><font size="+2"><?php echo $ecard->numberof_new_ecardsthisweek(); ?></font>&nbsp;</td>
        </tr>
        <tr> 
          <td height="6" colspan="2"><div align="center"><font color="#0000FF">______________________________________________</font></div></td>
        </tr>
        <tr> 
          <td height="6" colspan="2"><div align="center"><font color="#990000" size="3">Ecard 
              generation detail</font></div></td>
        </tr>
        <tr> 
          <td colspan="2"><table width="100%" height="69" style="border:1 dashed" >
              <tr> 
                <td width="23%" height="24" bgcolor="#CCCCCC"><em>Area (Awassa 
                  etc.) </em></td>
                <td width="27%" bgcolor="#CCCCCC"><em>E-card type</em></td>
                <td width="27%" bgcolor="#CCCCCC"><em>Quantity</em></td>
                <td bgcolor="#CCCCCC"><em><strong>Total value</strong></em></td>
              </tr>
              <?php $recordSet=$ecard->ecards_thisweek_foreacharea();
			 
		////////////////////     DISPLAYING A MULTI DIMENSTIONAL ARRAY	  
				 foreach($recordSet as $valuetype=>$value)
				  {
					foreach($value as $prefix=>$valuesum)
					{
					?>
              <tr> 
                <td><?php echo $prefix; ?></td>
                <td><?php echo $valuetype; ?></td>
                <td><?php echo ($valuesum/$valuetype); ?></td>
                <td><?php echo $valuesum; ?></td>
              </tr>
              <?php
				   }
				  
				  }
				 
				   
				  
				  ?>
            </table></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table>
      </fieldset>
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



