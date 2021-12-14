<?php
	session_destroy();
	print "You are logged out";		
	header("location: ./user/login.php");
exit();
?>