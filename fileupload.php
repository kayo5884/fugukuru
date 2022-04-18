<?php
session_start();
require_once("funcs.php");
//2. DB接続します
$pdo = db_conn();

if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    // echo'アップロードできている';
    $taiscode = $_POST['taiscode'];
    //ファイル名を取得
    $file_name = $_FILES["upfile"]["name"]; //"1.jpg"ファイル名を保存
    //一時保存パス作成
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"1.jpg"TempフォルダPath取得
    //拡張子取得
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //ユニークなファイル名を生成
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;

    // FileUpload [--Start--]
    $img="";//空の変数
    $file_dir_path = "upload/".$file_name;//uploadフォルダにファイルを移動

    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
            chmod( $file_dir_path, 0644 );//ファイルアップ完了&アクセス権限付与
            $img = '<img src="'.$file_dir_path.'">';
        } else {
            echo "Error:アップロードできませんでした。";
        }
    }
    }else{
    // echo 'アップロードできていない';
    $img = "画像が送信されていません";
}

$sql = "INSERT INTO img_table(id,taiscode,img)VALUES(null,:taiscode,:img)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':img',     $file_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':taiscode', $taiscode, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    $img = '<img src="'.$file_dir_path.'">';
    redirect("fileupload.html");
}

//[FileUploadCheck--END--] 
?>