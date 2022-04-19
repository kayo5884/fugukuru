<?php
session_start();

//①データ取得ロジックを呼び出す
require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM welfare_table, img_table WHERE welfare_table.taiscode = img_table.taiscode");
$status = $stmt->execute();

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
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

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
                        <p>利用シーン</p>
                        <select name="seen" class="form-control" id="inputseen">
                            <option value="0" <?php echo empty($_GET['seen']) ? 'selected' : '' ?>>選択しない</option>
                            <option value="1" <?php echo isset($_GET['seen']) && $_GET['seen'] == '1' ? 'selected' : '' ?>>（未設定）ベッドからの起き上がり</option>
                            <option value="2" <?php echo isset($_GET['seen']) && $_GET['seen'] == '2' ? 'selected' : '' ?>>（未設定）イスからの立ち上がり</option>
                            <option value="3" <?php echo isset($_GET['seen']) && $_GET['seen'] == '3' ? 'selected' : '' ?>>移動するとき</option>
                            <option value="4" <?php echo isset($_GET['seen']) && $_GET['seen'] == '4' ? 'selected' : '' ?>>（未設定）入浴するとき</option>
                            <option value="5" <?php echo isset($_GET['seen']) && $_GET['seen'] == '5' ? 'selected' : '' ?>>（未設定）排泄するとき</option>
                        </select>
                    </div>
                    <hr>
                        <div class="radiobox">
                        <p>介護レベル</p>
                            <input id="inputlevel1" class="radiobutton level" name="level" type="radio" value="1" <?php echo isset($_GET['level']) && $_GET['level'] == '1' ? 'checked' : '' ?>>
                            <label class ="label" for="inputlevel1" >1</label>
                            <input id="inputlevel2" class="radiobutton level" name="level" type="radio" value="2" <?php echo isset($_GET['level']) && $_GET['level'] == '2' ? 'checked' : '' ?>>
                            <label class ="label" for="inputlevel2" >2</label>
                            <input id="inputlevel3" class="radiobutton level" name="level" type="radio" value="3" <?php echo isset($_GET['level']) && $_GET['level'] == '3' ? 'checked' : '' ?>>
                            <label class ="label" for="inputlevel3" >3</label>
                            <input id="inputlevel4" class="radiobutton level" name="level" type="radio" value="4" <?php echo isset($_GET['level']) && $_GET['level'] == '4' ? 'checked' : '' ?>>
                            <label class ="label" for="inputlevel4" >4</label>
                            <input id="inputlevel5" class="radiobutton level" name="level" type="radio" value="5" <?php echo isset($_GET['level']) && $_GET['level'] == '5' ? 'checked' : '' ?>>
                            <label class ="label" for="inputlevel5" >5</label>
                        </div>
                    <hr>
                    <div class="radiobox">
                    <p>身長</p>
                        <input id="inputshincho1" class="radiobutton" name="shincho" type="radio" value="1" <?php echo isset($_GET['shincho']) && $_GET['shincho'] == '1' ? 'checked' : '' ?>>
                        <label class ="label" for="inputshincho1" >150cm未満の方</label>
                        <input id="inputshincho2" class="radiobutton" name="shincho" type="radio" value="2" <?php echo isset($_GET['shincho']) && $_GET['shincho'] == '2' ? 'checked' : '' ?>>
                        <label class ="label" for="inputshincho2" >150cm〜170cm未満</label>
                        <input id="inputshincho3" class="radiobutton" name="shincho" type="radio" value="3" <?php echo isset($_GET['shincho']) && $_GET['shincho'] == '3' ? 'checked' : '' ?>>
                        <label class ="label" for="inputshincho3" >170cm以上の方</label>
                    </div>
                    <hr>
                    <div class="radiobox">
                    <p>体重</p>
                        <input id="inputtaijyu1" class="radiobutton" name="taijyu" type="radio" value="1" <?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '1' ? 'checked' : '' ?>>
                        <label class ="label" for="inputtaijyu1" >75kg未満の方</label>
                        <input id="inputtaijyu2" class="radiobutton" name="taijyu" type="radio" value="2" <?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '2' ? 'checked' : '' ?>>
                        <label class ="label" for="inputtaijyu2" >75kg〜100kg未満の方</label>
                        <input id="inputtaijyu3" class="radiobutton" name="taijyu" type="radio" value="3" <?php echo isset($_GET['taijyu']) && $_GET['taijyu'] == '3' ? 'checked' : '' ?>>
                        <label class ="label" for="inputtaijyu3" >100kg以上の方</label>
                    </div>
                    <hr>
                    <div class="radiobox">
                    <p>主にどなたが操作しますか</p>
                        <input id="inputsousa1" class="radiobutton" name="sousa" type="radio" value="1" <?php echo isset($_GET['sousa']) && $_GET['sousa'] == '1' ? 'checked' : '' ?>>
                        <label class ="label" for="inputsousa1" >自分でこぐ</label>
                        <input id="inputsousa2" class="radiobutton" name="sousa" type="radio" value="2" <?php echo isset($_GET['sousa']) && $_GET['sousa'] == '2' ? 'checked' : '' ?>>
                        <label class ="label" for="inputsousa2" >介助者が後ろから押す</label>
                    </div>

                    <details>
                        <!-- <dl>詳細検索</dl> -->
                        <dl>
                            <div class="checkbox">
                            <div> 仕様：</div>
                                <div class="shiyo">
                                <input id="inputshiyo1" class="checkbutton" name="notire" type="checkbox" value="1" <?php echo isset($_GET['notire']) && $_GET['notire'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputshiyo1" >パンクしにくい</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputshiyo2" class="checkbutton" name="armsupport" type="checkbox" value="1" <?php echo isset($_GET['armsupport']) && $_GET['armsupport'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputshiyo2" >座ったまま移乗しやすい</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputshiyo3" class="checkbutton" name="footsupport" type="checkbox" value="1" <?php echo isset($_GET['footsupport']) && $_GET['footsupport'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputshiyo3" >足置きを外せる</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputshiyo4" class="checkbutton" name="cushion" type="checkbox" value="1" <?php echo isset($_GET['cushion']) && $_GET['cushion'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputshiyo4" >クッション付き</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputshiyo5" class="checkbutton" name="seatbelt" type="checkbox" value="1" <?php echo isset($_GET['seatbelt']) && $_GET['seatbelt'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputshiyo5" >ノーパンクタイヤ</label>
                                </div>
                            </div>
                            <hr>
                            <div class="checkbox">
                            <div> 調整機能：</div>
                                <div class="shiyo">
                                <input id="inputchosei1" class="checkbutton" name="horizonable" type="checkbox" value="1" <?php echo isset($_GET['horizonable']) && $_GET['horizonable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei1" >座幅変更</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputchosei2" class="checkbutton" name="heightable" type="checkbox" value="1" <?php echo isset($_GET['heightable']) && $_GET['heightable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei2" >座高変更</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputchosei3" class="checkbutton" name="backable" type="checkbox" value="1" <?php echo isset($_GET['backable']) && $_GET['backable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei3" >背シート調整</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputchosei4" class="checkbutton" name="seatable" type="checkbox" value="1" <?php echo isset($_GET['seatable']) && $_GET['seatable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei4" >座シート調整</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputchosei5" class="checkbutton" name="armsupportable" type="checkbox" value="1" <?php echo isset($_GET['armsupportable']) && $_GET['armsupportable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei5" >ひじ置き高さ調整</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputchosei6" class="checkbutton" name="handable" type="checkbox" value="1" <?php echo isset($_GET['handable']) && $_GET['handable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputchosei6" >介助ハンドル高さ調整</label>
                                </div>
                            </div>
                            <hr>
                            <div class="checkbox">
                            <div> 特徴：</div>
                                <div class="shiyo">
                                <input id="inputtokucho1" class="checkbutton" name="compact" type="checkbox" value="1" <?php echo isset($_GET['compact']) && $_GET['compact'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho1" >コンパクト</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputtokucho2" class="checkbutton" name="foldable" type="checkbox" value="1" <?php echo isset($_GET['foldable']) && $_GET['foldable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho2" >折りたたみ式</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputtokucho3" class="checkbutton" name="turnable" type="checkbox" value="1" <?php echo isset($_GET['turnable']) && $_GET['turnable'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho3" >小回り機能</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputtokucho4" class="checkbutton" name="wide" type="checkbox" value="1" <?php echo isset($_GET['wide']) && $_GET['wide'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho4" >ワイド</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputtokucho5" class="checkbutton" name="prevention" type="checkbox" value="1" <?php echo isset($_GET['prevention']) && $_GET['prevention'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho5" >立ち上がり転倒防止</label>
                                </div>
                                <div class="shiyo">
                                <input id="inputtokucho6" class="checkbutton" name="colorful" type="checkbox" value="1" <?php echo isset($_GET['colorful']) && $_GET['colorful'] == '1' ? 'checked' : '' ?>>
                                <label class ="label" for="inputtokucho6" >選べるシート色</label>
                                </div>
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
