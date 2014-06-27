<?php 
	session_start("login");
	session_destroy();
	header("Location: ../../index.php");
 ?>