<?php
class Emp{
	private $id;
	private $name;
	private $grade;
	private $email;
	private $salary;
	function getid(){
		return $this->id;
	}
	function getname(){
		return $this->name;
	}
	function getgrade(){
		return $this->grade;
	}
	function getemail(){
		return $this->email;
	}
	function getsalary(){
		return $this->salary;
	}
	function setid($id){
		$this->id=$id;
	}
	function setname($name){
		$this->name=$name;
	}
	function setgrade($grade){
		$this->grade=$grade;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setsalary($salary){
		$this->salary=$salary;
	}
}
?>