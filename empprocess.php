<?php
require_once 'empserivce.class.php';
$flag=$_REQUEST['flag'];
function add(){
	$name=$_POST['name'];
	$grade=$_POST['grade'];
	$email=$_POST['email'];
	$salary=$_POST['salary'];
	$empservice=new Empservice();
	$res=$empservice->AddData($name, $grade, $email, $salary);
	if($res==1){
		header("location:ok.php");
	}else header("location:fail.php");
}
function delete(){
	$id=$_GET['id'];
	$empservice=new Empservice();
	$res=$empservice->Delete($id);
	if($res==1){
		header("location:ok.php");
	}else header("location:fail.php");
}
function change(){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$grade=$_POST['grade'];
	$email=$_POST['email'];
	$salary=$_POST['salary'];
	$empservice=new Empservice();
	$res=$empservice->UpDate($id, $name, $grade, $email, $salary);
	if($res==1){
		header("location:ok.php");
	}else header("location:fail.php");
}
function search(){
	if (!empty($_POST['id'])){
		$id=$_POST['id'];
		$emp=new Emp();
		$empservice=new Empservice();
		$empservice->GetById($id,$emp);
		echo "id=".$emp->getid()."<br />";
		echo "name=".$emp->getname()."<br />";
		echo "grade=".$emp->getgrade()."<br />";
		echo "email=".$emp->getemail()."<br />";
		echo "salary=",$emp->getsalary();
		exit();
	}else if (!empty($_POST['name'])){
		$name=$_POST['name'];
		$emp=new Emp();
		$empservice=new Empservice();
		$empservice->GetByName($name,$emp);
		echo "id=".$emp->getid()."<br />";
		echo "name=".$emp->getname()."<br />";
		echo "grade=".$emp->getgrade()."<br />";
		echo "email=".$emp->getemail()."<br />";
		echo "salary=",$emp->getsalary();
		exit();
	}
	else echo "please input something";exit();
}
switch ("$flag"){
	case "add":
	add();
	break;
	case "delete":
		delete();
		break;
	case "change":
		change();
		break;
	case "search":
		search();
		break;
	default:
}
?>