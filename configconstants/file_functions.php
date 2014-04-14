<?php


        function create_file($filename)
                {
  					$newfile ='../configconstants/'.$filename;
					$fh = fopen($newfile, 'a') or die("can't open file");

				
				}
		function write_to_file($filename,$const,$value)
		          {
				   $filename='../configconstants/'.$filename;
				   $fh = fopen($filename, 'a') or die("can't open file");

				  	$stringData = "<?php\n";
					fwrite($fh, $stringData);
		
					$stringData ="define ('$const','$value');\n";
					fwrite($fh, $stringData);
					$stringData = "?>";
					fwrite($fh, $stringData);
				

  					fclose($fh);

                  }
















?>