<?php
header("content-type:text/html;charset=utf-8");
class Helper{
	/* public $conn;
	public $host="localhost";
	public $username="root";
	public $password="root";
	public $db="employer"; */
	public $conn;
	public $host;
	public $username;
	public $password;
	public $db;
	public function __construct(){
		$sql_infro=parse_ini_file("sql.ini");
		$this->host=$sql_infro['host'];
		$this->username=$sql_infro['username'];
		$this->password=$sql_infro['password'];
		$this->db=$sql_infro['db'];
		$this->conn=@mysql_connect("$this->host","$this->username","$this->password");
		if (!$this->conn){
			die("连接失败".mysql_error());
		}
		mysql_query("set names utf8",$this->conn) or die(mysql_error());
		mysql_select_db("$this->db",$this->conn)or die(mysql_error());
	}
	public function excute_dql($sql){
		$res=mysql_query($sql,$this->conn) or die(mysql_error());
		return $res;
	}
	public function excute_dql1($sql){
		$arr=array();
		$res=mysql_query($sql,$this->conn) or die(mysql_error());
		while ($row=mysql_fetch_assoc($res)){
			$arr[]=$row;
		}
		mysql_free_result($res);
		return $arr;
	}
	public function PageDivDate($sql1,$sql2,$PageDiv){
		$res=mysql_query($sql1,$this->conn) or die(mysql_error());
		while ($row=mysql_fetch_assoc($res)){
			$PageDiv->DateList[]=$row;
		}
		mysql_free_result($res);
		$PageDiv->PageSizeGet=count($PageDiv->DateList);
		$res=mysql_query($sql2,$this->conn) or die(mysql_error());
		if ($row=mysql_fetch_row($res)){
			mysql_free_result($res);
			$PageDiv->DateNum=$row[0];
		}
	}
	public function naviagtion($PageDiv){
		if ($PageDiv->PageNow > 1){
			$pre_page=$PageDiv->PageNow-1;
		}else $pre_page=$PageDiv->PageNow;
		$PageDiv->PrePage="<a href={$PageDiv->GoUrl}?PageNow=$pre_page>上一页 &nbsp</a>";
		if ($PageDiv->PageNow< $PageDiv->DateListNum){
			$aft_page=$PageDiv->PageNow+1;
		}else $aft_page=$PageDiv->PageNow;
		$PageDiv->NextPage="<a href={$PageDiv->GoUrl}?PageNow=$aft_page>下一页 &nbsp</a>";
		$PageDiv->FirstPage="<a href={$PageDiv->GoUrl}?PageNow=1>第一页 &nbsp</a>";
		$PageDiv->LastPage="<a href={$PageDiv->GoUrl}?PageNow=$PageDiv->DateListNum>末页 &nbsp</a>";
		$PageDiv->PageJump="<form action='{$PageDiv->GoUrl}'>转页<input type='text' name=PageNow />
		<input type='submit' value='跳转' />
		</from>";
		$pagestart=floor(($PageDiv->PageNow-1)/$PageDiv->PageListNumCount)*$PageDiv->PageListNumCount+1;
		$pageend=$pagestart+$PageDiv->PageListNumCount;
		if ($pageend>$PageDiv->DateListNum)$pageend=$PageDiv->DateListNum+1;
		$pagestart1=$pagestart-1;
		if ($PageDiv->PageNow<$PageDiv->PageListNumCount)$pagestart1=$PageDiv->PageNow;
		$PageDiv->PagePP="<a href={$PageDiv->GoUrl}?PageNow=$pagestart1> << </a>";
		
		for (;$pagestart<$pageend;$pagestart++){
			$PageDiv->PageListNum.="<a href=employ_list.php?PageNow=$pagestart> $pagestart </a>";
		}if ($pagestart>$PageDiv->DateListNum)$pagestart=$PageDiv->DateListNum;
		$PageDiv->PageNN="<a href={$PageDiv->GoUrl}?PageNow=$pagestart> >> </a>";
	}
	public function excute_dml($sql){
		$b=mysql_query($sql,$this->conn);
		if (!$b){
			return 0;
		}else if (mysql_affected_rows($this->conn)>0){
			return 1;
		}else return 2;
	}
	public function colse_connect(){
		if(!empty($this->conn)){
			mysql_close($this->conn);
		}
	}
}
?>