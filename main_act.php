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
    if(!empty($params['seen'])){
        if($_GET['seen']=='1'){
            $where[]="category='ベッド'or'移動用リフト'";
        }
        if($_GET['seen']=='2'){
            $where[]="category='移動用リフト'";
        }
        if($_GET['seen']=='3'){
            $where[]="category='車いす'";
            // 歩行補助杖'or'歩行器'or'手すり'or'スロープ'or'車いす'or'電動車いす
        }
        if($_GET['seen']=='4'){
            $where[]="category='移動用リフト'";
        }
        if($_GET['seen']=='5'){
            $where[]="category='移動用リフト'or'手すり'";
        }
	}
    if(!empty($params['level'])){
		$where[] = "level = '{$params['level']}'";
	}
    if(!empty($params['shincho'])){
        if($_GET['shincho']=='1'){
            $where[] = "minhei < '400'";
        }
        // 標準身長2は基本OK
        if($_GET['shincho']=='3'){
            $where[] = "maxhei > '430'";
        }
	}
    if(!empty($params['taijyu'])){
        // 標準身長1は基本OK
        if($_GET['taijyu']=='2'){
            $where[] = "maxweight > '75'";
        }
        if($_GET['taijyu']=='3'){
            $where[] = "maxweight > '100'";
        }
	}
    if(!empty($params['sousa'])){
        if($_GET['sousa']=='1'){
            $where[] = "type like '%自走%'";
        }
        if($_GET['sousa']=='2'){
            $where[] = "type like '%介助%'";
        }
	}
    // 仕様
    if(!empty($params['notire'])){
        $where[] = "notire = '1'";
	}
    if(!empty($params['armsupport'])){
        $where[] = "armsupport = '1'";
	}
    if(!empty($params['footsupport'])){
        $where[] = "footsupport = '1'";
	}
    if(!empty($params['cushion'])){
        $where[] = "cushion = '1'";
	}
    if(!empty($params['seatbelt'])){
        $where[] = "seatbelt = '1'";
	}
    // 調整機能
    if(!empty($params['horizonable'])){
        $where[] = "horizonable = '1'";
	}
    if(!empty($params['heightable'])){
        $where[] = "heightable = '1'";
	}
    if(!empty($params['backable'])){
        $where[] = "backable = '1'";
	}
    if(!empty($params['armsupportable'])){
        $where[] = "armsupportable = '1'";
	}
    if(!empty($params['handable'])){
        $where[] = "handable = '1'";
	}
    // 特徴
    if(!empty($params['compact'])){
        $where[] = "compact = '1'";
	}
    if(!empty($params['foldable'])){
        $where[] = "foldable = '1'";
	}
    if(!empty($params['turnable'])){
        $where[] = "turnable = '1'";
	}
    if(!empty($params['wide'])){
        $where[] = "wide = '1'";
	}
    if(!empty($params['prevention'])){
        $where[] = "prevention = '1'";
	}
    if(!empty($params['colorful'])){
        $where[] = "colorful = '1'";
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