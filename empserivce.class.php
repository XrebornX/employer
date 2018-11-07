<?php
require_once 'SqlHelper.php';
require_once 'empobj.php';
class Empservice{
function Getpagecount($pagesize){
	$sql="select count(id) from emp";
	$sqlhelper=new Helper();
	$res=$sqlhelper->excute_dql($sql);
	if ($row=mysql_fetch_row($res)){
		mysql_free_result($res);
		$pagecount=ceil($row[0]/$pagesize);
	}
	$sqlhelper->colse_connect();
	return $pagecount;
	}
	function Getpagelist($pagenow,$pagesize){
		$page=($pagenow-1)*$pagesize;
		$sql="select * from emp limit $page,$pagesize";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dql1($sql);
		$sqlhelper->colse_connect();
		return $res;
	}
	function PageDiv($PageDiv){
		$page=($PageDiv->PageNow-1)*$PageDiv->PageSize;
		$PageSize=$PageDiv->PageSize;
		$sql1="select * from emp limit $page,$PageSize";
		$sql2="select count(id) from emp";
		$sqlhelper=new Helper();
		$sqlhelper->PageDivDate($sql1,$sql2,$PageDiv);
		$PageDiv->DateListNum=ceil(($PageDiv->DateNum)/$PageSize);
		$sqlhelper->colse_connect();
	}
	function AddData($name,$grade,$email,$salary){
		$sql="INSERT INTO emp VALUES (null,'$name','$grade','$email','$salary')";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dml($sql);
		$sqlhelper->colse_connect();
		return $res;
	}
	function Delete($id){
		$sql="DELETE FROM emp WHERE id=$id";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dml($sql);
		$sqlhelper->colse_connect();
		return $res;
	}
	function UpDate($id,$name,$grade,$email,$salary){
		$sql="UPDATE emp SET name='$name',grade='$grade',email='$email',salary='$salary' WHERE id=$id";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dml($sql);
		$sqlhelper->colse_connect(); 
		return $res;
	}
	function GetById($id,$emp){
		$sql="select * from emp WHERE id=$id";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dql1($sql);
		if (!$res>0){
			echo "fail";exit();
		}
		$emp->setid($res[0]['id']);
		$emp->setname($res[0]['name']);
		$emp->setgrade($res[0]['grade']);
		$emp->setemail($res[0]['email']);
		$emp->setsalary($res[0]['salary']);	
	}
	function GetByName($name,$emp){
		$sql="select * from emp WHERE name='$name'";
		$sqlhelper=new Helper();
		$res=$sqlhelper->excute_dql1($sql);
		if (!$res>0){
			echo "fail";exit();
		}
		$emp->setid($res[0]['id']);
		$emp->setname($res[0]['name']);
		$emp->setgrade($res[0]['grade']);
		$emp->setemail($res[0]['email']);
		$emp->setsalary($res[0]['salary']);
	}
}
?>