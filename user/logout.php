<?php
	session_start();
	session_unset();
	session_destroy();
	header("location: ../main/login.php?msg=logout_success");



?>