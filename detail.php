<?php
session_start();
$id = $_GET["id"]; //?id~**を受け取る

require_once("funcs.php");
loginCheck();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM welfare_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
     <head>
     <meta charset="UTF-8">
    <title>ふぐくる：データ修正</title>
    <meta name="description" content="あいまい検索で福祉用具を見つける">
      <link rel="icon" type="image/png" href="images/favicon_ncs.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSS -->
      <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
      <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
     </head>
     <body>
          <header class="page-header">
               <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <div class="main"><a class="button wrapper" href="select.php">データ一覧に戻る</a></div>
                    </div>
               </nav>
          </header>
          <!-- Main[Start] -->
          <form method="POST" action="update.php">
          <div class="jumbotron">
          <fieldset>
          <legend>[編集]</legend>
               <label>商品種別：<input type="text" name="category" value="<?=$row["category"]?>"></label><br>
               <label>商品名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
               <label>商品型番：<input type="text" name="modelnumber" value="<?=$row["modelnumber"]?>"></label><br>
               <label>NCSコード：<input type="text" name="ncscode" value="<?=$row["ncscode"]?>"></label><br>
               <label>TAISコード：<input type="text" name="taiscode" value="<?=$row["taiscode"]?>"></label><br>
               <label>メーカー：<input type="text" name="manufacturer" value="<?=$row["manufacturer"]?>"></label><br>
               <label>希望小売価格：<input type="text" name="retailprice" value="<?=$row["retailprice"]?>"></label><br>
               <label>最頻価格：<input type="text" name="popularprice" value="<?=$row["popularprice"]?>"></label><br>
               <label>平均価格：<input type="text" name="averageprice" value="<?=$row["averageprice"]?>"></label><br>
               <label>重量：<input type="text" name="weight" value="<?=$row["weight"]?>"></label><br>
               <label>最大耐荷重：<input type="text" name="maxweight" value="<?=$row["maxweight"]?>"></label><br>
               <label>全長：<input type="text" name="horizontal" value="<?=$row["horizontal"]?>"></label><br>
               <label>全幅：<input type="text" name="vertical" value="<?=$row["vertical"]?>"></label><br>
               <label>全高：<input type="text" name="height" value="<?=$row["height"]?>"></label><br>
               <label>座幅最広：<input type="text" name="maxhori" value="<?=$row["maxhori"]?>"></label><br>
               <label>座幅最広：<input type="text" name="maxhori" value="<?=$row["maxhori"]?>"></label><br>
               <label>座幅最狭：<input type="text" name="minhori" value="<?=$row["minhori"]?>"></label><br>
               <label>座高最高：<input type="text" name="maxhei" value="<?=$row["maxhei"]?>"></label><br>
               <label>座高最低：<input type="text" name="minhei" value="<?=$row["minhei"]?>"></label><br>
               <label>ティルト角度：<input type="text" name="tiltrange" value="<?=$row["tiltrange"]?>"></label><br>
               <label>リクライニング角度：<input type="text" name="recliningrange" value="<?=$row["recliningrange"]?>"></label><br>
               <label>種類：<input type="text" name="type" value="<?=$row["type"]?>"></label><br>
               <label>シート色：<input type="text" name="color" value="<?=$row["color"]?>"></label><br>
               <label>グループ：<input type="text" name="level" value="<?=$row["level"]?>"></label><br>
          <label>ノーパンクタイヤ：</label>
               <label><input type="radio" name="notire" value="1"<?php if($row['notire'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="notire" value="0"<?php if($row['notire'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>アームサポート跳ね上げ：</label>
               <label><input type="radio" name="armsupport" value="1"<?php if($row['armsupport'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="armsupport" value="0"<?php if($row['armsupport'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>フットサポートスイングアウト：</label>
               <label><input type="radio" name="footsupport" value="1"<?php if($row['footsupport'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="footsupport" value="0"<?php if($row['footsupport'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>クッション付き：</label>
               <label><input type="radio" name="cushion" value="1"<?php if($row['cushion'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="cushion" value="0"<?php if($row['cushion'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>シートベルト：</label>
               <label><input type="radio" name="seatbelt" value="1"<?php if($row['seatbelt'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="seatbelt" value="0"<?php if($row['seatbelt'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>座幅変更:：</label>
               <label><input type="radio" name="horizonable" value="1"<?php if($row['horizonable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="horizonable" value="0"<?php if($row['horizonable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>座高変更：</label>
               <label><input type="radio" name="heightable" value="1"<?php if($row['heightable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="heightable" value="0"<?php if($row['heightable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>背張り調整：</label>
               <label><input type="radio" name="backable" value="1"<?php if($row['backable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="backable" value="0"<?php if($row['backable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>座シート張り調整：</label>
               <label><input type="radio" name="seatable" value="1"<?php if($row['seatable'] == 0){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="seatable" value="0"<?php if($row['seatable'] == 1){echo "checked";}?> required>対象外</label><br>
          <label>アームサポート高さ調整：</label>
               <label><input type="radio" name="armsupportable" value="1"<?php if($row['armsupportable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="armsupportable" value="0"<?php if($row['armsupportable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>ハンドル高さ調整：</label>
               <label><input type="radio" name="handable" value="1"<?php if($row['handable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="handable" value="0"<?php if($row['handable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>コンパクト：</label>
               <label><input type="radio" name="compact" value="1"<?php if($row['compact'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="compact" value="0"<?php if($row['compact'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>折りたたみ可：</label>
               <label><input type="radio" name="foldable" value="1"<?php if($row['foldable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="foldable" value="0"<?php if($row['foldable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>小回り機能：</label>
               <label><input type="radio" name="turnable" value="1"<?php if($row['turnable'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="turnable" value="0"<?php if($row['turnable'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>ワイド：</label>
               <label><input type="radio" name="wide" value="1"<?php if($row['wide'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="wide" value="0"<?php if($row['wide'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>立ち上がり転倒防止：</label>
               <label><input type="radio" name="prevention" value="1"<?php if($row['prevention'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="prevention" value="0"<?php if($row['prevention'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>選べるシート色：</label>
               <label><input type="radio" name="colorful" value="1"<?php if($row['colorful'] == 1){echo "checked";}?> required>対象</label>
               <label><input type="radio" name="colorful" value="0"<?php if($row['colorful'] == 0){echo "checked";}?> required>対象外</label><br>
          <label>メモ：</label><br>
               <label><textArea name="text" rows="4" cols="40"><?= $row["text"]?></textArea></label><br>
          <label>表示・非表示：</label>
               <label><input type="radio" name="valid" value="1" <?php if($row['valid'] == 1){echo "checked";}?>>表示</label>
               <label><input type="radio" name="valid" value="0"<?php if($row['valid'] == 0){echo "checked";}?>>非表示</label><br>
               <input type="submit" value="送信" class=button>
               <input type="hidden" name="id" value="<?=$result['id']?>">
          </fieldset>
          </div>
          </form>
          <!-- Main[End] -->
          <footer>
            <div class="footer">
                copyrights Fugukuru All RIghts Reserved.
            </div>
        </footer>
     </body>
</html>
