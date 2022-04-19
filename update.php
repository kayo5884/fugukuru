<?php
//1. POSTデータ取得
$category = $_POST['category'];
$name = $_POST['name'];
$modelnumber = $_POST['modelnumber'];
$ncscode = $_POST['ncscode'];
$taiscode = $_POST['taiscode'];
$manufacturer = $_POST['manufacturer'];
$retailprice = $_POST['retailprice'];
$popularprice = $_POST['popularprice'];
$averageprice = $_POST['averageprice'];
$weight = $_POST['weight'];
$maxweight = $_POST['maxweight'];
$vertical = $_POST['vertical'];
$horizontal = $_POST['horizontal'];
$height = $_POST['height'];
$maxhori = $_POST['maxhori'];
$minhori = $_POST['minhori'];
$maxhei = $_POST['maxhei'];
$minhei = $_POST['minhei'];
$tiltrange = $_POST['tiltrange'];
$recliningrange = $_POST['recliningrange'];
$type = $_POST['type'];
$color = $_POST['color'];
$level = $_POST['level'];
$notire = $_POST['notire'];
$armsupport = $_POST['armsupport'];
$footsupport = $_POST['footsupport'];
$cushion = $_POST['cushion'];
$seatbelt = $_POST['seatbelt'];
$horizonable = $_POST['horizonable'];
$heightable = $_POST['heightable'];
$backable = $_POST['backable'];
$seatable = $_POST['seatable'];
$armsupportable = $_POST['armsupportable'];
$handable = $_POST['handable'];
$compact = $_POST['compact'];
// $foldable = $_POST['foldable'];
// $turnable = $_POST['turnable'];
// $wide = $_POST['wide'];
// $prevention = $_POST['prevention'];
// $colorful = $_POST['colorful'];
$text = $_POST['text'];
$valid = $_POST['valid'];
$id       = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE welfare_table SET category=:category, name=:name, modelnumber=:modelnumber, ncscode=:ncscode, taiscode=:taiscode,
manufacturer=:manufacturer, retailprice=:retailprice, popularprice=:popularprice, averageprice=:averageprice, weight=:weight,
maxweight=:maxweight, horizontal=:horizontal, vertical=:vertical, height=:height, maxhori=:maxhori,
minhori=:minhori, maxhei=:maxhei, minhei=:minhei, tiltrange=:tiltrange, recliningrange=:recliningrange,
type=:type, color=:color, level=:level, notire=:notire, armsupport=:armsupport,
footsupport=:footsupport, cushion=:cushion, seatbelt=:seatbelt, horizonable=:horizonable, heightable=:heightable,
backable=:backable, seatable=:seatable, armsupportable=:armsupportable, handable=:handable, compact=:compact,
text=:text, valid=:valid WHERE id=:id");

$stmt->bindValue(':category',   $category,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name',  $name,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':modelnumber',  $modelnumber,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':ncscode', $ncscode, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':taiscode', $taiscode, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':manufacturer', $manufacturer, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':retailprice', $retailprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':popularprice', $popularprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':averageprice', $averageprice, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':weight', $weight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':maxweight', $maxweight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':vertical', $vertical, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':horizontal', $horizontal, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':height', $height, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':maxhori', $maxhori, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':minhori', $minhori, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':maxhei', $maxhei, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':minhei', $minhei, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tiltrange', $tiltrange, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':recliningrange', $recliningrange, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':type', $type, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':color', $color, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':level', $level, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':notire', $notire, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':armsupport', $armsupport, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':footsupport', $footsupport, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cushion', $cushion, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':seatbelt', $seatbelt, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':horizonable', $horizonable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':heightable', $heightable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':backable', $backable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':seatable', $seatable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':armsupportable', $armsupportable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':handable', $handable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':compact', $compact, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':foldable', $foldable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':turnable', $turnable, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':wide', $wide, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':prevention', $prevention, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':colorful', $colorful, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':valid', $valid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．select.phpへリダイレクト
  header('Location: select.php');
}
?>