<?php 
require_once 'check.php';
check();
?>
<html>
<head>
<title>add</title>
<meta http-equiv=content-type content=text/html;charset=utf-8 />
</head>
<h1>增加用户</h1>
<hr/>
<form action="empprocess.php" method="post">
name：<input type="text" name="name" /><br />
grade：<input type="text" name="grade" /><br />
email：<input type="text" name="email" /><br />
salary:<input type="text" name="salary" /><br />
<input type="hidden" name="flag" value="add" />
<input type="submit" value="提交" />
</form>
</html>