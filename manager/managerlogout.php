<?php
session_start(); 
session_unregister("properuser");
session_destroy();
header ("Location: index.php?ermsg=You have logged out !");



?>