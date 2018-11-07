<?php
	require_once 'SqlHelper.php';
	class AdminSerivce{
		public function CheckAdmin($id,$password){
			$helper = new Helper();
			$sql="select password,name from admin where id = $id";
			$res=$helper->excute_dql($sql);
			if ($row=mysql_fetch_assoc($res)){
				if ($row['password']==md5($password)){
					mysql_free_result($res);
					$helper->colse_connect();
					return $row['name'];
				}
			}
			return false;
		}
	}
	function getlasttime(){
		if (empty($_COOKIE['lastvisit'])){
			echo "欢迎首次登陆";
			setcookie("lastvisit",date("Y-m-d/H:i:s"),time()+3600*24*30);
		}else {
			echo "上次登陆时间为".$_COOKIE['lastvisit'];
			setcookie("lastvisit",date("Y-m-d/H:i:s"),time()+3600*24*30);
		}
	}
	function cookieid($val){
		if (empty($_COOKIE[$val])){
			echo "";
		}else {
			echo $_COOKIE[$val];}
	}
?>