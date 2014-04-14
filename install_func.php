<?php	
	
	
	function first_step($good_msql,$good_php,$canContinue)
			  {
				
				   ?><title>DarNet Installation</title>
			  
			
			
<table width="80%" height="236" border="0" align="center">
			  <tr> 
				<td height="53"><p><font color="#000000"><strong><font color="#990000" size="6"><em>DarNet 
					Installer</em></font></strong></font></p>
				  <p>This wizard will guide you through the setup process.</p></td>
			  </tr>
			  <tr>
				<td height="175"><p>&nbsp;</p>
				  <p><strong>Step 1: Checking your server environment</strong></p>
				  <p><br>
					In this step, the DarNet installer will determine if your system meets 
					the requirements for the server environment. To use DarNet, you must have 
					PHP with MySQL support.<br>
				  </p>
				  <p>&nbsp; </p>
					  
      <table width="80%" height="49" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
        <tr> 
          <td width="71%">PHP support exists:</td>
          <td width="29%"> 
            <?php if($good_php) echo'<b><font color="green">Yes</font></b>'; else echo'<b><font color="red">No</font></b>'; ?>
          </td>
        </tr>
        <tr> 
          <td>MySQL version &gt;= 4.1:</td>
          <td> 
            <?php if($good_msql) echo'<b><font color="green">Yes</font></b>'; else echo'<b><font color="red">No</font></b>'; ?>
          </td>
        </tr>
        <tr> 
          <td colspan="2" ><hr color="#00CC66"> </td>
        </tr>
        <?php
								
								if ($canContinue)
								 
								 echo  '<tr><td colspan="2" align="right"><br />Congratulations! You may continue the installation.<br /><br /><input type="button" name="continue" value="Continue >>" onclick="javascript:document.location.href=\'?step=2\'" /></td></tr>';
								
								else
								 
								   echo  '<tr><td colspan="2" ><br />The installer has detected some problems with your server environment, which will not allow DarNet to operate correctly.<br /><br />Please correct these issues and then refresh the page to re-check your environment.<br /><br /></td></tr>';
								
							
								?>
      </table>
					  </td>
					  </tr>
					</table>
					
		
					<?php 
		 
			}					
	
	
//   second step -creating database	
	
	
	function get_databaseinfo()
	 {
	 
	  ?>  <title>DarNet Installation</title>
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
		</script>

					
					<table width="80%" height="236" border="0" align="center">
					  <tr> 
						<td height="53"><p><font color="#000000"><strong><font color="#990000" size="6"><em>DarNet 
							Installer</em></font></strong></font></p>
						  <p>This wizard will guide you through the setup process.</p></td>
					  </tr>
					  <tr>
						<td height="175"><p>&nbsp;</p>
						  
			  
      <p><strong>Step 2: Database Configuration and System Name</strong></p>
						  
			  <p><br>
				The DarNet installer needs some information about your database to finish 
				the installation. Please take the time to fill the following form right.</p>
						  
			  <form action="install.php?step=3" method="post" name="installinfo" onSubmit="MM_validateForm('sysName','','R','dbName','','R','dbUser','','R','dbHost','','R');return document.MM_returnValue">
				<table width="80%" height="49" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
				<tr> 
					
            <td width="70%">System Name:</td>
					<td width="30%"><input name="sysName" type="text" id="sysName" value="DarNet"> </td>
				  </tr>

				  <tr> 
					<td width="70%">Database Name:</td>
					<td width="30%"><input name="dbName" type="text" id="dbName"> </td>
				  </tr>
				  <tr> 
					<td>Database User:</td>
					<td><input name="dbUser" type="text" id="dbUser"> </td>
				  </tr>
				  <tr> 
					<td>Database Password:</td>
					<td><input name="dbPass" type="text" id="dbPass"></td>
				  </tr>
				  <tr> 
					
            <td>Database Host (database host address):</td>
					<td><input name="dbHost" type="text" id="dbHost" value="Localhost"></td>
				  </tr>
				  <tr> 
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Continue >>" /></td>
				  </tr>
         
					</table>
				  </form>
				
								  
				     </td>
					  </tr>
					</table>
					
		
					<?php 
		 
	              ///    some kind of validation is needed
	 
	 
	 
	 }
	
	////#################
	
	
		function finish_installation()
			  {
				
				   ?>
			  
			<title>DarNet Installation</title>
			<table width="80%" height="331" border="0" align="center">
			  <tr> 
				<td height="53"><p><font color="#000000"><strong><font size="6"><em><font color="#990000">DarNet 
        Installer</font></em></font></strong></font></p> 
      <p>Success !!.</p>
      <p>&nbsp;</p></td>
			  </tr>
			  <tr>
				<td height="175"><p><strong><font size="4"><em>Congratulations 
        !</em></font></strong>. The installation has been completed successfully. 
        Go to the <a href="admin/index.php">admin page</a> to customize the system.</p>
      <p align="center">You should login using the following default admin account: 
      </p>
      <p align="center"><strong>UserId</strong>: admin </p>
      <p align="center"><strong>Password</strong>: darnet</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
				  
      <p>The<strong> DarNet </strong>Team.<br>
        <br>
				  </p>
				  <p>&nbsp; </p>
					  
    </td>
					  </tr>
					</table>
					
		
					<?php 
		 
			}					
	

	
	
	
	
	
	
				
  
	
	
	
	
	
	
	
	
	
	
	
						  
						  
		    
							
?>