<?php

function getUserData($params){

	include_once('database.php');
	$Mysqli = new mysqli($db_host, $db_id, $db_pw, $db_name);
	if ($Mysqli->connect_error) {
			error_log($Mysqli->connect_error);
			exit;
	}

	//入力された検索条件からSQl文を生成
	$where = [];
	$where[]="valid='1'";
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
		$sql = 'select * from welfare_table left join img_table on welfare_table.taiscode = img_table.taiscode where ' . $whereSql ;
	}else{
		$sql = 'select * from welfare_table left join img_table on welfare_table.taiscode = img_table.taiscod';
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