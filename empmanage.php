<html>
<head>
<title>管理页面</title>
</head>
<?php
header("content-type:text/html;charset=utf-8");
require_once 'adminserivce.class.php';
require_once 'check.php';
check();
	$name=$_SESSION['logname'];
	echo "$name"."登陆成功"."<br />";
	getlasttime();
?>
<h1>管理页面</h1>
<table>
<tr><td><a href='employ_list.php'>管理用户</a></td></tr>
<tr><td><a href='add.php'>添加用户</a></td></tr>
<tr><td><a href='search.php'>查询用户</a><td></tr>
<tr><td><a href='log.php'>退出登陆</a><td></tr>
</table>
</html>