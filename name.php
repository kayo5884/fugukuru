<?php
session_start();

//①データ取得ロジックを呼び出す
require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM welfare_table, img_table WHERE welfare_table.taiscode = img_table.taiscode");
$status = $stmt->execute();

include_once('name_act.php');
$userData = getUserData($_GET);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ふぐくる：商品名検索</title>
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

        <h2 class="col-xs-6 col-xs-offset-3">商品名から探す</h2>
        <div class="col-xs-6 col-xs-offset-3 well">
            <?php //②検索フォーム ?>
            <form method="get">
                <div class="form-group">
                    <label for="inputcategory">商品種別</label>
                    <select name="category" class="form-control" id="inputcategory">
                        <option value="0" <?php echo empty($_GET['category']) ? 'selected' : '' ?>>選択しない</option>
                        <option value="車いす" <?php echo isset($_GET['category']) && $_GET['category'] == '車いす' ? 'selected' : '' ?>>車いす</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputname">名前</label>
                    <input name="name" class="form-control" id="inputname" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputmodelnumber">商品型番</label>
                    <input name="modelnumber" class="form-control" id="inputmodelnumber" value="<?php echo isset($_GET['modelnumber']) ? htmlspecialchars($_GET['modelnumber']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputncscode">NCSコード</label>
                    <input name="ncscode" class="form-control" id="inputncscode" value="<?php echo isset($_GET['ncscode']) ? htmlspecialchars($_GET['ncscode']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputtaiscode">TAISコード</label>
                    <input name="taiscode" class="form-control" id="inputtaiscode" value="<?php echo isset($_GET['taiscode']) ? htmlspecialchars($_GET['taiscode']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="inputmanufacturer">メーカー</label>
                    <select name="manufacturer" class="form-control" id="manufacturer">
                        <option value="0" <?php echo empty($_GET['manufacturer']) ? 'selected' : '' ?>>選択しない</option>
                        <option value="ミキ" <?php echo isset($_GET['manufacturer']) && $_GET['manufacturer'] == 'ミキ' ? 'selected' : '' ?>>ミキ</option>
                        <option value="カワムラサイクル" <?php echo isset($_GET['manufacturer']) && $_GET['manufacturer'] == 'カワムラサイクル' ? 'selected' : '' ?>>カワムラサイクル</option>
                        <option value="松永製作所" <?php echo isset($_GET['manufacturer']) && $_GET['manufacturer'] == '松永製作所' ? 'selected' : '' ?>>松永製作所</option>
                        <option value="日進医療器" <?php echo isset($_GET['manufacturer']) && $_GET['manufacturer'] == '日進医療器' ? 'selected' : '' ?>>日進医療器</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputtype">種類</label>
                    <label><input type="radio" name="type" class="form-control" id="inputtype" value="自走"<?php echo isset($_GET['type']) && $_GET['type'] == '自走' ? 'checked' : '' ?>>自走</label>
                    <label><input type="radio" name="type" class="form-control" id="inputtype" value="介助"<?php echo isset($_GET['type']) && $_GET['type'] == '介助' ? 'checked' : '' ?>>介助</label>
                </div>
                <button type="submit" class="btn btn-default" name="search">検索</button>
            </form>
        </div>

        <div class="col-xs-6 col-xs-offset-3">
            <?php //③取得データを表示する ?>
            <?php if(isset($userData) && count($userData)): ?>
                <p class="alert alert-success"><?php echo count($userData) ?>件見つかりました。</p>
                <table class="table">
                    <thead>
                        <tr>
                        <th>画像</th>
                        <th>名前</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($userData as $row): ?>
                            <tr>
                            <td><p><img src="upload/<?php if(!empty($row['img'])){echo htmlspecialchars($row['img']);}else{echo "20220417095746d5475826ee8491563f6a973e129d092f.jpeg";}?>" alt="商品画像"></p></td>
                            <td><a href="sub.php?id=<?php echo(int) $row['id']?>"><?php echo htmlspecialchars($row['name']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="alert alert-danger">検索対象は見つかりませんでした。</p>
            <?php endif; ?>

        </div>
    </body>
</html>