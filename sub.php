<?php
session_start();
$id = $_GET["id"]; //?id~**を受け取る

require_once("funcs.php");
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
        <meta charset="utf-8">
        <title>ふぐくる：商品詳細ページ</title>
        <meta name="description" content="あいまい検索で福祉用具を見つける">
        <link rel="icon" type="image/png" href="images/favicon_ncs.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
     <body>
        <header class="page-header">
            <h1><a href="index.php"><img class="logo wrapper" src="images/logo_reg.png" alt="ふぐくる"></a></h1>
                <nav>
                    <ul class="main-nav">
                       <a class="button  wrapper" href="login.php">商品情報管理画面へ</a>
                    </ul>
                 </nav>
        </header>
          <!-- Main[Start] -->


          
          <!-- Main[End] -->
          <footer>
            <div class="footer">
                copyrights Fugukuru All RIghts Reserved.
            </div>
        </footer>
     </body>
</html>
