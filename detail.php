<?php

session_start();
require_once('funcs.php');
logincheck();





 /**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */



 $id=$_GET['id'];


 require_once('funcs.php');
 $pdo= db_conn();
 

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
$result=$stmt->fetch();
// データを取得

}


// var_dump($result);


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
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


    <!-- メインコンテンツ -->
    <main class="main-container form-page">
        <div class="form-card">
            <h1 class="form-title">にっこり記録</h1>
            <p class="form-subtitle">誰かのおかげでにっこりしたことを記録しましょう☺︎</p>
            
            <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?= h($result['id']) ?>">
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> 自分の名前
                    </label>
                    <input type="text" id="user_name" name="user_name" class="form-input" value="<?= h($result['user_name']) ?>" required>                </div>

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> 相手の名前
                    </label>
                    <input type="text" id="friend_name" name="friend_name" class="form-input" value="<?= h($result['friend_name']) ?>" required>                </div>

                <div class="form-group">
                    <label for="content" class="form-label">
                        <i class="fas fa-comment"></i> にっこりしたこと
                    </label>
                    <textarea id="content" name="content" class="form-textarea" required><?= h($result['content']) ?></textarea>                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-pen"></i>
                    更新する
                </button>
                <div class="button-container" >
      <a href="select.php" class="link-button">戻る</a>
    </div>
            </form>
        </div>
    </main>
</body>

</html>
