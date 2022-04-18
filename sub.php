<?php
session_start();
$id = $_GET["id"];

require_once("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM welfare_table 
LEFT JOIN img_table ON welfare_table.taiscode = img_table.taiscode WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();
//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
$retailprice = number_format($row['retailprice']);
$popularprice = number_format($row['popularprice']);
$averageprice = number_format($row['averageprice']);
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
        <div>
        <h2 class="sub-title">商品詳細ページ</h2>
            <table class="table">
                <tbody>
                    <tr>
                    <th colspan="3">基本情報</th>
                    </tr>
                    <tr>
                        <td rowspan="9">
                            <p><img src="upload/<?php if(!empty($row['img'])){echo htmlspecialchars($row['img']);}else{echo "20220417095746d5475826ee8491563f6a973e129d092f.jpeg";}?>" alt="商品画像"></p>
                        </td>
                        <td>商品種別</td>
                        <td><?php echo htmlspecialchars($row['category']) ?></td>
                    </tr>
                    <tr>
                        <td>商品名</td>
                        <td><?php echo htmlspecialchars($row['name']) ?></td>
                    </tr>
                    <tr>
                        <td>商品型番</td>
                        <td><?php echo htmlspecialchars($row['modelnumber']) ?></td>
                    </tr>
                    <tr>
                        <td>NCSコード</td>
                        <td><?php echo htmlspecialchars($row['ncscode']) ?></td>
                    </tr>
                    <tr>
                        <td>TAISコード</td>
                        <td><?php echo htmlspecialchars($row['taiscode']) ?></td>
                    </tr>
                    <tr>
                        <td>メーカー</td>
                        <td><?php echo htmlspecialchars($row['manufacturer']) ?></td>
                    </tr>
                    <tr>
                        <td>希望小売価格</td>
                        <td><?php echo $retailprice ."円" ?></td>
                    </tr>
                    <tr>
                        <td>最頻価格</td>
                        <td><?php echo $popularprice ."円" ?></td>
                    </tr>
                    <tr>
                        <td>平均価格</td>
                        <td><?php echo $averageprice ."円" ?></td>
                    </tr>
                    <input type="hidden" name="id" value="<?=$result['id']?>">
                </tbody>
            </table>

        </div>
          <!-- Main[End] -->

        <footer>
            <div class="footer">
                copyrights Fugukuru All RIghts Reserved.
            </div>
        </footer>
    </body>
</html>