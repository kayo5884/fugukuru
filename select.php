<?php
session_start();

require_once("funcs.php");
// loginCheck();
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM welfare_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  // whileはカッコお腹の条件がtrueの時にずっと{}の中の処理が走り続ける
  // phpのドットはJSのプラスと一緒で、文字列の結合ができる！！
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .=$result['ncscode'].':'.$result['name'];
    $view .= '</a>';
    $view .= '<a href="detail.php?id='.$r["id"].'">';
    $view .= '</a>';
    $view .= '<a class="btn btn-danger" href="detail.php?id='.$result["id"].'">';
    $view .= '[<i class="update"></i>更新する]';
    $view .= '</a>';
    $view .= '<a class="btn btn-danger" href="delete.php?id='.$result["id"].'">';
    $view .= '[<i class="glyphicon glyphicon-remove"></i>削除する]';
    $view .= '</a>';
    $view .= "</p>";
  }
}
?>

<!DOCTYPE html>
  <html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ふぐくる：商品管理画面</title>
    <meta name="description" content="あいまい検索で福祉用具を見つける">
    <link rel="icon" type="image/png" href="images/favicon_ncs.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
  </head>

  <body id="main">
    <div>
      <header class="page-header">
      <h1><a href="index.php"><img class="logo wrapper" src="images/logo_reg.png" alt="ふぐくる"></a></h1>
      <nav>
          <ul class="main-nav">
            <a class="button  wrapper" href="register.php">商品新規登録</a>
          </ul>
        </nav>
      </header>
      <div>
          <div class="container jumbotron"><?= $view ?></div>
      </div>
    </div>
    <footer>
            <div class="footer">
                copyrights Fugukuru All RIghts Reserved.
            </div>
        </footer>
  </body>
</html>