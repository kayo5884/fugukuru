<?php 
//①データ取得ロジックを呼び出す
include_once('main_act.php');
$userData = getUserData($_GET);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ふぐくる：身体状況検索</title>
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

        <h2 class="col-xs-6 col-xs-offset-3">身体状況から探す</h2>
            <div   div class="col-xs-6 col-xs-offset-3 well">
                <?php //②検索フォーム ?>
                <form method="get">
                    <div class="form-group">
                        <label for="inputseen">利用シーン</label>
                        <select name="seen" class="form-control" id="inputseen">
                            <option value="0" <?php echo empty($_GET['seen']) ? 'selected' : '' ?>>選択しない</option>
                            <option value="1" <?php echo isset($_GET['seen']) && $_GET['seen'] == '1' ? 'selected' : '' ?>>（未設定）ベッドからの起き上がり</option>
                            <option value="2" <?php echo isset($_GET['seen']) && $_GET['seen'] == '2' ? 'selected' : '' ?>>（未設定）イスからの立ち上がり</option>
                            <option value="3" <?php echo isset($_GET['seen']) && $_GET['seen'] == '3' ? 'selected' : '' ?>>移動するとき</option>
                            <option value="4" <?php echo isset($_GET['seen']) && $_GET['seen'] == '4' ? 'selected' : '' ?>>（未設定）入浴するとき</option>
                            <option value="5" <?php echo isset($_GET['seen']) && $_GET['seen'] == '5' ? 'selected' : '' ?>>（未設定）排泄するとき</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputlevel">介護レベル</label>
                        <label><input type="radio" name="level" class="form-control" id="inputlevel" value="1"<?php echo isset($_GET['level']) && $_GET['level'] == '1' ? 'checked' : '' ?>>1</label>
                        <label><input type="radio" name="level" class="form-control" id="inputlevel" value="2"<?php echo isset($_GET['level']) && $_GET['level'] == '2' ? 'checked' : '' ?>>2</label>
                        <label><input type="radio" name="level" class="form-control" id="inputlevel" value="3"<?php echo isset($_GET['level']) && $_GET['level'] == '3' ? 'checked' : '' ?>>3</label>
                        <label><input type="radio" name="level" class="form-control" id="inputlevel" value="4"<?php echo isset($_GET['level']) && $_GET['level'] == '4' ? 'checked' : '' ?>>4</label>
                        <label><input type="radio" name="level" class="form-control" id="inputlevel" value="5"<?php echo isset($_GET['level']) && $_GET['level'] == '5' ? 'checked' : '' ?>>5</label>
                    </div>
                    <div class="form-group">
                        <label for="inputshincho">身長</label>
                        <label><input type="radio" name="shincho" class="form-control" id="inputshincho" value="1"<?php echo isset($_GET['shincho']) && $_GET['shincho'] == '1' ? 'checked' : '' ?>>150cm未満の方</label>
                        <label><input type="radio" name="shincho" class="form-control" id="inputshincho" value="2"<?php echo isset($_GET['shincho']) && $_GET['shincho'] == '2' ? 'checked' : '' ?>>150cm〜170cm未満</label>
                        <label><input type="radio" name="shincho" class="form-control" id="inputshincho" value="3"<?php echo isset($_GET['shincho']) && $_GET['shincho'] == '3' ? 'checked' : '' ?>>170cm以上の方</label>
                    </div>
                    <div class="form-group">
                        <label for="inputtaijyu">体重</label>
                        <label><input type="radio" name="taijyu" class="form-control" id="inputtaijyu" value="1"<?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '1' ? 'checked' : '' ?>>75kg未満の方</label>
                        <label><input type="radio" name="taijyu" class="form-control" id="inputtaijyu" value="2"<?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '2' ? 'checked' : '' ?>>75kg〜100kg未満の方</label>
                        <label><input type="radio" name="taijyu" class="form-control" id="inputtaijyu" value="3"<?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '3' ? 'checked' : '' ?>>100kg以上の方</label>
                    </div>
                    <div class="form-group">
                        <label for="inputsousa">主にどなたが操作しますか</label>
                        <label><input type="radio" name="sousa" class="form-control" id="inputsousa" value="1"<?php echo isset($_GET['sousa']) && $_GET['sousa'] == '1' ? 'checked' : '' ?>>自分でこぐ</label>
                        <label><input type="radio" name="sousa" class="form-control" id="inputsousa" value="2"<?php echo isset($_GET['sousa']) && $_GET['sousa'] == '2' ? 'checked' : '' ?>>介助者が後ろから押す</label>
                    </div>

                    <details>
                        <dl>詳細検索</dl>
                        <dl>
                            <div class="form-group">
                                <label for="inputshiyo">仕様：</label>
                                <label><input type="checkbox" name="notire" class="form-control" id="inputshiyo" value="1"<?php echo isset($_GET['notire']) && $_GET['notire'] == '1' ? 'checked' : '' ?>>ノーパンクタイヤ</label>
                                <label><input type="checkbox" name="armsupport" class="form-control" id="inputshiyo" value="1"<?php echo isset($_GET['armsupport']) && $_GET['armsupport'] == '1' ? 'checked' : '' ?>>座ったまま移乗しやすい</label>
                                <label><input type="checkbox" name="footsupport" class="form-control" id="inputshiyo" value="1"<?php echo isset($_GET['footsupport']) && $_GET['footsupport'] == '1' ? 'checked' : '' ?>>足置きを外せる</label>
                                <label><input type="checkbox" name="cushion" class="form-control" id="inputshiyo" value="1"<?php echo isset($_GET['cushion']) && $_GET['cushion'] == '1' ? 'checked' : '' ?>>クッション付き</label>
                                <label><input type="checkbox" name="seatbelt" class="form-control" id="inputshiyo" value="1"<?php echo isset($_GET['seatbelt']) && $_GET['seatbelt'] == '1' ? 'checked' : '' ?>>シートベルト付き</label>
                            </div>
                            <div class="form-group">
                                <label for="inputchosei">調整機能：</label>
                                <label><input type="checkbox" name="horizonable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['horizonable']) && $_GET['horizonable'] == '1' ? 'checked' : '' ?>>座幅変更</label>
                                <label><input type="checkbox" name="heightable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['heightable']) && $_GET['heightable'] == '1' ? 'checked' : '' ?>>座高変更</label>
                                <label><input type="checkbox" name="backable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['backable']) && $_GET['backable'] == '1' ? 'checked' : '' ?>>背シート調整</label>
                                <label><input type="checkbox" name="seatable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['seatable']) && $_GET['seatable'] == '1' ? 'checked' : '' ?>>座シート調整</label>
                                <label><input type="checkbox" name="armsupportable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['armsupportable']) && $_GET['armsupportable'] == '1' ? 'checked' : '' ?>>ひじ置き高さ調整</label>
                                <label><input type="checkbox" name="handable" class="form-control" id="inputchosei" value="1"<?php echo isset($_GET['handable']) && $_GET['handable'] == '1' ? 'checked' : '' ?>>介助ハンドル高さ調整</label>
                            </div>
                            <div class="form-group">
                                <label for="inputtokucho">特徴：</label>
                                <label><input type="checkbox" name="compact" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['compact']) && $_GET['compact'] == '1' ? 'checked' : '' ?>>コンパクト</label>
                                <label><input type="checkbox" name="foldable" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['foldable']) && $_GET['foldable'] == '1' ? 'checked' : '' ?>>折りたたみ式</label>
                                <label><input type="checkbox" name="turnable" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['turnable']) && $_GET['turnable'] == '1' ? 'checked' : '' ?>>小回り機能</label>
                                <label><input type="checkbox" name="wide" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['wide']) && $_GET['wide'] == '1' ? 'checked' : '' ?>>ワイド</label>
                                <label><input type="checkbox" name="prevention" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['prevention']) && $_GET['prevention'] == '1' ? 'checked' : '' ?>>立ち上がり転倒防止</label>
                                <label><input type="checkbox" name="colorful" class="form-control" id="inputtokucho" value="1"<?php echo isset($_GET['colorful']) && $_GET['colorful'] == '1' ? 'checked' : '' ?>>選べるシート色</label>
                            </div>
                        </dl>
                    </details>
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
                                <th>名前</th>
                                <th>商品型番</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($userData as $row): ?>
                                <tr>
                                    <td><a href="sub.php?id=<?php echo(int) $row['id']?>"><?php echo htmlspecialchars($row['name']) ?></td>
                                    <td><?php echo htmlspecialchars($row['modelnumber']) ?></a></td>
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
