<?
include 'opendb.php';
$newsite=$_POST['sitename'];
if($newsite=='')
       {
       header ("Location: admin/new_site.php?ermsg=Sorry, you have to fill a site name");
	   exit;
	   }
$newdir='../'.$newsite;
///////   creates the new directory
$oldumask = umask(0); 
mkdir($newdir, 0777); // or even 01777 so you get the sticky bit set 
umask($oldumask); 


		////////////////// copies the contents of a directory to another
		///////////////////////  another function
		function copydirr($fromDir,$toDir,$chmod=0757,$verbose=false)
		/*
			copies everything from directory $fromDir to directory $toDir
			and sets up files mode $chmod
		*/
		{
		//* Check for some errors
		$errors=array();
		$messages=array();
		if (!is_writable($toDir))
			$errors[]='target '.$toDir.' is not writable';
		if (!is_dir($toDir))
			$errors[]='target '.$toDir.' is not a directory';
		if (!is_dir($fromDir))
			$errors[]='source '.$fromDir.' is not a directory';
		if (!empty($errors))
			{
			if ($verbose)
				foreach($errors as $err)
					echo '<strong>Error</strong>: '.$err.'<br />';
			return false;
			}
		//*/
		$exceptions=array('.','..');
		//* Processing
		$handle=opendir($fromDir);
		while (false!==($item=readdir($handle)))
			if (!in_array($item,$exceptions))
				{
				//* cleanup for trailing slashes in directories destinations
				$from=str_replace('//','/',$fromDir.'/'.$item);
				$to=str_replace('//','/',$toDir.'/'.$item);
				//*/
				if (is_file($from))
					{
					if (@copy($from,$to))
						{
						chmod($to,$chmod);
						touch($to,filemtime($from)); // to track last modified time
						$messages[]='File copied from '.$from.' to '.$to;
						}
					else
						$errors[]='cannot copy file from '.$from.' to '.$to;
					}
				if (is_dir($from))
					{
					if (@mkdir($to))
						{
						chmod($to,$chmod);
						$messages[]='Directory created: '.$to;
						}
					else
						$errors[]='cannot create directory '.$to;
					copydirr($from,$to,$chmod,$verbose);
					}
				}
		closedir($handle);
		//*/
		//* Output
		if ($verbose)
			{
			foreach($errors as $err)
				echo '<strong>Error</strong>: '.$err.'<br />';
			foreach($messages as $msg)
				echo $msg.'<br />';
			}
		//*/
		return true;
		}


//// coping the web site to the new directory
if(copydirr('../main',$newdir,0777,false))
{

echo "New site has been created !!";
}

/*

//////////////   creating the new database
$newdb='ethiocom_'.$newsite;
//or   $query  = "CREATE DATABASE $newsite ";

$query  = "CREATE DATABASE $newdb ";
//echo $query;
$result = mysql_query($query);
$rights="GRANT ALL ON '$newdb'.* TO 'ethiocom_sahele'@'localhost' IDENTIFIED BY 'sahele'";
$r = mysql_query($rights);
define ('DB',$newdb);

if(!mysql_select_db(DB))
die(" Unable to connect to ".DB."  ".mysql_error());
$fnum=1;
for($i=0;$i<9;$i++)
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
		$query1  = "INSERT INTO `customer` VALUES ('1', 'eca', 'eca', 'eca', 'm', 'ethiopian', '02', NULL, NULL, '2007-06-01', '', 0)";
		 mysql_query($query1);
		
		/// first commisssion tracker 
		$query2  = "INSERT INTO `commission_tracker` VALUES ('2007-06-04')";
		 mysql_query($query2);
		
		/// first customer account
		$query3  = "INSERT INTO `customer_account` VALUES ('1', '01')";
		 mysql_query($query3);
		
		/// first admin user
		$query4  = "INSERT INTO `user` VALUES ('teshome', 'eca')";
		 mysql_query($query4);

/////////////////////////////####################################################################
//##############     creating a new dhandler file
/*
	$fromdir='../tangoaviation';
	$todir=$newdir;
	$from=str_replace('//','/',$fromdir.'/'.'dbhandler.php');
	$to=str_replace('//','/',$toDir.'/'.'dbhandler.php');
/// the file is copied from the old directory to the new one
	copy($from,$to);
	*/
//   the user name has to be changed

		
	$newdbfile = $newdir.'/'."dbhandler.php";
	$fh = fopen($newdbfile, 'w') or die("can't open file");
	$stringData = "<?\n";
	fwrite($fh, $stringData);
	$stringData = "define ('DB',$newdb);define ('HOST','localhost');define ('USERNAME','ethiocom_sahele');define ('PASSWORD','sahele');\n";
	fwrite($fh, $stringData);
	$stringData = "mysql_connect(HOST,USERNAME,PASSWORD);";
	fwrite($fh, $stringData);
	$stringData = "if(!mysql_select_db(DB)) die(\" Unable to connect to \".DB.\"  \".mysql_error());";
	fwrite($fh, $stringData);
	$stringData = "?>";
	fwrite($fh, $stringData);

	fclose($fh);


	$newdbforad = $newdir.'/admin/'."dbdefinitions.php";
	$fh = fopen($newdbforad, 'w') or die("can't open file");
	$stringData = "<?\n";
	fwrite($fh, $stringData);
	$stringData = "define ('DB','$newdb');define ('HOST','localhost');define('PORT', 3306);define ('USER','ethiocom_sahele');define ('PASS','sahele');\n";
	fwrite($fh, $stringData);
	$stringData = "?>";
	fwrite($fh, $stringData);

	fclose($fh);


////###########################    END OF FILE CREATION


?>