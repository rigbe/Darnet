<?php
session_start();
include("dbinterface/dbhandler.php"); 
  
 
  /*
						  $field_name=array();
						  $q="SELECT * FROM `customer`";
						  //$q=mysql_list_fields('gg','customer');
						  $q=mysql_query($q);
						  $num_fields=mysql_num_fields($q);
						  //echo $num_fields;
						  for($i=0;$i<$num_fields;$i++)
						  {
						  $gg=mysql_field_name($q,$i);
						  //echo $gg;
						  array_push($field_name,mysql_field_name($q,$i));
						  }
						  
						 foreach($field_name as $value)
						 {
						 	if($value == 'middle_name')
							
							 ?> <script type="text/javascript"> enable_fields(0); </script> <?php // 0 means hide middle name
								//$mname=1;
								//echo "middle name is on";
							if($value == 'last_name')
							    ?><script type="text/javascript">enable_fields(1); </script> <?php // 1 means hide last name						 
							if($value == 'birth_date')
							    ?><script type="text/javascript">enable_fields(2); </script><?php // 2 means hide birth date
						 	if($value == 'gender')
							    ?> <script type="text/javascript">enable_fields(3); </script> <?php // 3 means hide gender
						 	if($value == 'nationality')
							    ?> <script type="text/javascript">enable_fields(4);</script> <?php // 4 means hide nationality
						 	if($value == 'occupation')
							    ?> <script type="text/javascript">enable_fields(5); </script> <?php // 5 means hide occupation
						 	if($value == 'benificiary_name')
							    ?> <script type="text/javascript">enable_fields(6); </script> <?php // 6 means hide benificiary name
							if($value == 'benificiary_relationship')
							    ?> <script type="text/javascript"> enable_fields(7); </script> <?php // 7 means hide benificiary relationship
							if($value == 'salutation')
							    ?> <script type="text/javascript">enable_fields(8); </script> <?php // 8 means hide salutation
						
						
						 }
						 
						 
						 
	/*					 
						 
	function enable_fields($num)
	{
	switch($num)
	{
	case 0: echo ?> able_fields(0)  
	<?php
	case 1: echo ?> able_fields(1) 
	<?php
	case 2: echo ?> able_fields(2)
	<?php
	case 3: echo ?> able_fields(3)
	<?php
	case 4: echo ?>able_fields(4)
	<?php
	case 5: echo ?> able_fields(5) 
	<?php
	case 6:  echo ?> able_fields(6)
	<?php
	case 7: echo ?> able_fields(7) 
	<?php
	case 8: echo ?> able_fields(8) 
	<?php
	
	}
	
	}*/					 
