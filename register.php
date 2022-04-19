<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ふぐくる：新規登録</title>
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
    <form method="post" action="insert.php">
      <div class="jumbotron">
      <fieldset>
        <legend>商品管理画面</legend>
        <label>商品種別：<input type="text" name="category"></label><br>
        <label>商品名：<input type="text" name="name"></label><br>
        <label>商品型番：<input type="text" name="modelnumber"></label><br>
        <label>NCSコード:<input type="text" name="ncscode"></label><br>
        <label>TAISコード:<input type="text" name="taiscode"></label><br>
        <label>メーカー：<input type="text" name="manufacturer"></label><br>
        <label>希望小売価格：<input type="text" name="retailprice"></label><br>
        <label>最頻価格：<input type="text" name="popularprice"></label><br>
        <label>平均価格：<input type="text" name="averageprice"></label><br>
        <label>重量：<input type="text" name="weight"></label><br>
        <label>最大対荷重：<input type="text" name="maxweight"></label><br>
        <label>全長：<input type="text" name="horizontal"></label><br>
        <label>全幅：<input type="text" name="vertical"></label><br>
        <label>全高：<input type="text" name="height"></label><br>
        <label>座幅最広：<input type="text" name="maxhori"></label><br>
        <label>座幅最狭：<input type="text" name="minhori"></label><br>
        <label>座高最高：<input type="text" name="maxhei"></label><br>
        <label>座高最低：<input type="text" name="minhei"></label><br>
        <label>ティルト角度：<input type="text" name="tiltrange"></label><br>
        <label>リクライニング角度：<input type="text" name="recliningrange"></label><br>
        <label>種類：<input type="text" name="type"></label><br>
        <label>シート色：<input type="text" name="color"></label><br>
        <label>グループ：<input type="text" name="level"></label><br>
          <label>ノーパンクタイヤ:</label>
          <label><input type="radio" name="notire" value="1">対象</label>
          <label><input type="radio" name="notire" value="0">対象外</label><br>
          <label>アームサポート跳ね上げ:</label>
          <label><input type="radio" name="armsupport" value="1">対象</label>
          <label><input type="radio" name="armsupport" value="0">対象外</label><br>
          <label>フットサポートスイングアウト:</label>
          <label><input type="radio" name="footsupport" value="1">対象</label>
          <label><input type="radio" name="footsupport" value="0">対象外</label><br>
          <label>クッション付き:</label>
          <label><input type="radio" name="cushion" value="1">対象</label>
          <label><input type="radio" name="cushion" value="0">対象外</label><br>
          <label>シートベルト:</label>
          <label><input type="radio" name="seatbelt" value="1">対象</label>
          <label><input type="radio" name="seatbelt" value="0">対象外</label><br>
          <label>座幅変更:</label>
          <label><input type="radio" name="horizonable" value="1">対象</label>
          <label><input type="radio" name="horizonable" value="0">対象外</label><br>
          <label>座高変更:</label>
          <label><input type="radio" name="heightable" value="1">対象</label>
          <label><input type="radio" name="heightable" value="0">対象外</label><br>
          <label>背張り調整:</label>
          <label><input type="radio" name="backable" value="1">対象</label>
          <label><input type="radio" name="backable" value="0">対象外</label><br>
          <label>座シート張り調整:</label>
          <label><input type="radio" name="seatable" value="1">対象</label>
          <label><input type="radio" name="seatable" value="0">対象外</label><br>
          <label>ハンドル高さ調整:</label>
          <label><input type="radio" name="handable" value="1">対象</label>
          <label><input type="radio" name="handable" value="0">対象外</label><br>
          <label>アームサポート高さ調整:</label>
          <label><input type="radio" name="armsupportable" value="1">対象</label>
          <label><input type="radio" name="armsupportable" value="0">対象外</label><br>
          <label>コンパクト:</label>
          <label><input type="radio" name="compact" value="1">対象</label>
          <label><input type="radio" name="compact" value="0">対象外</label><br>
          <label>折りたたみ可:</label>
          <label><input type="radio" name="foldable" value="1">対象</label>
          <label><input type="radio" name="foldable" value="0">対象外</label><br>
          <label>小回り機能:</label>
          <label><input type="radio" name="turnable" value="1">対象</label>
          <label><input type="radio" name="turnable" value="0">対象外</label><br>
          <label>ワイド:</label>
          <label><input type="radio" name="wide" value="1">対象</label>
          <label><input type="radio" name="wide" value="0">対象外</label><br>
          <label>立ち上がり転倒防止:</label>
          <label><input type="radio" name="prevention" value="1">対象</label>
          <label><input type="radio" name="prevention" value="0">対象外</label><br>
          <label>選べるシート色:</label>
          <label><input type="radio" name="colorful" value="1">対象</label>
          <label><input type="radio" name="colorful" value="0">対象外</label><br>
          <label>メモ：</label><br>
            <textArea name="text" rows="4" cols="40" placeholder="コメントを記入してください"></textArea></label><br>
          <label>表示・非表示:</label>
          <label><input type="radio" name="valid" value="1">表示</label>
          <label><input type="radio" name="valid" value="0">非表示</label><br>
        <input type="submit" class=button value="送信">
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
