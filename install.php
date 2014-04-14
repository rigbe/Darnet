<?php

//functions
include_once("install_func.php");


/////////////////////////////////////////////////////////////////////////////////////**************************************///////////////////////////
//DarNet Installer

echo '<html>';
echo '<body background="page_bg.jpg">';

if ( (!isset( $_GET['step'])) || ($_GET['step'] < 1 || $_GET['step'] > 3) )
	$step = 1;	
else
	$step = $_GET['step'];



// General check
		 if ($step == 1) 
			   {
				   
					$canContinue = 1;
				
					// check mysql
					$good_msql = function_exists( 'mysql_connect' ) ? 1 : 0;  //   mysql version is not really checked
					$canContinue = $canContinue && $good_msql;
				
					// check php
				
					$good_php = phpversion() >= '5' ? 1 : 0;
					$canContinue = $canContinue && $good_php;
					first_step($good_msql,$good_php,$canContinue);
				
				 }
				 
				 
				 
		//    accepting database parameters		 
				 
	    if ($step == 2) 
			   {
				   
					get_databaseinfo();
												
				
				 }
					/// add the content:
		/// add the content:
		
		// creating the database and config.php (configuration file)
		
		
		    if ($step == 3) 
			   {
				$dbname=$_POST['dbName'];
				$dbuser=$_POST['dbUser'];
				$dbpass=$_POST['dbPass'] ;
				$dbhost=$_POST['dbHost'];
				$sysname=$_POST['sysName'];
				
			// creating a folder ,database handler file 
			/*
				$oldumask = umask(0); 
				if(!@mkdir(dbinterface, 0777)) 
				     {
				      echo "You have already made the installation !!";
					   exit();
					  }// or even 01777 so you get the sticky bit set , making a new directory
				umask($oldumask); 
				*/
           
					$newdbfile = dbinterface.'/'."dbhandler.php";
					$fh = fopen($newdbfile, 'w') or die("can't open file");
					$stringData = "<?php\n";
					fwrite($fh, $stringData);
					$stringData = "define ('DB','$dbname');\n define ('HOST','$dbhost');\n define ('USERNAME','$dbuser');\n define ('PASSWORD','$dbpass');\n define ('SYSTEM_NAME','$sysname');\n";
					fwrite($fh, $stringData);
					$stringData = "mysql_connect(HOST,USERNAME,PASSWORD);\n";
					mysql_connect($dbhost,$dbuser,$dbpass);
					
					
					// creaating the database and the tables
					
					$query  = "CREATE DATABASE $dbname ";
					//echo $query;
					$result = mysql_query($query) or die("counldnt create the db");
					$rights="GRANT ALL ON '$newdb'.* TO '$dbuser'@'localhost' IDENTIFIED BY '$dbpass'";
					$r = mysql_query($rights);
					
					fwrite($fh, $stringData);
					$stringData = "if(!mysql_select_db(DB)) die(\" Unable to connect to \".DB.\"  \".mysql_error());\n";
					fwrite($fh, $stringData);
					$stringData = "?>";
					fwrite($fh, $stringData);
				
					fclose($fh);
					
					 
					if(!mysql_select_db($dbname)) die(" Unable to connect to ".$dbname."  ".mysql_error());	
					$fnum=1;
						for($i=0;$i<14;$i++)
							{
							$queryFile = 'dbtables/table'.$fnum.'.txt';
							 $fp = fopen($queryFile, 'r');
							 $query = fread($fp, filesize($queryFile));
							
							//echo $query;
							$result = mysql_query($query) or die("Couldn't create the database tables");
							fclose($fp); 
							$fnum=$fnum+1;
							}
						
						
						
						//#################################################INSERTING  IMPORTANT INFORMATIONS ###############################3
						
								/// first customer 
								$query1  = "INSERT INTO `customer` VALUES (1, 'dar', 'dar', 'dar', '2006-02-18', 'female', 'ethiopian', 'business', '123', 'dd', 'dd','','',0, 0, 0, 0, '2007-02-18', 'aha', 'aha', 0, 'aha', 0)";
								 mysql_query($query1);
								
								/// first commisssion tracker 
								$query2  = "INSERT INTO `commission_tracker` VALUES ('2007-06-04')";
								 mysql_query($query2);
								
								/// first customer account
								$query3  = "INSERT INTO `customer_account` VALUES ('1', '01','What is your favourite food?', 'doro')";
								 mysql_query($query3);
								
								/// first admin user
								$query4  = "INSERT INTO `userverify` VALUES ('admin', 'darnet','admin')";
								 mysql_query($query4);
					
					
								$query5="INSERT INTO `report` (`rid`, `report_name`, `type`) VALUES 
										(1, 'Number of Customers', NULL),
										(2, 'Ecard Information', NULL),
										(3, 'Product Shipment Information', NULL),
										(4, 'Product Amount Information', NULL),
										(5, 'Commission for Customers', NULL),
										(6, 'Amount of Sales', NULL)";
										
								mysql_query($query5);			

					// finalizing installation
					
					finish_installation();
						
																
										
				 }
					/// add the content:

	
	
	
	
	
	
	
	
	
echo '</html>';
echo '</body>';
	
	
	
						     
?>						 



			



	
	
	

	
	
				   			   

	
				   