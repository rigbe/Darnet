<?php
session_start(); 
session_unregister("customer_id");

header ("Location: signin.php?ermsg=You have successfully logged out !");



?>