<?php 


require_once("includes/init.php");

$session->logout();
redirect("login.php");

?>