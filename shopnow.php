<?php
session_start();
if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }

require_once("dbinterface/dbhandler.php");
require_once("classes/customer.php");
require_once("dbinterface/dbinterface.php");

?>

<html>
<head>
<title><?php echo SYSTEM_NAME;?> - Online Shop</title>
<LINK href="common/ahha_css.css" type=text/css rel=stylesheet>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body onload=registration.referrer_id.focus()>
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
      <TD align=right colSpan=3 height="25%"> <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
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
      <TD width="20%"></TD>
      <TD colspan="2"></TD>
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
      <TD width="20%" rowspan="3" align=middle vAlign=top> <table width=158 height="141" border=0>
          <tbody>
            <tr id=form_headers> 
              <td align=middle height=18>Product category</td>
            </tr>
            <tr id=form_headers> 
              <td> <table id=link_titles cellspacing=0 cellpadding=0 width="100%" 
            align=left border=0 style="border:3 dashed #cccccc">
                  <tbody>
				  <?php
				    $act = new dbinterface();
					 $q="SELECT * FROM category";
					 $resultset=$act->perform_query($q);	
					while($row=mysql_fetch_array($resultset))
						{
						$id=$row['cat_id'];
						?>
                    <tr align=left> 
                      <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''" style="border:1 dotted">&nbsp;&nbsp;<a href="shopnow.php?cat=<?php echo $id; ?>" target="_parent">&nbsp;&nbsp; 
                       <?php echo strtoupper($row['cat_name']); ?></a></td>
                    </tr>
                         <?php
						 }
						 ?>
					                  

                  
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <p>
        <table id=link_titles cellspacing=0 cellpadding=0 width="100%" 
            align=left border=0>
          <tbody>
            <tr align=left> 
              <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''">Please choose one of the above 
                categories according to your shopping needs!</td>
            </tr>
            <tr align=left> 
              <td onMouseOver="this.background='images/select.jpg'" 
                onMouseOut="this.background=''">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        </p>
        
      </TD>
      <TD width="39%" height="39" align=left><div align="center"><font size="4"><strong><?php echo SYSTEM_NAME;?>  
          Online Shop</strong></font></div></TD>
      <TD width="41%" align=left> 
        <?php
	 
	 $cart = $_SESSION['cart'];
	if (!$cart) {
		echo '<p>You have no items in your shopping cart</p>';
	 } else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		echo '<p>You have <a href="cartreal.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	  }
	?>
        <div align="center"></div>
        <div align="center"></div>
        <div align="right">&nbsp;</div></TD>
    </TR>
    <TR> 
      <TD height="22" colspan="2" align=left><hr></TD>
    </TR>
    <TR> 
      <TD colspan="2" align=left><TABLE height=500 width=615 border=0>
          <TBODY>
            <TR> 
              <TD vAlign=top><?php
			  
			  	$cat=$_GET['cat'];
				 if(isset($cat))
				   {
				   ?>
				
				
				 <table width="98%" height="260" border="0" align="center">
                  <?php
				  
				  
				
                    $act = new dbinterface();
					 $q="SELECT * FROM category";
					 $resultset=$act->perform_query($q);
					 $num_rows=mysql_num_rows($resultset);
				for($i=1;$i<= $num_rows;$i++)
				  {
				   if($cat==$i)
				      {
					 	 	 
					    $sql = "SELECT * FROM product WHERE cat_id=$i";
						$result = mysql_query($sql);
						if(mysql_num_rows($result)<=0)
						  $ermsg="Currently there are no products to display under this category. Please try again later";
						$shipment=60;
					 }
				 }	 	

/*					 
switch($cat)
{

case 'suit':
				
$sql = "SELECT * FROM product WHERE category='suit' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";
$shipment=60;
break;
case 'cultural':
				
$sql = "SELECT * FROM product WHERE category='cultural' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=50;
break;
case 'leather':
				
$sql = "SELECT * FROM product WHERE category='leather' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=60;
break;
case 'bag':
				
$sql = "SELECT * FROM product WHERE category='bag' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=30;
break;
case 'matress':
				
$sql = "SELECT * FROM product WHERE category='matress' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=100;
break;

case 'solarkit':
				
$sql = "SELECT * FROM product WHERE category='solarkit' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=120;

break;
case 'handb':
				
$sql = "SELECT * FROM product WHERE category='handb' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=40;

break;
case 'gabi':
				
$sql = "SELECT * FROM product WHERE category='gabi' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=40;
break;
case 'full':
				
$sql = "SELECT * FROM product WHERE category='full' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";
$shipment=20;
break;
default:
$sql = "SELECT * FROM product WHERE category='suit' ORDER BY pid";
$result = mysql_query($sql);
if(mysql_num_rows($result)<=0)
$ermsg="Currently there are no products to display under this category. Please try again later";

$shipment=60;
break;
}////end of switch($cat)
//$row=mysql_fetch_array($result);

*/
if(isset($ermsg))
echo '<p><h5><font color="#FF0000" face="Arial Narrow"><center>'.$ermsg.'</centrer></font></h4> </font>'; 
while ($row = mysql_fetch_array($result)) {
if(file_exists("productimages/".$row['productname'].".jpg"))
    {
	 
      $size=GetImageSize("productimages/".$row['productname'].".jpg");
	  }
  ?>
                  <tr> 
                    <td height="132" colspan="2"><div align="left"><img src="productimages/<?php echo $row['productname'].".jpg"; ?>" border="0" width="120" height="130"></div></td>
                    <td width="33%"><fieldset >
                      <table width="108%" height="48" border="0">
                        
                        <tr> 
                          <td width="75%" height="21" id="main_content"><div align="right">Shipment 
                              &amp; Handling:</div></td>
                          <td width="25%"><?php echo $shipment ?></td>
                        </tr>
                      </table>
                    </fieldset></td>
                    <td width="30%"> <br>
                      <br>
                      <br>
                      <br> <a style="COLOR: #0c4c4c" href="cartreal.php?action=add&id=<?php echo $row['pid']; ?>"> 
                      <p align="center">&nbsp;</p>
                    </a></td>
                  </tr>
                  <tr> 
                    <td width="9%" id="main_content">product:</td>
                    <td width="28%" bordercolor="#9999FF" bgcolor="#FFFFFF"><?php echo $row['productname']; ?></td>
                    <td width="33%"><a style="COLOR: #0c4c4c" href="cartreal.php?action=add&id=<?php echo $row['pid'] ; ?>&category=<?php echo $row['category'] ; ?>">
                      <p align="center"><img src="images/add.jpg" width="32" height="29"> 
                        Add to cart</p>
                    </a></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td height="20" id="main_content">price:</td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo $row['price']; ?></td>
                    <td width="33%"></td>
                  </tr>
                  <tr bgcolor="#99CC66"> 
                    <td height="14" colspan="4" ><?php echo $row['description']; ?></td>
                  </tr>
                  <tr> 
                    <td height="22" colspan="4" ><hr></td>
                  </tr>
                  <?php
     }
//echo join('',$output); 
?>
                </table>
				
				
				<?php
				}
				
				else
				{
				
				?>
				<table width="98%" height="209" border="0" align="center">
							  <tr> 
								<td height="110" colspan="4"><div align="left"></div>
								  <fieldset >
								
								  <strong><font color="#990000"><em>Please pick a category 
								  from the menu on the left.</em></font></strong><br> <br> <br> <br> <a style="COLOR: #0c4c4c" href="cartreal.php?action=add&id=<?php echo $row['pid']; ?>"> 
								  <p align="center">&nbsp;</p>
								  </a>  </fieldset></td>
							  </tr>
							  <tr> 
								<td height="22" colspan="4" id="main_content"><a style="COLOR: #0c4c4c" href="cartreal.php?action=add&id=<?php echo $row['pid'] ; ?>&category=<?php echo $row['category'] ; ?>"> 
								  <p align="center">&nbsp; </p>
								  </a></td>
							  </tr>
							  <tr> 
								<td width="9%" height="20" id="main_content">&nbsp;</td>
								<td width="28%" height="20" bgcolor="#FFFFFF">&nbsp;</td>
								<td width="33%"></td>
							  </tr>
							  <tr bgcolor="#99CC66"> 
								<td height="14" colspan="4" >&nbsp;</td>
							  </tr>
							  <tr> 
								<td height="22" colspan="4" ><hr></td>
							  </tr>
							  
							</table>
				
				<?php
				}
				?>
				</TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
    <TR height=23> 
      <TD colSpan=3></TD>
    </TR>
    <TR> 
      <!----Footer Links---->
      <TD align=right colSpan=3> <TABLE cellSpacing=0 cellPadding=0 width="100%">
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
<map name="Map">
  <area shape="rect" coords="7,10,99,30" href="index.php" alt="Ahha Home">
</map>
</body>
</html>
