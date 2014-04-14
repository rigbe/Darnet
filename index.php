<?php

 if(!file_exists("dbinterface/dbhandler.php"))
   {   
    //header("Location:intro.html");
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<title>DarNet Binary System - WelCome</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		</head>
		
		<body background="page_bg.jpg">
		<table width="80%" height="223" border="1" align="center">
		  <tr> 
			<td height="40" bgcolor="#996699"><font color="#000000"><strong><font size="6"><em>DarNet 
			  Binary System</em> </font></strong>----- Welcome</font></td>
		  </tr>
		  <tr>
			<td height="175"><p>Dear customer,</p>
			  <p><font color="#000066">Thank you for using Darnet Binary System.You need 
				to install Darnet and make the necessary customization to use the system.Please 
				go to <a href="install.php">Install.php</a>.</font></p>
			  <p><em></em></p>
			  <p><font color="#000000"><em>The DarNet team,</em></font></p></td>
		  </tr>
		</table>
		</body>
		</html>
	<?php
    exit;
   }
  
  
  /// It does the else part if DarNet is already installed
  
  
  
  //########################################    Here it starts ##################################### 
	else
	{
		include("counter.php");
		require_once("configconstants/constants.php");
		require_once("dbinterface/dbhandler.php");
       ?>
		
		
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title><?php echo SYSTEM_NAME;?> - Home</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="common/style.css" rel="stylesheet" type="text/css" />
		</head>
		
		<body>
		  <div id="wrapper">
			<div id="wrapperi">
			  
			<div id="wrapperj"> 
			  <h1 align="left" id="header"><font color="#FFFFFF"><img src="images/<?php echo SYS_BANNER;?>" width="600" height="96"> 
				<font size="2" >Total Visitors: 
				<?php echo hitcounter();?>
				</font></font></h1>
		
				<div id="left">
				  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="310" height="39">
					<param name="movie" value="promotion/ahapromotion1.swf">
					<param name=quality value=high>
					<embed src="promotion/ahapromotion1.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="309" height="39"></embed> 
				  </object>
		
				  <ul id="nav">
					
				  <li><a href="index.php">Home</a></li>
				  <li><a href="signin.php">Sign In</a></li>
				  <li><a href="referrer_registration.php">Register Now</a></li>
		
					
				  <li><a href="products.php">Products</a></li>
		
					
				  <li><a href="aboutus.php">About Us</a></li>
		
					
				  <li><a href="why.php">Why Join Us</a></li>
				  <li><a href="contactus.php">Contact Us</a></li>
				  </ul>
		
				  
				<div id="policies"> 
				  <h2><font color="#FFFFFF" size="3" face="Georgia, Times New Roman, Times, serif">Our 
					Values</font></h2>
		
					
				  <ul>
					<li>Great Management and leadership</li>
					<li>Quality service and products. </li>
					<li>Contextualized, applicable and customer oriented training.</li>
					<li>Customer centered approach</li>
					<li>Society Management and involvment</li>
					<li> Providing Action oriented training –Paradime shift</li>
				  </ul>
				  </div>
				  
				  <div id="callbox"><a href="contactus.php"><img src="images/callbox.jpg" alt="call our support team" width="123" height="110" border="0" /></a></div>
		
				  <div class="clear"></div>
		
				  
				<div id="news"> 
				  <h2><font color="#FFFFFF" size="3" face="Georgia, Times New Roman, Times, serif">Latest 
					News </font></h2>
		
					
				  <h3>July 1, 2007</h3>
		
					
				  
          <p>Dear customers,<?php echo SYSTEM_NAME;?> has launched a new registeration system in which 
            customers get registered with only 100 birr and then get to buy products 
            and/or services from the company with in 3 months of time(partially 
            or fully) from the shop in their virtual office.For further information 
            please visit the contact us page, leaders and our office(located at 
            mexico,around Genet hotel,Tselere new building 2nd floor)</p>
				  
          <p>We have also changed the way customers contact the company online..... 
            the contact us page has been changed in such a way that customers 
            are now able to email and/or fill crfs to the concerened responsible 
            person.</p>
				  <p>In the near future there will be price changes on some of our products 
					for both the customer and the company's advantage; we will let you 
					know the changes soon!</p>
				  <h3>&nbsp;</h3>
		
					
				  <p class="readmore">&nbsp;</p>
				  </div>
				</div>
		
				<div id="right">
				  <div id="explore">
					<div id="explorei">
					  <h2><img src="images/explorethebusiness.jpg" width="218" height="32" alt="explore your business" /></h2>
		
					  <ul>
						
					  <li><a href="products.php">Fashionable clothes</a></li>
		
						
					  <li><a href="index.php">Online Business</a></li>
		
						
					  <li><a href="why.php">Great Opportunities</a></li>
					  </ul>
		
					  
					<p class="learnmore"><a style="COLOR: #0c4c4c" href="why.php">learn more</a></p>
		
					  <div id="special">
						<h3><img src="images/offer_box_top.gif" width="187" height="36" alt="special business offer" /></h3>
		
						
					  <p align="left"><font color="#000000"><?php echo SYSTEM_NAME;?> is an online business 
						company that sells quality products, offering its customers special 
						businees opportunities.</font></p>
					  <p align="left" class="readmore">&nbsp;</p>
		
						<div class="bottom"></div>
					  </div>
					</div>
				  </div>
		
				  <div id="subright">
					
				  <div id="strategies"> 
					<h2><font color="#FFFFFF" size="3" face="Georgia, Times New Roman, Times, serif">Our 
					  Strategies</font></h2>
		
					  
					<p>In the increasingly changing world, the key to success in business 
					  is maintaining principles based on honesty,quality and uninterrupted 
					  improvement.Ahha strives to balance these virtues and exceed all 
					  standards in:</p>
					<ul>
					  <li>Marketing </li>
					  <li>Research and business development </li>
					  <li>Production and sales operation </li>
					  <li>Training and personal Development</li>
					  <li>Computer networking and system operation</li>
					  <li>Finance</li>
					  <li>Providing quality local products</li>
					  <li>Introducing genuine NWMI</li>
					
					</ul>
		
					 
					<p class="readmore">&nbsp;</p>
					</div>
		
					<div id="solutions">
					  
					<h2><font color="#FFFFFF" size="3" face="Georgia, Times New Roman, Times, serif">Our 
					  Dream </font></h2>
		
					  
					<p>Our vision is to become best selling Ethiopian network marketing 
					  company.</p>
					<p>We can achieve our vision by:-<br>
                      1. Providing best training which can push people to success.<br>
					  2. Producing and providing best quality products and services with 
					  reasonable price.<br>
					  3. Introducing and enhancing genuine Network Marketing Industry 
					  in its real sense for mutual benefits. Read More..<br>
					</p>
		
					  <p class="photo"><img src="images/photo_people.jpg" width="166" height="103" alt="" /></p>
		
					  
					<p class="readmore">&nbsp;</p>
					</div>
		
					<div class="clear"></div>
				  </div>
				</div>
		
				<div class="clear"></div>
		   
				<div id="footer">
				<div id="footeri"> 
				  <p><font color="#0000FF"><span class="copyright"> 
					<!-- Do not remove read http://www.freewebsitetemplates.com/termsofuse/ -->
					<font color="#495e83">Powered by <a href="http://www.find.com">DarNet</a></font></span></font> <font color="#495e83">Copyright &copy; 2007 DarNet. All Rights Reserved</font><font color="#0000FF">&nbsp; 
					</font></p>
				</div>
			  </div>
			</div>
			</div>
		  </div>
		  </div>
		  </div>
		</body>
		</html>
		  
                <?php
		  
	  }
	  
?>