<?php
	session_start();
	require_once 'adminserivce.class.php';
	if (empty(!$_POST['id'])&&empty(!$_POST['password'])){
		$id=$_POST['id'];
		$password=$_POST['password'];
		$num=preg_match('/^\d+$/', $id);
		if(!$num){
			header("location:log.php?error=3");
			exit();
		}
		if (!empty($_POST['keepid'])){
			setcookie("id","$id",time()+2*7*24*3600);
		}else {
			if (!empty($_COOKIE['id']))
			setcookie("id","",time()-200);
		}
	}else {
		header("location:log.php");
		exit();
	}
	$adminservice=new AdminSerivce();
	if ($name=$adminservice->CheckAdmin($id, $password)){
		$_SESSION['logname']=$name;
		// header("Location:empmanage.php?name=$name");
		header("Location:empmanage.php");
		exit();
	}	
	header("location:log.php?error=1");
	exit();
?>