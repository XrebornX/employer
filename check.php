<?php
function check(){
	session_start();
	if (empty($_SESSION['logname'])){
		header("Location:log.php?error=2");
	}
}
?>