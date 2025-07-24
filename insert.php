<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


//1. POSTデータ取得
$user_name = $_POST['user_name'];
$friend_name = $_POST['friend_name'];
$content= $_POST['content'];


//2. DB接続
// try {
//   $db_name = 'kuma-deploy_gs_bm_table';    //データベース名
//   $db_id   = 'kuma-deploy_gs_bm_table';      //アカウント名
//   $db_pw   = 'gumagu115';      //パスワード：MAMPは'root'
//   $db_host = 'mysql3109.db.sakura.ne.jp'; //DBホスト
//   $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
//   return $pdo;
// } catch (PDOException $e) {
//   exit('DB Connection Error:' . $e->getMessage());
// }
require_once('funcs.php');
$pdo= db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,user_name,friend_name,content,date)
VALUES(NULL,:user_name,:friend_name,:content,now() ) ");

//  2. バインド変数を用意
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':friend_name', $friend_name, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  // 成功時の表示ページを表示
  ?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <title>登録完了</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
      <div class="complete-message">
          にっこり記録が登録されました☺︎
      </div>

      <div class="button-container">
          <a href="select.php" class="link-button">一覧を見る</a>
          <a href="index.php" class="link-button">続けて記録する</a>
      </div>
  </body>
  </html>

  <?php
}
