<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 にっこり記録アプリ</title>

    <!-- アイコン読み込み -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<head>





    <meta charset="utf-8">
    <title>にっこり記録
    </title>
    <link rel="stylesheet" href="css/style.css">
</head>

    <!-- 装飾要素 -->
    <div class="decoration"></div>
    <div class="decoration"></div>


    <!-- メインコンテンツ -->
    <header class="header">
   <div class="nav-container">

   <div class="nav-left">

            <a href="#" class="logo">
                <i class="fas fa-face-smile"></i>
                にっこり記録登録
            </a>

    </div>

    <div class="nav-right">
            <a class="login-button" href="login.php">ログイン</a>
            <a class="logout-button" href="logout.php">ログアウト</a>


            <a href="select.php" class="nav-link">
                <i class="fas fa-file-alt"></i>
                にっこり記録一覧
            </a>

    </div>
    </div>

        </header>

    <main class="main-container form-page">
        <div class="form-card">

          <h1 class="form-title">にっこり記録</h1>
            <p class="form-subtitle">誰かのおかげでにっこりしたことを記録しましょう☺︎</p>
            
            <form method="post" action="insert.php">
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> 自分の名前
                    </label>
                    <input type="text" id="user_name" name="user_name" class="form-input" placeholder="例：くまこ" required>
                </div>

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> 相手の名前
                    </label>
                    <input type="text" id="friend_name" name="friend_name" class="form-input" placeholder="例：くまみ" required>
                </div>

                <div class="form-group">
                    <label for="content" class="form-label">
                        <i class="fas fa-comment"></i> にっこりしたこと
                    </label>
                    <textarea id="content" name="content" class="form-textarea" placeholder="例：〇〇をしてくれた、〇〇と言ってもらえた☺︎" required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-pen"></i>
                    記録する
                </button>
            </form>
        </div>
    </main>
</body>

</html>