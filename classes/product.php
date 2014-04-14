<?php


require_once("../dbinterface/dbinterface.php");
require_once("../classes/order.php");


 class product
         {
      

				//var $userid;
				//var $password;
				//var $type;

				function insert_product($productname,$price,$description,$stockamt,$cat)
				  {
					      $act = new dbinterface();
						 $q="INSERT into product(productname,price,description,stockamt,cat_id) values('$productname','$price','$description','$stockamt','$cat')";
						  if($t=$act->perform_query($q)) 
							 return 1;
						  else 
							
							return 0;
				 }

//////////////////////////////
			function changeprice($newprice,$id)
				{
				//$opass=$this->getpassword();
				 $act = new dbinterface();
				$q="UPDATE product set price='$newprice' where pid='$id'";
				if($t=$act->perform_query($q))
				return 1;
				else 
				return 0;
				
				}


/////////////////////////////////////

			  function Numberof_typesofpro()
				{
						
					$query_allcustomers = "SELECT Count(DISTINCT cat_id ) as num FROM product";
					$allproducts = mysql_query($query_allcustomers) or die(mysql_error());
					$type = mysql_fetch_array($allproducts);
					$type=$type['num'];
					return ($type);
			
				}
				
			/////////////////////////////////////	
				function getcategories()
				  {
				  
				  
				  $q="SELECT cat_name FROM category";
				  $r=mysql_query($q);
				  return $r;
				  }
				 
				function getcategory($cat_id)
				{
				 $q="SELECT cat_name FROM category WHERE cat_id=$cat_id";
				  $r=mysql_query($q);
				  $r=mysql_fetch_array($r);
				  return $r['cat_name'];

				
				
				}
				 
				//////////////////////////////////////////// 
				function getproducts()
				  {
				  
				  
				  $q="SELECT * FROM product";
				  $r=mysql_query($q);
				  return $r;
				  }

			     function number_of_sales($pid)
				 {
				 $sales=new order();
				 $n=$sales->get_numberofsales($pid);
				 return $n;
				 
				 }


       }

?>