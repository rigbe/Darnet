<?php
include("dbhandler.php");
include("tables.php");



class dbinterface
 {
 
  ////    query performer .... generalizes query activities 
	  function perform_query($query)
		{
				
		 $result=mysql_query($query) or die("could not");
		 return $result;
		 
		 }
		 
	////  returns an field from a result set 	 
      function fetch_array($result)
	    {
		
		 $row=mysql_fetch_array($result);
		 return $row;
		 
		}
 
 
 
 
 }





?>