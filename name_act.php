<?php

function getUserData($params){

	include_once('config/database.php');
	$Mysqli = new mysqli($host, $username, $password, $dbname);
	if ($Mysqli->connect_error) {
			error_log($Mysqli->connect_error);
			exit;
	}

	//入力された検索条件からSQl文を生成
	$where = [];
    if(!empty($params['category'])){
		$where[] = "category = '{$params['category']}'";
	}
	if(!empty($params['name'])){
		$where[] = "name like '%{$params['name']}%'";
	}
	if(!empty($params['modelnumber'])){
		$where[] = "modelnumber like '%{$params['modelnumber']}%'";
	}
	if(!empty($params['ncscode'])){
		$where[] = "ncscode like '%{$params['ncscode']}%'";
	}
    if(!empty($params['taiscode'])){
		$where[] = "taiscode like '%{$params['taiscode']}%'";
	}
    if(!empty($params['manufacturer'])){
		$where[] = "manufacturer = '{$params['manufacturer']}'";
	}
    if(!empty($params['type'])){
		$where[] = "type = '{$params['type']}'";
	}
	if($where){
		$whereSql = implode(' AND ', $where);
		$sql = 'select * from welfare_table where ' . $whereSql ;
	}else{
		$sql = 'select * from welfare_table';
	}
	
	//SQL文を実行する
	$UserDataSet = $Mysqli->query($sql);

	//扱いやすい形に変える
	$result = [];
	while($row = $UserDataSet->fetch_assoc()){
		$result[] = $row;
	}
	return $result;
}