//echo $_SESSION['referrer'];
//echo $_SESSION['placement_side'];
//require_once('functions.inc.php');
//include_once("common/userinterface.php");
//include("customerhandler.php"); /////   the customer handler also has included the database handler
//webheader();
		
				if(isset($_POST['Cont']))//the continue button should have been activated only after the agree checkbox has been checked, i haven't been able to do this yet
					{
					//checkfillformatfield();
					header("location:registration_confirmation.php");
//					displayconfirmation();
					
					}
				
				
				
				
				if(isset($_POST['submit']) && $_POST['submit']=='Cancel')
					{
										header("location:index.php");

					//displayhomepage();//this function hasn't been implemented,but its idea is to take the user back to the home page when he presses the cancel button
					exit;
					}

	   if(session_is_registered("referrer"))
	   {
	  //echo $_SESSION['referrer'];
	    $referrer=$_SESSION['referrer'];
	    $fullname=$_SESSION['fullname'];
	  ?>


			<html>
			<head>
			<title><?php echo SYSTEM_NAME;?>-Customer Registration</title>
			<LINK href="common/ahha_css.css" type=text/css rel=stylesheet> 
			<?php
			           function hide_fields()
							 {
							 echo "<script type=\"text/javascript\">";	 
							echo  "registration.Middle name.style.visibility=\"hidden\"";
							echo "</script>";
								 
							
							}
							hide_fields();
					?>		
			<script type="text/javascript">
			<!--
			<!--
			
							
														
														
							function hide_fields()
							{
							if(num==0)
							mname.style.visibility="hidden";
							if(num==1)
							lname.style.visibility="hidden";
							if(num==2)
							birthdate.style.visibility="hidden";
							if(num==3)
							gender.style.visibility="hidden";
							if(num==4)
							nationality.style.visibility="hidden";
							//occupation.style.visibility="hidden";
							if(num==6)
							benname.style.visibility="hidden";
							if(num==7)
							benrel.style.visibility="hidden";
							if(num==8)
							salutation.style.visibility="hidden";
						
							}
							function enable_fields(num)
							{
							
							if(num==0)
							mname.style.visibility="visible";
							if(num==1)
							lname.style.visibility="visible";
							if(num==2)
							birthdate.style.visibility="visible";
							if(num==3)
							gender.style.visibility="visible";
							if(num==4)
							nationality.style.visibility="visible";
							//occupation.style.visibility="hidden";
							if(num==6)
							benname.style.visibility="visible";
							if(num==7)
							benrel.style.visibility="visible";
							if(num==8)
							salutation.style.visibility="visible";
							}
							
							
							function validate_year(year_entered)
								{
								var d=new Date()
								
								var current_year=d.getFullYear();
								if(current_year-year_entered < 18)
									  guardian_name.style.display="block";
								 else
									 guardian_name.style.display="none";
			
								}	
													
							  function IRagreement()
								{
								if( registration.agreement.checked ) 
								  registration.Cont.disabled = false;
								else
								  registration.Cont.disabled = true;
								}
							
							function comment(where)
								{
								if(where == 1)
								  {
								  security.style.visibility="hidden";
								  referrerDetail.style.visibility="visible";
								  personalDetail.style.visibility="hidden";
								  contactDetail.style.visibility="hidden";
								  contactAddress.style.visibility="hidden";
								  passwordReset.style.visibility="hidden";
								  }
								if(where == 2)
								  {
								  security.style.visibility="hidden";
								  referrerDetail.style.visibility="hidden";
								  personalDetail.style.visibility="visible";
								  contactDetail.style.visibility="hidden";
								  contactAddress.style.visibility="hidden";
								  passwordReset.style.visibility="hidden";
								  }
								if(where == 3)
								  {
								  security.style.visibility="hidden";
								  referrerDetail.style.visibility="hidden";
								  personalDetail.style.visibility="hidden";
								  contactDetail.style.visibility="hidden";
								  contactAddress.style.visibility="visible";
								  passwordReset.style.visibility="hidden";
								  }
								if(where == 4)
								  {
								  security.style.visibility="hidden";
								  referrerDetail.style.visibility="hidden";
								  personalDetail.style.visibility="hidden";
								  contactDetail.style.visibility="visible";
								  contactAddress.style.visibility="hidden";
								  passwordReset.style.visibility="hidden";
								  }
								if(where == 5)
								  {
								  security.style.visibility="visible";
								  referrerDetail.style.visibility="hidden";
								  personalDetail.style.visibility="hidden";
								  contactDetail.style.visibility="hidden";
								  contactAddress.style.visibility="hidden";
								  passwordReset.style.visibility="hidden";
								  }
								if(where == 6)
								  {
								  security.style.visibility="hidden";
								  referrerDetail.style.visibility="hidden";
								  personalDetail.style.visibility="hidden";
								  contactDetail.style.visibility="hidden";
								  contactAddress.style.visibility="hidden";
								  passwordReset.style.visibility="visible";
								  }
								}
							// -->
			
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
				if (val) { nm=val.id; if ((val=val.value)!="") {
				  if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
					if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
				  } else if (test!='R') { num = parseFloat(val);
					if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
					if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
					  min=test.substring(8,p); max=test.substring(p+1);
					  if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
				} } } else if (test.charAt(0) == 'R') errors += '- '+nm+' must be filled.\n'; }
				  
			  }if(registration.password.value != registration.confirm_password.value)
					 errors+='- '+'The two passwords entered do not match.\n'; 
			////  Here you can add what ever validation you want...errors should be added to errors and you should use if(some function)		 
					 
			  if (errors) alert('The following error(s) occurred:\n'+errors);
			  
			  
			  
			  
			  
			  document.MM_returnValue = (errors == '');
			}
			
			
			
			//-->
			</script>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<style type="text/css">
			<!--
			.style1 {color: #990000}
			.hidemname{visibility:hidden}
			-->
			</style>
			</head>
			
			<body>
			<TABLE width=800 height="100%" border=0 align="center">
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
						  <TD vAlign=bottom colspan="4"><img src="images/ahhabanner.jpg" width="405" height="53" align="absbottom"><img src="images/ahhatriangle%20.jpg" width="100" height="53" align="absbottom"> 
						  </TD>
						</TR>
						<TR style="BACKGROUND-COLOR: #0c4c4c" align=middle width="100%"> 
						  <TD noWrap colSpan=6></TD>
						</TR>
					  </TBODY>
					</TABLE></TD>
				</TR>
				<TR> 
				  <TD width="25%"></TD>
				  <TD width="75%"></TD>
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
				  <TD vAlign=top align=middle width="15%"> <TABLE width=157 border=0>
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
						  <TD align=middle height=18>Notes:</TD>
						</TR>
						<TR id=form_headers> 
						  <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
						align=left border=0>
							  <TBODY>
								<TR align=left> 
								  <TD onMouseOver="this.background='images/select.jpg'" 
							onmouseout="this.background=''">Fields marked * are mandatory. 
									<?php echo SYSTEM_NAME;?> will use this information to 
									establish a firm relationship with its customers.</TD>
								</TR>
							  </TBODY>
							</TABLE></TD>
						</TR>
						<TR> 
						  <TD height=18></TD>
						</TR>
					  </TBODY>
					</TABLE>
					<p>&nbsp;</p>
					<TABLE width=157 height="66" border=0>
					  <TBODY>
						<TR id=form_headers> 
						  <TD align=middle height=15>Bank account</TD>
						</TR>
						<TR> 
						  <TD height=28 bgcolor="#CCCCCC" id=form_headers> <?php echo SYSTEM_NAME;?> 
							will use your Bank account to send you commissions</TD>
						</TR>
					  </TBODY>
					</TABLE>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					
				  </TD>
				  <TD align=left> <TABLE height=500 width=615 border=0>
					  <TBODY>
						<TR> 
						  <TD vAlign=top> <table border="0" align="center" cellpadding="6" cellspacing="8">
							  <!--DWLayoutTable-->
							  <tr> 
								<td colspan="2" ><strong><font size="4">Registration form</font></strong> 
								</td>
								<td rowspan="2"><!--DWLayoutEmptyCell-->&nbsp;</td>
							  </tr>
							  <tr> 
								<td id=main_content>Your referrer ID:</td>
								<td bgcolor="#CCCCCC" id=main_content><?php echo $referrer;?> 
								</td>
							  </tr>
							  <tr> 
								<td id=main_content>Your referrer's full name:</td>
								<td id=main_content bgcolor="#CCCCCC"><?php echo $fullname;?></td>
								<td><!--DWLayoutEmptyCell-->&nbsp;</td>
							  </tr>
							  <? }?>
							  <tr> 
								<td width="676" height="332" colspan="2" valign="top" class="vertical" > 
								  <form action="customer_registration.php" method="post" name="registration">
									<fieldset>
									<legend><em><font size="3"><strong></strong></font></em></legend>
									
                        <table width="98%" border="0" cellpadding="6" cellspacing="8">
                          <!--DWLayoutTable-->
                          <tr bgcolor="#FFFFFF"> 
                            <td height="29" colspan="4"><div align="right"><font color="#990000">Note: 
                                fields marked * are Mandatory </font></div></td>
                          </tr>
                          <tr bgcolor="#CCCCCC"> 
                            <td height="32" colspan="4" valign="top" class="vertical" ><font size="4">Personal 
                              Detail</font></td>
                          </tr>
                          <tr id="salutation"> 
                            <td width="33%" height="36" valign="top" class="vertical" id=main_content><p align="left">Title:<font color="#990000">*</font></p></td>
                            <td width="21%" valign="top" class="vertical"> <select   name="title" id="Title">
                                <option value="0" >Select Salutation</OPTION>
                                <OPTION value="Ato" selected   style="BACKGROUND-COLOR: #f0f5f7;">Ato</OPTION>
                                <OPTION  value="Miss">Miss</OPTION>
                                <OPTION   style="BACKGROUND-COLOR: #f0f5f7;" value="Dr.">Dr.</OPTION>
                                <OPTION  value="Mrs.">Mrs.</OPTION>
                                <OPTION  style="BACKGROUND-COLOR: #f0f5f7;" value="Engr.">Engr.</OPTION>
                                <OPTION  value="Proff.">Proff.</OPTION>
                                <OPTION  style="BACKGROUND-COLOR: #f0f5f7;" value="Mr.">Mr.</OPTION>
                                <OPTION value="Ms.">Ms.</OPTION>
                                <OPTION   style="BACKGROUND-COLOR: #f0f5f7;" value="Not Specified" >Not 
                                Specified</option>
                              </select> 
                            <td width="37%" valign="top" class="vertical" >&nbsp; </td>
                            <td width="9%" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="34" valign="top" class="vertical" id=main_content><div align="left">First 
                                Name :<font color="#990000">*</font></div></td>
                            <td colspan="2" valign="top" class="vertical" ><input name="first_name" id="First name"  type="text"></td>
                            <td valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="mname"> 
                            <td height="32" valign="top" class="vertical" id=main_content><div align="left">Middle 
                                Name:<font color="#990000">*</font> </div></td>
                            <td colspan="2" valign="top" class="vertical" ><input type="text" name="middle_name" id="Middle name"></td>
                            <td valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="lname"> 
                            <td height="32" valign="top" class="vertical" id=main_content><div align="left">Last 
                                Name:<font color="#990000">*</font></div></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input type="text" name="last_name" id="Last name"></td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="birthdate"> 
                            <td height="32" valign="top" class="vertical" id=main_content><div align="left">Birth 
                                date :<font color="#990000">* </font></div></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select name="birth_date" id="Birth date" style="width:42px;">
                                <option selected value="01">1</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="02">2</option>
                                <option value="03">3</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="04">4</option>
                                <option value="05">5</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="06">6</option>
                                <option value="07">7</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="08">8</option>
                                <option value="09">9</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="10">10</option>
                                <option value="11">11</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="12">12</option>
                                <option value="13">13</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="14">14</option>
                                <option value="15">15</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="16">16</option>
                                <option value="17">17</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="18">18</option>
                                <option value="19">19</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="20">20</option>
                                <option value="21">21</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="22">22</option>
                                <option value="23">23</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="24">24</option>
                                <option value="25">25</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="26">26</option>
                                <option value="27">27</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="28">28</option>
                                <option value="29">29</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="30">30</option>
                                <option value="31">31</option>
                              </select> <select onFocus="comment(2);" name="birth_month" style="width:90px;">
                                <option selected value="01">January</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="02">February</option>
                                <option value="03">March</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="04">April</option>
                                <option value="05">May</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="06">June</option>
                                <option value="07">July</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="08">August</option>
                                <option value="09">September</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="10">October</option>
                                <option value="11">November</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="12">December</option>
                              </select> <select name="birth_year" id="Birth year" style="width:60px;" onChange="validate_year(this.value)">
                                <option value="2007" selected> 2007 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="2006"  > 
                                2006 </option>
                                <option  value="2005"  > 2005 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="2004"  > 
                                2004 </option>
                                <option  value="2003"  > 2003 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="2002"  > 
                                2002 </option>
                                <option  value="2001"  > 2001 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="2000"  > 
                                2000 </option>
                                <option  value="1999"  > 1999 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1998"  > 
                                1998 </option>
                                <option  value="1997"  > 1997 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1996"  > 
                                1996 </option>
                                <option  value="1995"  > 1995 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1994"  > 
                                1994 </option>
                                <option  value="1993"  > 1993 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1992"  > 
                                1992 </option>
                                <option  value="1991"  > 1991 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1990"  > 
                                1990 </option>
                                <option  value="1989"  > 1989 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1988"  > 
                                1988 </option>
                                <option  value="1987"  > 1987 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1986"  > 
                                1986 </option>
                                <option  value="1985"  > 1985 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1984"  > 
                                1984 </option>
                                <option  value="1983"  > 1983 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1982"  > 
                                1982 </option>
                                <option  value="1981"  > 1981 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1980"  > 
                                1980 </option>
                                <option  value="1979"  > 1979 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1978"  > 
                                1978 </option>
                                <option  value="1977"  > 1977 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1976"  > 
                                1976 </option>
                                <option  value="1975"  > 1975 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1974"  > 
                                1974 </option>
                                <option  value="1973"  > 1973 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1972"  > 
                                1972 </option>
                                <option  value="1971"  > 1971 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1970"  > 
                                1970 </option>
                                <option  value="1969"  > 1969 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1968"  > 
                                1968 </option>
                                <option  value="1967"  > 1967 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1966"  > 
                                1966 </option>
                                <option  value="1965"  > 1965 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1964"  > 
                                1964 </option>
                                <option  value="1963"  > 1963 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1962"  > 
                                1962 </option>
                                <option  value="1961"  > 1961 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1960"  > 
                                1960 </option>
                                <option  value="1959"  > 1959 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1958"  > 
                                1958 </option>
                                <option  value="1957"  > 1957 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1956"  > 
                                1956 </option>
                                <option  value="1955"  > 1955 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1954"  > 
                                1954 </option>
                                <option  value="1953"  > 1953 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1952"  > 
                                1952 </option>
                                <option  value="1951"  > 1951 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1950"  > 
                                1950 </option>
                                <option  value="1949"  > 1949 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1948"  > 
                                1948 </option>
                                <option  value="1947"  > 1947 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1946"  > 
                                1946 </option>
                                <option  value="1945"  > 1945 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1944"  > 
                                1944 </option>
                                <option  value="1943"  > 1943 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1942"  > 
                                1942 </option>
                                <option  value="1941"  > 1941 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1940"  > 
                                1940 </option>
                                <option  value="1939"  > 1939 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1938"  > 
                                1938 </option>
                                <option  value="1937"  > 1937 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1936"  > 
                                1936 </option>
                                <option  value="1935"  > 1935 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1934"  > 
                                1934 </option>
                                <option  value="1933"  > 1933 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1932"  > 
                                1932 </option>
                                <option  value="1931"  > 1931 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1930"  > 
                                1930 </option>
                                <option  value="1929"  > 1929 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1928"  > 
                                1928 </option>
                                <option  value="1927"  > 1927 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1926"  > 
                                1926 </option>
                                <option  value="1925"  > 1925 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1924"  > 
                                1924 </option>
                                <option  value="1923"  > 1923 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1922"  > 
                                1922 </option>
                                <option  value="1921"  > 1921 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1920"  > 
                                1920 </option>
                                <option  value="1919"  > 1919 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1918"  > 
                                1918 </option>
                                <option  value="1917"  > 1917 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1916"  > 
                                1916 </option>
                                <option  value="1915"  > 1915 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1914"  > 
                                1914 </option>
                                <option  value="1913"  > 1913 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1912"  > 
                                1912 </option>
                                <option  value="1911"  > 1911 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1910"  > 
                                1910 </option>
                                <option  value="1909"  > 1909 </option>
                                <option  style="BACKGROUND-COLOR: #f0f5f7;" value="1908"  > 
                                1908 </option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="guardian_name" style="display:none"> 
                            <td height="32" valign="top" class="vertical" id=main_content><div align="left">Guardian 
                                name :</div></td>
                            <td colspan="2" valign="top" class="vertical"><input name="guardian" id="Your Guardian" type="text"></td>
                          </tr>
                          <tr id="gender"> 
                            <td height="32" valign="top" class="vertical" id=main_content ><div align="left">Gender 
                                :<font color="#990000">*</font></div></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select name="gender" id="Gender" style="width:200px;">
                                <option value="0" >Select gender</option>
                                <option value="Male" selected style="BACKGROUND-COLOR: #f0f5f7;" >Male</option>
                                <option value="Female" >Female</option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="nationality"> 
                            <td height="32" valign="top" class="vertical" id=main_content>Nationality 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select name="nationality" id="Nationality" style="width:200px;">
                                <option value="0" >Select Country</option>
                                <option value="Afghanistan" style="BACKGROUND-COLOR: #f0f5f7;"  >Afghanistan</option>
                                <option value="Albania"  >Albania</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Algeria"  >Algeria</option>
                                <option value="American Samoa"  >American Samoa</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Andorra"  >Andorra</option>
                                <option value="Angola"  >Angola</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Anguilla" >Anguilla</option>
                                <option value="Antarctica" >Antarctica</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Antigua and Barbuda" >Antigua 
                                and Barbuda</option>
                                <option value="Argentina" >Argentina</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Armenia" >Armenia</option>
                                <option value="Aruba" >Aruba</option>
                                <option value="Ascension" >Ascension</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Australia" >Australia</option>
                                <option value="Austria" >Austria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Azerbaijan" >Azerbaijan</option>
                                <option value="Bahamas" >Bahamas</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Bahrain" >Bahrain</option>
                                <option value="Bangladesh" >Bangladesh</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Barbados" >Barbados</option>
                                <option value="Belarus" >Belarus</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Belgium" >Belgium</option>
                                <option value="Belize" >Belize</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Benin" >Benin</option>
                                <option value="Bermuda" >Bermuda</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Bolivia" >Bolivia</option>
                                <option value="Bosnia" >Bosnia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Botswana" >Botswana</option>
                                <option value="Bouvet Island" >Bouvet Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Brazil" >Brazil</option>
                                <option value="British Virgin Is." >British Virgin 
                                Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Brunei" >Brunei</option>
                                <option value="Bulgaria" >Bulgaria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Burkina Faso">Burkina 
                                Faso</option>
                                <option value="Burundi" >Burundi</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cambodia">Cambodia</option>
                                <option value="Cameroon" >Cameroon</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Canada" >Canada</option>
                                <option value="Cape Verde Is." >Cape Verde Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cayman Islands" >Cayman 
                                Islands</option>
                                <option value="Central African" >Central African</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Chad"  >Chad</option>
                                <option value="China" >China</option>
                                <option value="Chile" >Chile</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Christmas and Cocos Is." >Christmas 
                                and Cocos Is.</option>
                                <option value="Cocos (Keeling) Is." >Cocos (Keeling) 
                                Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Colombia" >Colombia</option>
                                <option value="Comoros" >Comoros</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Congo (DRC)" >Congo 
                                (DRC)</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Congo" >Congo</option>
                                <option value="Cook Islands" >Cook Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Costa Rica" >Costa 
                                Rica</option>
                                <option value="Cote DIvoire" >Cote DIvoire</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Croatia" >Croatia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cuba" >Cuba</option>
                                <option value="Cyprus" >Cyprus</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Czech Rep." >Czech 
                                Rep.</option>
                                <option value="Denmark" >Denmark</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Diego Garcia" >Diego 
                                Garcia</option>
                                <option value="Djibouti" >Djibouti</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Dominica" >Dominica</option>
                                <option value="Dominican Rep." >Dominican Rep.</option>
                                <option value="East Timor" style="BACKGROUND-COLOR: #f0f5f7;" >East 
                                Timor</option>
                                <option value="Ecuador" >Ecuador</option>
                                <option value="Egypt" style="BACKGROUND-COLOR: #f0f5f7;" >Egypt</option>
                                <option value="El Salvador" >El Salvador</option>
                                <option value="Equatorial Guinea" style="BACKGROUND-COLOR: #f0f5f7;" >Equatorial 
                                Guinea</option>
                                <option value="Eritrea" >Eritrea</option>
                                <option value="Estonia" style="BACKGROUND-COLOR: #f0f5f7;" >Estonia</option>
                                <option value="Ethiopia" selected >Ethiopia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Falkland Islands" >Falkland 
                                Islands</option>
                                <option value="Faroe Islands" >Faroe Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Fiji Islands" >Fiji 
                                Islands</option>
                                <option value="Finland" >Finland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="France" >France</option>
                                <option value="French Antilles" >French Antilles</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="French Guiana" >French 
                                Guiana</option>
                                <option value="French Polynesia" >French Polynesia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gabon" >Gabon</option>
                                <option value="Gabon Rep." >Gabon Rep.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gambia" >Gambia</option>
                                <option value="Georgia" >Georgia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Germany" >Germany</option>
                                <option value="Ghana" >Ghana</option>>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gibraltar" >Gibraltar</option>
                                <option value="Greece" >Greece</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Greenland" >Greenland</option>
                                <option value="Grenada" >Grenada</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guadeloupe" >Guadeloupe</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guernsey" >Guernsey</option>
                                <option value="Guam" >Guam</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guantanamo Bay" >Guantanamo 
                                Bay</option>
                                <option value="Guatemala" >Guatemala</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guinea" >Guinea</option>
                                <option value="GuineaBissau" >GuineaBissau</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guyana" >Guyana</option>
                                <option value="Haiti" >Haiti</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Heard and McDonald Is." >Heard 
                                and McDonald Is.</option>
                                <option value="Honduras" >Honduras</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Hong Kong, SAR" >Hong 
                                Kong, SAR</option>
                                <option value="Hungary" >Hungary</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Hungary" >Iceland</option>
                                <option value="India" >India</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Indonesia" >Indonesia</option>
                                <option value="Iran" >Iran</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Iraq" >Iraq</option>
                                <option value="Ireland" >Ireland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Israel" >Israel</option>
                                <option value="Italy" >Italy</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Jamaica" >Jamaica</option>
                                <option value="Japan" >Japan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Jordan" >Jordan</option>
                                <option value="Kazakhstan" >Kazakhstan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Kenya" >Kenya</option>
                                <option value="Kiribati" >Kiribati</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Korea, North" >Korea, 
                                North</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Korea, South" >Korea, 
                                South</option>
                                <option value="Kuwait" >Kuwait</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Kyrgyzstan" >Kyrgyzstan</option>
                                <option value="Lao" >Lao</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Latvia" >Latvia</option>
                                <option value="Lebanon" >Lebanon</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Lesotho" >Lesotho</option>
                                <option value="Liberia" >Liberia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Libya" >Libya</option>
                                <option value="Liechtenstein" >Liechtenstein</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Lithuania" >Lithuania</option>
                                <option value="Luxembourg" >Luxembourg</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Macau" >Macau</option>
                                <option value="Macedonia" >Macedonia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Madagascar" >Madagascar</option>
                                <option value="Malawi" >Malawi</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Malaysia" >Malaysia</option>
                                <option value="Maldives" >Maldives</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mali Republic" >Mali 
                                Republic</option>
                                <option value="Malta" >Malta</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Marshall Islands" >Marshall 
                                Islands</option>
                                <option value="Martinique" >Martinique</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mauritania" >Mauritania</option>
                                <option value="Mauritius" >Mauritius</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mayotte Island" >Mayotte 
                                Island</option>
                                <option value="Mexico" >Mexico</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Micronesia" >Micronesia</option>
                                <option value="Moldova" >Moldova</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Monaco" >Monaco</option>
                                <option value="Mongolia" >Mongolia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Montserrat" >Montserrat</option>
                                <option value="Morocco" >Morocco</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mozambique" >Mozambique</option>
                                <option value="Myanmar" >Myanmar</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Namibia" >Namibia</option>
                                <option value="Nauru" >Nauru</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Nepal" >Nepal</option>
                                <option value="Netherlands" >Netherlands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Netherlands Antilles" >Netherlands 
                                Antilles</option>
                                <option value="New Caledonia" >New Caledonia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="New Zealand" >New 
                                Zealand</option>
                                <option value="Nicaragua" >Nicaragua</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Niger Republic" >Niger 
                                Republic</option>
                                <option value="Nigeria" >Nigeria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Niue" >Niue</option>
                                <option value="Norfolk Island" >Norfolk Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Northern Mariana Islands" >Northern 
                                Mariana Islands</option>
                                <option value="Norway" >Norway</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Oman" >Oman</option>
                                <option value="Pakistan" >Pakistan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Palau" >Palau</option>
                                <option value="Panama" >Panama</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Papua New Guinea" >Papua 
                                New Guinea</option>
                                <option value="Paraguay" >Paraguay</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Peru" >Peru</option>
                                <option value="Philippines" >Philippines</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Pitcairin" >Pitcairin</option>
                                <option value="Poland" >Poland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Portugal" >Portugal</option>
                                <option value="Puerto Rico" >Puerto Rico</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Qatar" >Qatar</option>
                                <option value="Reunion Island" >Reunion Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Romania" >Romania</option>
                                <option value="Russian Federation" >Russian Federation</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Rwanda" >Rwanda</option>
                                <option value="Saint Kitts and Nevis" >Saint Kitts 
                                and Nevis</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Saint Lucia" >Saint 
                                Lucia</option>
                                <option value="Saint Vincent and the Grenadines" >Saint 
                                Vincent and the Grenadines</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Samoa" >Samoa</option>
                                <option value="San Marino" >San Marino</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Sao Tome and Principe" >Sao 
                                Tome and Principe</option>
                                <option value="Saudi Arabia" >Saudi Arabia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Senegal Republic" >Senegal 
                                Republic</option>
                                <option value="Serbia and Montenegro" >Serbia 
                                and Montenegro</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Seychelles Islands" >Seychelles 
                                Islands</option>
                                <option value="Sierra Leone" >Sierra Leone</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Singapore" >Singapore</option>
                                <option value="Slovakia" >Slovakia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Slovenia" >Slovenia</option>
                                <option value="Solomon Islands" >Solomon Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Somalia" >Somalia</option>
                                <option value="South Africa" >South Africa</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="South Georgia and the South Sandwich Island" >South 
                                Georgia and the South Sandwich Island</option>
                                <option value="Spain" >Spain</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Sri Lanka" >Sri 
                                Lanka</option>
                                <option value="St. Helena" >St. Helena</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="St. Pierre and Miquelon" >St. 
                                Pierre and Miquelon</option>
                                <option value="Sudan" >Sudan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Suriname" >Suriname</option>
                                <option value="Svalbard and Jan Mayen Islands" >Svalbard 
                                and Jan Mayen Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Swaziland" >Swaziland</option>
                                <option value="Sweden" >Sweden</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Switzerland" >Switzerland</option>
                                <option value="Syrian Arab Republic" >Syrian Arab 
                                Republic</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Taiwan" >Taiwan</option>
                                <option value="Tajikistan" >Tajikistan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tanzania" >Tanzania</option>
                                <option value="Thailand" >Thailand</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Togo" >Togo</option>
                                <option value="Tokelau" >Tokelau</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tonga Islands" >Tonga 
                                Islands</option>
                                <option value="Trinidad and Tobago" >Trinidad 
                                and Tobago</option>
                                <option value="Triston da cunha" > Triston da 
                                cunha </option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tunisia" >Tunisia</option>
                                <option value="Turkey" >Turkey</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Turkmenistan" >Turkmenistan</option>
                                <option value="Turks and Caicos Islands" >Turks 
                                and Caicos Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tuvalu" >Tuvalu</option>
                                <option value="Uganda" >Uganda</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Ukrainian SSR" >Ukrainian 
                                SSR</option>
                                <option value="United Arab Emirates" >United Arab 
                                Emirates</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="United Kingdom" >United 
                                Kingdom</option>
                                <option value="United States" >United States</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="United States Minor Outlying Islands" >United 
                                States Minor Outlying Islands</option>
                                <option value="Uruguay" >Uruguay</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Uzbekistan" >Uzbekistan</option>
                                <option value="Vanuatu" >Vanuatu</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Vatican City" >Vatican 
                                City</option>
                                <option value="Venezuela" >Venezuela</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Vietnam" >Vietnam</option>
                                <option value="Virgin Islands(British)" >Virgin 
                                Islands(British)</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Virgin Islands(U.S.)" >Virgin 
                                Islands(U.S.)</option>
                                <option value="Wallis and Futuna Islands" >Wallis 
                                and Futuna Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Western Sahara" >Western 
                                Sahara</option>
                                <option value="Yemen" >Yemen</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Yugoslavia" >Yugoslavia</option>
                                <option value="Zaire" >Zaire</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Zambia" >Zambia</option>
                                <option value="Zimbabwe" >Zimbabwe</option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Valid 
                              ID No :</td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input name ="id_number" type="text" id="ID number" style="width:197px;" value="" maxlength="20" > 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="benname"> 
                            <td height="32" valign="top" class="vertical" id=main_content>Beneficiary 
                              Name :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input name ="benificiary_name" type="text" id="Benificiary name" style="width:197px;" value="" maxlength="20" ></td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr id="benrel"> 
                            <td height="32" valign="top" class="vertical" id=main_content>Relationship 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select name="relationship" id="Relationship to beneficiary"  style="width:200px;">
                                <option value="0" >Select Relationship</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Brother"  >Brother</option>
                                <option value="Daughter" >Daughter</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Father" >Father</option>
                                <option value="Mother" selected >Mother</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Other" > 
                                Other</option>
                                <option value="Sister" >Sister</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Son" >Son</option>
                                <option value="Spouse" >Spouse</option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr bgcolor="#CCCCCC"> 
                            <td height="32" colspan="4" valign="top" class="vertical" id=main_content><font size="4" id=main_content>Contact 
                              Address </font></td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Country 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select name="country" id="Country" style="width:200px"; >
                                <option value="0" >Select Country</option>
                                <option value="Afghanistan" style="BACKGROUND-COLOR: #f0f5f7;"  >Afghanistan</option>
                                <option value="Albania"  >Albania</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Algeria"  >Algeria</option>
                                <option value="American Samoa"  >American Samoa</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Andorra"  >Andorra</option>
                                <option value="Angola"  >Angola</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Anguilla" >Anguilla</option>
                                <option value="Antarctica" >Antarctica</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Antigua and Barbuda" >Antigua 
                                and Barbuda</option>
                                <option value="Argentina" >Argentina</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Armenia" >Armenia</option>
                                <option value="Aruba" >Aruba</option>
                                <option value="Ascension" >Ascension</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Australia" >Australia</option>
                                <option value="Austria" >Austria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Azerbaijan" >Azerbaijan</option>
                                <option value="Bahamas" >Bahamas</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Bahrain" >Bahrain</option>
                                <option value="Bangladesh" >Bangladesh</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Barbados" >Barbados</option>
                                <option value="Belarus" >Belarus</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Belgium" >Belgium</option>
                                <option value="Belize" >Belize</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Benin" >Benin</option>
                                <option value="Bermuda" >Bermuda</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Bolivia" >Bolivia</option>
                                <option value="Bosnia" >Bosnia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Botswana" >Botswana</option>
                                <option value="Bouvet Island" >Bouvet Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Brazil" >Brazil</option>
                                <option value="British Virgin Is." >British Virgin 
                                Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Brunei" >Brunei</option>
                                <option value="Bulgaria" >Bulgaria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Burkina Faso">Burkina 
                                Faso</option>
                                <option value="Burundi" >Burundi</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cambodia">Cambodia</option>
                                <option value="Cameroon" >Cameroon</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Canada" >Canada</option>
                                <option value="Cape Verde Is." >Cape Verde Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cayman Islands" >Cayman 
                                Islands</option>
                                <option value="Central African" >Central African</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Chad"  >Chad</option>
                                <option value="China" >China</option>
                                <option value="Chile" >Chile</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Christmas and Cocos Is." >Christmas 
                                and Cocos Is.</option>
                                <option value="Cocos (Keeling) Is." >Cocos (Keeling) 
                                Is.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Colombia" >Colombia</option>
                                <option value="Comoros" >Comoros</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Congo (DRC)" >Congo 
                                (DRC)</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Congo" >Congo</option>
                                <option value="Cook Islands" >Cook Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Costa Rica" >Costa 
                                Rica</option>
                                <option value="Cote DIvoire" >Cote DIvoire</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Croatia" >Croatia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Cuba" >Cuba</option>
                                <option value="Cyprus" >Cyprus</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Czech Rep." >Czech 
                                Rep.</option>
                                <option value="Denmark" >Denmark</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Diego Garcia" >Diego 
                                Garcia</option>
                                <option value="Djibouti" >Djibouti</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Dominica" >Dominica</option>
                                <option value="Dominican Rep." >Dominican Rep.</option>
                                <option value="East Timor" style="BACKGROUND-COLOR: #f0f5f7;" >East 
                                Timor</option>
                                <option value="Ecuador" >Ecuador</option>
                                <option value="Egypt" style="BACKGROUND-COLOR: #f0f5f7;" >Egypt</option>
                                <option value="El Salvador" >El Salvador</option>
                                <option value="Equatorial Guinea" style="BACKGROUND-COLOR: #f0f5f7;" >Equatorial 
                                Guinea</option>
                                <option value="Eritrea" >Eritrea</option>
                                <option value="Estonia" style="BACKGROUND-COLOR: #f0f5f7;" >Estonia</option>
                                <option value="Ethiopia" selected >Ethiopia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Falkland Islands" >Falkland 
                                Islands</option>
                                <option value="Faroe Islands" >Faroe Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Fiji Islands" >Fiji 
                                Islands</option>
                                <option value="Finland" >Finland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="France" >France</option>
                                <option value="French Antilles" >French Antilles</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="French Guiana" >French 
                                Guiana</option>
                                <option value="French Polynesia" >French Polynesia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gabon" >Gabon</option>
                                <option value="Gabon Rep." >Gabon Rep.</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gambia" >Gambia</option>
                                <option value="Georgia" >Georgia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Germany" >Germany</option>
                                <option value="Ghana" >Ghana</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Gibraltar" >Gibraltar</option>
                                <option value="Greece" >Greece</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Greenland" >Greenland</option>
                                <option value="Grenada" >Grenada</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guadeloupe" >Guadeloupe</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guernsey" >Guernsey</option>
                                <option value="Guam" >Guam</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guantanamo Bay" >Guantanamo 
                                Bay</option>
                                <option value="Guatemala" >Guatemala</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guinea" >Guinea</option>
                                <option value="GuineaBissau" >GuineaBissau</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Guyana" >Guyana</option>
                                <option value="Haiti" >Haiti</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Heard and McDonald Is." >Heard 
                                and McDonald Is.</option>
                                <option value="Honduras" >Honduras</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Hong Kong, SAR" >Hong 
                                Kong, SAR</option>
                                <option value="Hungary" >Hungary</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Hungary" >Iceland</option>
                                <option value="India" >India</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Indonesia" >Indonesia</option>
                                <option value="Iran" >Iran</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Iraq" >Iraq</option>
                                <option value="Ireland" >Ireland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Israel" >Israel</option>
                                <option value="Italy" >Italy</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Jamaica" >Jamaica</option>
                                <option value="Japan" >Japan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Jordan" >Jordan</option>
                                <option value="Kazakhstan" >Kazakhstan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Kenya" >Kenya</option>
                                <option value="Kiribati" >Kiribati</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Korea, North" >Korea, 
                                North</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Korea, South" >Korea, 
                                South</option>
                                <option value="Kuwait" >Kuwait</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Kyrgyzstan" >Kyrgyzstan</option>
                                <option value="Lao" >Lao</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Latvia" >Latvia</option>
                                <option value="Lebanon" >Lebanon</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Lesotho" >Lesotho</option>
                                <option value="Liberia" >Liberia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Libya" >Libya</option>
                                <option value="Liechtenstein" >Liechtenstein</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Lithuania" >Lithuania</option>
                                <option value="Luxembourg" >Luxembourg</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Macau" >Macau</option>
                                <option value="Macedonia" >Macedonia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Madagascar" >Madagascar</option>
                                <option value="Malawi" >Malawi</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Malaysia" >Malaysia</option>
                                <option value="Maldives" >Maldives</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mali Republic" >Mali 
                                Republic</option>
                                <option value="Malta" >Malta</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Marshall Islands" >Marshall 
                                Islands</option>
                                <option value="Martinique" >Martinique</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mauritania" >Mauritania</option>
                                <option value="Mauritius" >Mauritius</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mayotte Island" >Mayotte 
                                Island</option>
                                <option value="Mexico" >Mexico</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Micronesia" >Micronesia</option>
                                <option value="Moldova" >Moldova</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Monaco" >Monaco</option>
                                <option value="Mongolia" >Mongolia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Montserrat" >Montserrat</option>
                                <option value="Morocco" >Morocco</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Mozambique" >Mozambique</option>
                                <option value="Myanmar" >Myanmar</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Namibia" >Namibia</option>
                                <option value="Nauru" >Nauru</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Nepal" >Nepal</option>
                                <option value="Netherlands" >Netherlands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Netherlands Antilles" >Netherlands 
                                Antilles</option>
                                <option value="New Caledonia" >New Caledonia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="New Zealand" >New 
                                Zealand</option>
                                <option value="Nicaragua" >Nicaragua</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Niger Republic" >Niger 
                                Republic</option>
                                <option value="Nigeria" >Nigeria</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Niue" >Niue</option>
                                <option value="Norfolk Island" >Norfolk Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Northern Mariana Islands" >Northern 
                                Mariana Islands</option>
                                <option value="Norway" >Norway</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Oman" >Oman</option>
                                <option value="Pakistan" >Pakistan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Palau" >Palau</option>
                                <option value="Panama" >Panama</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Papua New Guinea" >Papua 
                                New Guinea</option>
                                <option value="Paraguay" >Paraguay</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Peru" >Peru</option>
                                <option value="Philippines" >Philippines</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Pitcairin" >Pitcairin</option>
                                <option value="Poland" >Poland</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Portugal" >Portugal</option>
                                <option value="Puerto Rico" >Puerto Rico</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Qatar" >Qatar</option>
                                <option value="Reunion Island" >Reunion Island</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Romania" >Romania</option>
                                <option value="Russian Federation" >Russian Federation</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Rwanda" >Rwanda</option>
                                <option value="Saint Kitts and Nevis" >Saint Kitts 
                                and Nevis</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Saint Lucia" >Saint 
                                Lucia</option>
                                <option value="Saint Vincent and the Grenadines" >Saint 
                                Vincent and the Grenadines</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Samoa" >Samoa</option>
                                <option value="San Marino" >San Marino</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Sao Tome and Principe" >Sao 
                                Tome and Principe</option>
                                <option value="Saudi Arabia" >Saudi Arabia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Senegal Republic" >Senegal 
                                Republic</option>
                                <option value="Serbia and Montenegro" >Serbia 
                                and Montenegro</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Seychelles Islands" >Seychelles 
                                Islands</option>
                                <option value="Sierra Leone" >Sierra Leone</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Singapore" >Singapore</option>
                                <option value="Slovakia" >Slovakia</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Slovenia" >Slovenia</option>
                                <option value="Solomon Islands" >Solomon Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Somalia" >Somalia</option>
                                <option value="South Africa" >South Africa</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="South Georgia and the South Sandwich Island" >South 
                                Georgia and the South Sandwich Island</option>
                                <option value="Spain" >Spain</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Sri Lanka" >Sri 
                                Lanka</option>
                                <option value="St. Helena" >St. Helena</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="St. Pierre and Miquelon" >St. 
                                Pierre and Miquelon</option>
                                <option value="Sudan" >Sudan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Suriname" >Suriname</option>
                                <option value="Svalbard and Jan Mayen Islands" >Svalbard 
                                and Jan Mayen Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Swaziland" >Swaziland</option>
                                <option value="Sweden" >Sweden</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Switzerland" >Switzerland</option>
                                <option value="Syrian Arab Republic" >Syrian Arab 
                                Republic</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Taiwan" >Taiwan</option>
                                <option value="Tajikistan" >Tajikistan</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tanzania" >Tanzania</option>
                                <option value="Thailand" >Thailand</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Togo" >Togo</option>
                                <option value="Tokelau" >Tokelau</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tonga Islands" >Tonga 
                                Islands</option>
                                <option value="Trinidad and Tobago" >Trinidad 
                                and Tobago</option>
                                <option value="Triston da cunha" > Triston da 
                                cunha </option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tunisia" >Tunisia</option>
                                <option value="Turkey" >Turkey</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Turkmenistan" >Turkmenistan</option>
                                <option value="Turks and Caicos Islands" >Turks 
                                and Caicos Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Tuvalu" >Tuvalu</option>
                                <option value="Uganda" >Uganda</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Ukrainian SSR" >Ukrainian 
                                SSR</option>
                                <option value="United Arab Emirates" >United Arab 
                                Emirates</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="United Kingdom" >United 
                                Kingdom</option>
                                <option value="United States" >United States</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="United States Minor Outlying Islands" >United 
                                States Minor Outlying Islands</option>
                                <option value="Uruguay" >Uruguay</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Uzbekistan" >Uzbekistan</option>
                                <option value="Vanuatu" >Vanuatu</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Vatican City" >Vatican 
                                City</option>
                                <option value="Venezuela" >Venezuela</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Vietnam" >Vietnam</option>
                                <option value="Virgin Islands(British)" >Virgin 
                                Islands(British)</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Virgin Islands(U.S.)" >Virgin 
                                Islands(U.S.)</option>
                                <option value="Wallis and Futuna Islands" >Wallis 
                                and Futuna Islands</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Western Sahara" >Western 
                                Sahara</option>
                                <option value="Yemen" >Yemen</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Yugoslavia" >Yugoslavia</option>
                                <option value="Zaire" >Zaire</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Zambia" >Zambia</option>
                                <option value="Zimbabwe" >Zimbabwe</option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>City 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input onFocus="comment(3);" name="town_or_city" type="text" id="City"  style="width:200px" value="" maxlength="20";> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Subcity/Province 
                              :</td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input onFocus="comment(3);" name="state_or_province" id="Subcity or Province" type="text"  style="width:200px" value="" maxlength="20";> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Address 
                              :</td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input onFocus="comment(3);" maxlength="50" name="address1" type="text" id="Address"  style="width:200px" value=""> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Postal/Zip 
                              Code :<span class="style1"><font color="#990000">*</font></span></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input onFocus="comment(3);" name="pobox" id="Pobox" type="text"  style="width:200px" value="" maxlength="20";> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr bgcolor="#CCCCCC"> 
                            <td height="32" colspan="4" valign="top" class="vertical" id=main_content><font size="4">Contact 
                              Detail </font></td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Home 
                              Phone No :</td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input  name="home_phone_number" id="Home phone number" type="text"  style="width:200px" value="" maxlength="12";> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Office 
                              Phone No :</td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input onFocus="comment(4);" name="office_phone_number" id="Office phone number" type="text"  style="width:200px" value="" maxlength="12" ;> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="12" valign="top" class="vertical" id=main_content>Mobile 
                              Phone No :</td>
                            <td height="12" colspan="2" valign="top" class="vertical" ><input onFocus="comment(4);" name="mobile_phone_number" id="Mobile phone number" type="text"  style="width:200px" value="" maxlength="12";> 
                              &nbsp;</td>
                            <td height="32" rowspan="3" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="18" valign="top" class="vertical" id=main_content>Bank 
                              Account:</td>
                            <td height="18" colspan="2" valign="top" class="vertical" ><p> 
                                <input name="bank_account" type="text" id="Bank Account"  style="width:200px" onFocus="comment(4);" value="" maxlength="40";>
                              </p></td>
                          </tr>
                          <tr> 
                            <td height="19" valign="top" class="vertical" id=main_content><!--DWLayoutEmptyCell-->&nbsp;</td>
                            <td height="19" colspan="2" valign="top" bgcolor="#CCCCCC" class="vertical" ><font color="#990000" size="2">*Give 
                              Bank name,Branch and accout No. </font></td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>E-Mail 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input id="Email" onFocus="comment(4);" name="email" type="text"  style="width:200px" value="" maxlength="40";> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr bgcolor="#CCCCCC"> 
                            <td height="32" colspan="4" valign="top" class="vertical" id=main_content><font size="4">Security</font></td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Password 
                              :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input id="Password" style="width:200px;" type="password" name="password" maxlength="30" size="32" onFocus="comment(5);"> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Confirm 
                              Password :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input  type="password" id="Password Confirmation"  name="confirm_password" style="width:200px" size="32" maxlength="30" > 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr bgcolor="#CCCCCC"> 
                            <td height="32" colspan="4" valign="top" class="vertical" id=main_content><font size="4">If 
                              You Forget Your Password</font></td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Security 
                              Question :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><select id="Security Question" name="password_question">
                                <option value="0">Select your question</option>
                                <option value="What is your best friend name?" selected style="BACKGROUND-COLOR: #f0f5f7;" >What 
                                is your best friend name?</option>
                                <option value="What is your favourite food?" >What 
                                is your favourite food? </option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="What is your high school name?" >What 
                                is your high school name?</option>
                                <option value="What is your pet name?" >What is 
                                your pet name?</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="What is your special moment?" >What 
                                is your special moment? </option>
                                <option value="What was the name of your first school?" >What 
                                was the name of your first school?</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Who was your childhood hero?" >Who 
                                was your childhood hero?</option>
                                <option value="What is your favorite pastime?" >What 
                                is your favorite pastime?</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="What is your all-time favorite sports team?" >What 
                                is your all-time favorite sports team?</option>
                                <option value="What was your high school mascot?" >What 
                                was your high school mascot?</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="What make was your first car or bike?" >What 
                                make was your first car or bike?</option>
                                <option value="Where did you first meet your spouse?" >Where 
                                did you first meet your spouse?</option>
                                <option style="BACKGROUND-COLOR: #f0f5f7;" value="Other question" >Other 
                                question </option>
                              </select> &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" valign="top" class="vertical" id=main_content>Your 
                              answer :<font color="#990000">*</font></td>
                            <td height="32" colspan="2" valign="top" class="vertical" ><input id="Security Answer" style="width:254px" name="password_answer" type ="text" value="" size="32" maxlength="30"> 
                              &nbsp;</td>
                            <td height="32" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" colspan="4" valign="top" class="vertical" ><div align="justify"> 
                                <input type="checkbox" name="agreement"  id="agreement"onClick="IRagreement()">
                                <label for="agreement"><font size="2">I have read 
                                and agreed to the </font></label>
                                <font size="2"><b><a href="/Resource/SEDNet PLC P&P - 1.2.0.pdf" target="_blank">Policy 
                                and Procedures.</a></b>&nbsp;</font></div></td>
                          </tr>
                          <tr> 
                            <td height="32" colspan="4" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                          <tr> 
                            <td height="32" colspan="4" valign="top" class="vertical" ><table width="101%" border="0">
                                <tr> 
                                  <td width="12%">&nbsp;</td>
                                  <td width="22%"><input name="Cont" disabled type="Submit" value="Continue" size="20" align="left" onClick="MM_validateForm('First name','','R','Middle name','','R','Last name','','R','Benificiary name','','R','City','','R','Pobox','','R','Home phone number','','NisNum','Office phone number','','NisNum','Mobile phone number','','NisNum','Email','','RisEmail','Security Answer','','R','Password','','R','Password Confirmation','','R');return document.MM_returnValue""></td>
                                  <td> <input name="reset" type="reset" value="  Reset  " size="30" align="middle"></td>
                                  <td><input name="submit" type="submit" value="Cancel"></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr> 
                            <td height="117" colspan="4" valign="top" class="vertical" ><!--DWLayoutEmptyCell-->&nbsp;</td>
                          </tr>
                        </table>
									</fieldset>
								  </form></td>
							  </tr>
							</table></TD>
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
						style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;&nbsp;DarNet, 
                &nbsp;&nbsp;All Rights Reserved</SPAN> </TD>
						</TR>
					  </TBODY>
					</TABLE></TD>
				</TR>
			  </TBODY>
			</TABLE>
			</body>
			</html>
			
			<?php
			
			$_SESSION['salutation']=$_POST['title'];
			
			$_SESSION['first_name']=$_POST['first_name'];
			$_SESSION['middle_name']=$_POST['middle_name'];
			$_SESSION['last_name']=$_POST['last_name'];
			$_SESSION['birth_date']=$_POST['birth_date'];
			$_SESSION['birth_month']=$_POST['birth_month'];
			$_SESSION['birth_year']=$_POST['birth_year'] ;
			 $_SESSION['gender']=$_POST['gender'] ;
			 $_SESSION['nationality']=$_POST['nationality'] ;
			$_SESSION['occupation']= $_POST['occupation'] ;
			 $_SESSION['id_number']=$_POST['id_number'] ;
			$_SESSION['benificiary_name']= $_POST['benificiary_name'] ;
			$_SESSION['relationship']= $_POST['relationship'] ;
			$_SESSION['country']= $_POST['country'] ;
			$_SESSION['town_or_city']= $_POST['town_or_city'] ;
			$_SESSION['state_or_province']= $_POST['state_or_province'] ;
			$_SESSION['address1']= $_POST['address1'] ;
			$_SESSION['pobox']= $_POST['pobox'] ;
			$_SESSION['home_phone_number']= $_POST['home_phone_number'] ;
			$_SESSION['office_phone_number']= $_POST['office_phone_number'] ;
			$_SESSION['mobile_phone_number']= $_POST['mobile_phone_number'] ;
			$_SESSION['bank_account']= $_POST['bank_account'] ;
			
			$_SESSION['password']= $_POST['password'] ;
			$_SESSION['password_question']= $_POST['password_question'] ;
			$_SESSION['password_answer']= $_POST['password_answer'] ;
			$_SESSION['email']= $_POST['email'] ;
			
   }
  else
  
   {
   
  header("location:referrer_registration.php?ermsg=Sorry, You have to have a referrer inorder to get registered!");
 
   }
   
  ?> 	  		
       