<html>
<head>
<title>add</title>
<meta http-equiv=content-type content=text/html;charset=utf-8 />
</head>
<?php
require_once 'empserivce.class.php';
require_once 'check.php';
check();
$id=$_GET['id'];
$emp=new Emp();
$empservice=new Empservice();
$empservice->GetById($id,$emp);
?>
<h1>增加用户</h1>
<hr/>
<form action='empprocess.php' method='post'>
id：<input readonly='readonly' type='text' name='id' value="<?php echo $emp->getid();?>"/><br />
name：<input type='text' name='name' value='<?php echo $emp->getname();?>' /><br />
grade：<input type='text' name='grade' value='<?php echo $emp->getgrade();?>' /><br />
email：<input type='text' name='email' value='<?php echo $emp->getemail();?>' /><br />
salary:<input type='text' name='salary' value='<?php echo $emp->getsalary();?>' /><br />
<input type='hidden' name='flag' value='change' />
<input type="submit" value='提交' />
</form>
</html>
