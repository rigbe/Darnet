<?php
session_start(); 
		$sAction = @$_POST["a_add"];
require_once("../dbinterface/dbhandler.php");

require_once("../dbinterface/dbinterface.php");
require_once("../classes/product.php");
//################################  first page for administrators ###############################
if(session_is_registered("properuser"))
        {
		
		
		
		if(isset($sAction))
		   {
		        $pro=new product();
				$productname=$_POST['productname'];
				$price=$_POST['price'];
				$description=$_POST['description'];
				$stockamt=$_POST['stockamt'];
				$cat=$_POST['cat'];
				$ans=$pro->insert_product($productname,$price,$description,$stockamt,$cat);
				if($ans)
				   {
				   $_SESSION[ewSessionMessage] = "New product added successfully";
				
				   }
				else
				   {
				   $_SESSION[ewSessionMessage] = "product couldn't be added";
				
				   }
				
				///  UPLOADING PRODUCT IMAGE
				
				
						    $uploaddir = "../productimages/";
							$filename = trim($_FILES['upfile']['name']);
							$filename = substr($filename, -20);
							$filename = ereg_replace(" ", "", $filename);
							if((ereg(".jpg", $filename)) || (ereg(".gif", $filename))) {
							$filename=substr_replace($filename,$productname,0,strpos($filename,'.')); // replacing the file name by system name  
							$uploadfile = $uploaddir . $filename;
							//echo $_FILES['upfile']['tmp_name'];
							//echo $uploadfile;
							$todelete=$uploadfile;
							if(file_exists($todelete))
							   unlink($todelete); // deletes the banner image file if it already exists
							   
								if(move_uploaded_file($_FILES['upfile']['tmp_name'],$uploadfile)) {
											chmod($uploadfile, 0644);
											//write_to_file('constants.php',SYS_BANNER,$filename);
											//unlink($uploadfile);
											 //echo $filename;
											
												} 
											else {
											$_SESSION[ewSessionMessage]="File upload failed, you already have a banner !";
											}
											} 
									else {
											$_SESSION[ewSessionMessage]="Only images are allowed, upload failed";
										}
						   
							}		
				
				
	            // }
		
	    $act = new dbinterface();
		 $q="SELECT * FROM category";
		 $resultset=$act->perform_query($q);	

  
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
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="71%"><fieldset>
      <legend><em><font color="#000066" size="4">Shopping Customization:Product 
      Entry</font></em></legend>
      <form action="add_products.php" method="post" enctype="multipart/form-data" name="productadd" onSubmit="MM_validateForm('x_productname','','R','x_price','','RisNum','x_stockamt','','RisNum','x_description','','R');return document.MM_returnValue">
        <p> 
          <input type="hidden" name="a_add" value="A">
          <?php
			if (@$_SESSION[ewSessionMessage] <> "") {
			?>
        <p><span class="ewmsg"><font color="#990033"><?php echo $_SESSION[ewSessionMessage] ?></font></span></p>
        <?php
				$_SESSION[ewSessionMessage] = ""; // Clear message
			}
			?>
        <hr>
        <table>
          <tr> 
            <td width="103" class="ewTableHeader"><span>product Name<span class='ewmsg'>&nbsp;*</span></span></td>
            <td width="245" class="ewTableAltRow"><span id="cb_x_productname"> 
              <input type="text" name="productname" id="x_productname" size="30" maxlength="30" value="<?php echo htmlspecialchars(@$x_productname) ?>">
              </span></td>
          </tr>
          <tr> 
            <td class="ewTableHeader"><span>price<span class='ewmsg'>&nbsp;*</span></span></td>
            <td class="ewTableAltRow"><span id="cb_x_price"> 
              <input type="text" name="price" id="x_price" size="30" value="<?php echo htmlspecialchars(@$x_price) ?>">
              Birr. </span></td>
          </tr>
          <tr> 
            <td class="ewTableHeader"><span>description</span></td>
            <td class="ewTableAltRow"><span id="cb_x_description"> 
              <textarea cols="35" rows="4" id="x_description" name="description"><?php echo @$x_description; ?></textarea>
              </span></td>
          </tr>
          <tr> 
            <td class="ewTableHeader"><span>stockamt<span class='ewmsg'>&nbsp;*</span></span></td>
            <td class="ewTableAltRow"><span id="cb_x_stockamt"> 
              <input type="text" name="stockamt" id="x_stockamt" size="30" value="<?php echo htmlspecialchars(@$x_stockamt) ?>">
              </span></td>
          </tr>
          <tr> 
            <td class="ewTableHeader">Category</td>
            <td class="ewTableAltRow"><select name="cat">
                <?php 
									while($row=mysql_fetch_array($resultset))
									{
									 ?>
                <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name']; ?></option>
                <?php
									 }
									 ?>
              </select> </td>
          </tr>
          <tr>
            <td class="ewTableHeader">Product Image</td><input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <td class="ewTableAltRow">
			<input name="upfile" type="file">
&nbsp;</td>
          </tr>
        </table>
        <p> 
          <input type="submit" name="btnAction" id="btnAction" value="ADD">
      </form>
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
    <td width="71%">&nbsp;</td>
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



