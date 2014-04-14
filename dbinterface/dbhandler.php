<?php
define ('DB','gg');
 define ('HOST','Localhost');
 define ('USERNAME','root');
 define ('PASSWORD','');
 define ('SYSTEM_NAME','abba');
mysql_connect(HOST,USERNAME,PASSWORD);
if(!mysql_select_db(DB)) die(" Unable to connect to ".DB."  ".mysql_error());
?>