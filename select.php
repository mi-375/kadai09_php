<?php
session_start();

// funcs.phpを呼び出す
require_once('funcs.php');

//1.  DBに接続
require_once('funcs.php');
$pdo= db_conn();
  

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="record-item">';
        $view .= '<div class="record-row">'; 
        
        $view .= '<p class="record-text">' .
            h($result['date']) . '：' .
            '「' . h($result['user_name']) . '」は' .
            '「' . h($result['friend_name']) . '」のおかげでにっこり！' .
            h($result['content']) . '</p>';
        
    if($_SESSION['kanri_flg'] === 1){

    $view .= '<div class="record-actions">';

        $view .= '<a href="detail.php?id=' . $r["id"] . '" class="link-button">編集</a>';
        $view .= '<a href="delete.php?id=' . $r['id'] . '" class="link-button" onclick="return confirm(\'本当に削除しますか？\');">削除</a>';

    $view .= '</div>';
      
    }

      $view .= '</div>'; 
    $view .= '</div>'; 

    $view .= '</td>';
    $view .= '</tr>';
}
$view .= '</table>';





}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>にっこり記録一覧</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- 装飾要素 -->
    <div class="decoration"></div>
    <div class="decoration"></div>

    <!-- ヘッダー -->
    <header class="header">
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-face-smile"></i>
                にっこり記録一覧
            </a>
            <a href="index.php" class="nav-link">
                <i class="fas fa-plus"></i>
                にっこり記録登録
            </a>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="main-container">
        <div class="content-card">
            <h1 class="page-title">にっこり記録一覧</h1>
            <p class="page-subtitle">登録された記録一覧</p>
            
            <div class="data-container">
                <?php if(empty($view)): ?>
                    <!-- もし $view データがない場合の表示 -->
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <p>まだ記録がありません</p>
                        <p style="margin-top: 0.5rem; font-size: 0.9rem; color: #999;">
                            にっこり記録を登録してみましょう！
                        </p>
                    </div>
                <?php else: ?>
                    <!-- もし $view データが存在する場合 -->
                    <?= $view ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>


</html>