<?php require_once 'adminserivce.class.php';?>
<html>
<head>
<title>log</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<style type="text/css">
	#log{
		margin: 100px 555px;
		}
</style>
</head>
<body>
	<div id="log">
		<h1>管理系统</h1>
		<form method="post" action="logproecss.php">
		<table>
		<tr><td>用户id</td><td><input type=text name="id" value="<?php cookieid("id")?>"></td></tr>
		<tr><td>密  &nbsp;码</td><td><input type=text name="password" ></td></tr>
		<tr><td colspan="2">是否保存用户ID <input type="checkbox" name="keepid"></td></tr>
		<tr><td><input type=submit value="提交" ></td><td><input type=reset value="重新填写" ></td></tr>
		</table>
		</form>
		<?php 
			if(!empty($_GET['error'])){
				if ($_GET['error']==1){
					echo "<br /><font color='red'>密码或者用户名错了</font>";
				}else if ($_GET['error']==2){
					echo "<br /><font color='red'>请登录</font>";
				}else if ($_GET['error']==3){
					echo "<br /><font color='red'>用户ID为数字</font>";
				}
			}
		?>
	</div>
</body>
</html>