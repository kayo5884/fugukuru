<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ふぐくる：ログイン</title>
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
            <h1><a href="index.php"><img class="logo wrapper" src="images/logo_reg.png" alt="ふぐくる"></a></h1>
        </header>
        
        <div class=login index>
            <h2>管理者ログインフォーム</h2>
            <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
            <form name="form1" action="login_act.php" method="post">
                ID:<input type="text" name="lid"/>
                PW:<input type="password" name="lpw"/><br>
                <input type="submit" value="ログイン" class="button"/>
            </form>
        </div>
        <footer>
            <div class="footer">
                copyrights Fugukuru All RIghts Reserved.
            </div>
        </footer>
    </body>
</html>