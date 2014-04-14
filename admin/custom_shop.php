<?php
session_start(); 

require_once("../dbinterface/dbhandler.php");

//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		require_once("../configconstants/file_functions.php");
		require_once("../configconstants/constants.php");

		if(SHOP_DONE == 1)
		 {  
		  //echo REG_DONE; 
		 header ("Location: add_products.php");  //////////    sends error message to index.php of administrators 
		 }

		$catnum=$_GET['catnum'];	

  
			 // include("file:///C|/wamp/www/databasemanagement/dbhandler.php"); 	
		
		  
		  ?>
		  <title>Admin Panel</title>
			
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
<body background="../page_bg.jpg">
			<table width="80%" height="30" border="0" align="center" bgcolor="#495e83">
			  <tr> 
				<td height="20"><div align="center"><font color="#FFFFFF" face="Courier New, Courier, mono"><strong><?php echo SYSTEM_NAME; ?> 
        Administration Panel / <a href="../index.php"><?php echo SYSTEM_NAME." Home"; ?></a></strong></font></div></td>
			  </tr>
			</table>
			
		
<br><table width="80%" border="0" align="center" bgcolor="#CCCCCC">
  <tr>
    <td><div align="center"><font color="#990000" size="4">Welcome Administrator</font></div></td>
  </tr>
</table>
<br>
<table width="75%" border="0" align="center" style="border:1 dashed red">
  <tr> 
    <td height="21"><div align="left"><strong><font color="#000099"><em>Admin 
        Panel </em></font></strong></div></td>
    <td height="21">&nbsp;</td>
  </tr>
  <tr> 
    <td width="29%"><table width="112%" height="91" border="0">
        <tr> 
          <td><a href="custom_reg.php">Registration Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_shop.php">Shopping Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_report.php">Report Customization</a></td>
        </tr>
        <tr> 
          <td><a href="custom_banner.php">Banner Management</a></td>
        </tr>
        <tr> 
          <td><a href="change_password.php">Change Password</a></td>
        </tr>
        <tr> 
          <td><a href="adminlogout.php">Log Out</a></td>
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
      <p>&nbsp;</p></td>
    <td width="71%" rowspan="2"><fieldset>
	 
      <legend><em><font color="#000066" size="4">Shopping Customization:Category</font></em></legend>
	 
	 <?php 
	   if (!isset($catnum))
	     {
		 ?> 
    	  
      <form action="custom_shop.php?cat=catnum" name="customize_reg" method="get">
	  
        <table width="100%" height="142" >
          <tr> 
            <td height="42" colspan="2"><div align="left">Please specify the number 
                of categories of products you will have.</div>
              <p><br>
              </p></td>
          </tr>
          <tr> 
            <td width="55%" height="11"><strong>Number of Product Categories</strong>: 
            </td>
            <td width="45%"><input name="catnum" type="text" id="catnum" value="1">
            </td>
          </tr>
          <tr> 
            <td height="21">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td height="26">&nbsp;</td>
            <td><input type="submit" name="Submit" value="Save"></td>
          </tr>
        </table>
      </form>
	  <?php
	     }
		else
		  {
		  ?>
		         <form action="save_category.php?catnum=<?php echo $catnum?>" method="POST" name="category" onSubmit="MM_validateForm('catname','','R');return document.MM_returnValue">
	  
        <table width="100%" height="142" >
          <tr> 
            <td height="42" colspan="2"><div align="left">Please enter names of 
                the categories.</div>
              <p><br>
              </p></td>
          </tr>
         
		  <?php
		      for ($i=1;$i<=$catnum;$i++)
			     {
				?> <tr>  
               <td width="33%" height="11"><strong><?php echo "Category".$i;?></strong>: 
               </td>
               <td width="67%"><input name="<?php echo "catname".$i ?>" type="text" id="catname">
               </td>   </tr>
			   <?php
			   }
			?>   
       
          <tr> 
            <td height="21">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td height="26">&nbsp;</td>
            <td><input type="submit" name="Submit" value="Save"></td>
          </tr>
        </table>
      </form>
          <?php
		  }
		  
		  ?>
		 <?php $ermsg=$_REQUEST['ermsg'];echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>';?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      </fieldset></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
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



