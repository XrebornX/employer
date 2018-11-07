<?php 
require_once 'check.php';
check();
?>
<html>
<head>
<script type="text/javascript">
function mark(){
  return confirm("确认删除")
  }
</script>
<style type="text/css">
	div{
		padding: 50px 300px; 
		text-align: center;
	}
	h1{
		text-align: center;
	}
</style>
</head>
<div>
	<h1>雇员列表</h1>
	<?php 
	require_once 'empserivce.class.php';
	require_once 'page_div.php';
	$pageDiv=new PageDiv();
	$pageDiv->PageSize=12;
	$pageDiv->PageListNumCount=10;
	$pageDiv->GoUrl="employ_list.php";
	if(!empty($_GET['PageNow']))$pageDiv->PageNow=$_GET['PageNow'];
	$empservice=new Empservice();
	$empservice->PageDiv($pageDiv);
	$nav=new Helper();
	$nav->naviagtion($pageDiv);
	echo "<table width=700px border=1px bordercolor='green' cellspacing=1px>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除</th><th>修改</th></tr>";
	for ($i=0;$i<$pageDiv->PageSizeGet;$i++){
		echo "<tr><td>{$pageDiv->DateList[$i]['id']}</td><td>{$pageDiv->DateList[$i]['name']}</td><td>{$pageDiv->DateList[$i]['grade']}</td><td>{$pageDiv->DateList[$i]['email']}</td><td>{$pageDiv->DateList[$i]['salary']}</td><td><a onclick='return mark()' href=empprocess.php?flag=delete&&id={$pageDiv->DateList[$i]['id']}>删除</a></td><td><a href=change.php?id={$pageDiv->DateList[$i]['id']}>修改</a></td></tr>";
	}
	echo "</table>";
	echo $pageDiv->PagePP;
	echo $pageDiv->PrePage;
	echo $pageDiv->PageListNum;
	echo "$pageDiv->NextPage";
	echo $pageDiv->PageNN;
	echo $pageDiv->PageJump;
	echo "$pageDiv->FirstPage";
	echo "$pageDiv->LastPage"; 
	echo "当前页{$pageDiv->PageNow}/共{$pageDiv->DateListNum}页";
	?>
</div>
</html>
