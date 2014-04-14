<?php
session_start();
if(!session_is_registered('customer_id')) 
	 {
	  header ("Location: signin.php?ermsg=You have to sign in first !");
	 }
require_once("dbinterface/dbhandler.php");
require_once("classes/customer.php");
require_once("dbinterface/dbinterface.php");



// Process actions
$cart = $_SESSION['cart'];
$action = $_GET['action'];
$category=$_GET['category'];
$_SESSION['category']=$category;
switch ($action) {
	case 'add':
	
		if ($cart) {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
case 'checkout':
{
displayecardinfo();
//showCartreadonly();
break;
exit;
}
}
$_SESSION['cart'] = $cart;

?>

<html>
<head>
<title>Your cart</title>
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
      <TD width="20%" rowspan="4" align=middle vAlign=top> <TABLE width=157 border=0>
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
              <TD align=middle height=18>Note:</TD>
            </TR>
            <TR id=form_headers> 
              <TD> <TABLE id=link_titles cellSpacing=0 cellPadding=0 width="100%" 
            align=left border=0>
                  <TBODY>
                    <TR align=left> 
                      <TD onMouseOver="this.background='images/select.jpg'" 
                onmouseout="this.background=''">Our high quality products will 
                        certainly make you happy.Thank you for being in our shop.</TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
            </TR>
            <TR> 
              <TD height=18></TD>
            </TR>
          </TBODY>
        </TABLE>
        <p>&nbsp; </p>
        <p>&nbsp; </p></TD>
      <TD width="39%" height="23" rowspan="2" align=left><div align="center"><font size="4"><strong>Your 
          Cart <img src="images/cart1.jpg" width="116" height="60"></strong></font></div></TD>
      <TD width="41%" height="51" align=left> <div align="left"></div>
        <div align="center"> </div>
        <div align="left">&nbsp; </div></TD>
    </TR>
    <TR> 
      <TD height="20" align=left> 
        <?php 
	 $cart = $_SESSION['cart'];
	if (!$cart) {
		echo '<p>You have no items in your shopping cart</p>';  ///////////////////    check it again
	 } else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		/////    THE NEXT ECHO SHOULD BE ON IF WE ALLOW USERS TO BUY MORE THAN ONE PRODUCT
		//echo '<p>You have <a href="cartreal.php">'.count($items).' item'.$s.' in your shopping cart</a></p>';
		//only one item can be bought at one time
		echo '<p>You have <a href="cartreal.php">'."1".' item' .' in your shopping cart</a></p>';
	  }
	?>
      </TD>
    </TR>
    <TR> 
      <TD height="25" colspan="2" align=left><hr> </TD>
    </TR>
    <TR> 
      <TD colspan="2" align=left><TABLE width=634 height=377 border=0>
          <TBODY>
            <TR> 
              <TD width="408" vAlign=top> <div id="contents"> 
                  <?php
$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		?>
                  <form action="cartreal.php?action=update" method="post" id="cart">
                    <table  width="102%" height="191" style="border:1 dashed">
                      <?php
		foreach ($contents as $id=>$qty) {
      

		
			$sql = 'SELECT * FROM product WHERE pid = '.$id;
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			extract($row);
			?>
                      <tr bgcolor="#CCCCCC"> 
                        <td width="24%" bgcolor="#FFFFFF"><div align="center"><font color="#993366" size="4">Remove</font></div></td>
                        <td width="30%" bgcolor="#FFFFFF"><div align="left"><font color="#993366" size="4">Product 
                            Description</font></div></td>
                        <td width="22%" bgcolor="#FFFFFF"><div align="left"><font color="#993366" size="4">Price</font></div></td>
                        <?php ///    the commented TD next displays quantity of a product in cart...the funtionality is not needed for now    ?>
                        <!--<td width="11%"><input type="text" name="qty<?php echo $id; ?>" value="<?php echo $qty;?>" size="3" maxlength="3" /></td> -->
                        <?php
			//$total += $price * $qty;  //ON IF WE ALLOW USERS TO BUY MORE THAN ONE PRODUCT 
			$total = $price;
			}
			$_SESSION['total_payment']=$total; ////////// registeering the total payment due
			//$_SESSION['total_full']=$price+150;
			$_SESSION['product_id']=$id;
			$_SESSION['product_name']=$row['productname'];

			?>
                      </tr>
                      <tr bgcolor="#CCCCCC"> 
                        <td height="46" bgcolor="#FFFFFF"><div align="center"><a href="cartreal.php?action=delete&id=<?php echo $id;?>" class="r"><font size="3"><img src="images/remove.jpg" width="56" height="48" border="0"></font></a></div>
                          <a href="cartreal.php?action=delete&id=<?php echo $id;?>" class="r"> 
                          </a></td>
                        <td width="30%" bgcolor="#FFFFFF"><div align="center"></div>
                          <?php echo $description; ?></td>
                        <td bgcolor="#FFFFFF"><?php echo $price." birr"; ?> <strong> 
                          <?php //echo ($price * $qty)." birr"; ?>
                          </strong></td>
                      </tr>
                      <tr bgcolor="#FFFFFF"> 
                        <td colspan="3">Grand total: <strong>Birr <?php echo $total; ?> 
                          </strong></td>
                        <td width="24%"><strong> 
                          <!--CAN NOT CHANGE QUANTITIES OF PRODUCT TO BE BOUGHT(ONLY ONE IS ALLOWED)<input name="submit" type="submit" value="Update cart">-->
                          </strong></td>
                      </tr>
                      <tr> 
                        <td height="75" colspan="4"> <div> 
                            <div align="left"></div>
                          </div>
                          <div> 
                            <div align="right"><strong><a href="ecardprocessor.php"><font size="3" ><img src="images/checkout.jpg" width="124" height="22"></font></a></strong> 
                            </div>
                            <table width="637" height="30" border="0">
                              <tr> 
                                <td width="298" bgcolor="#FFFFFF"> <div align="right"><a href="ecardprocessor.php"></a> 
                                  </div></td>
                                <!--SO THAT WE WOULDNT BUY MORE THAN ONE PRODUCT<td width="309"><a href="ahha_shopnow.php"><font size="3">Shop More...</font></a> </td>-->
                              </tr>
                            </table>
                          </div></td>
                      </tr>
                    </table>
                    <div align="left"></div>
                    <p>&nbsp;</p>
                    <div></div>
                  </form>
                  <?php

		////////////////////////  the total is passed via a hidden input field
		} 
		
	else
	 {
	
		echo "<p>You shopping cart is empty.</p>";
		?>
                  <div align="right"><a href="shopnow.php"><img src="images/continueshopping.jpg" width="120" height="39" border="0"></a> 
                    <?php
	    }
?>
                  </div>
                  <div align="center"> </div>
                  <p>&nbsp;</p>
                </div></TD>
            </TR>
          </TBODY>
        </TABLE></TR>
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
            style="FONT-SIZE: 9px; COLOR: #0c4c4c">Copyright © 2007.&nbsp;DarNet, 
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
