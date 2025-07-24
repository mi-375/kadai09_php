<?php

// id追加
$id    = $_POST['id'];

$user_name = $_POST['user_name'];
$friend_name = $_POST['friend_name'];
$content= $_POST['content'];


//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo= db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table
                        SET 
                            user_name = :user_name,
                            friend_name = :friend_name,
                            content = :content
                        WHERE id = :id;
                        ');

$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':friend_name', $friend_name, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    // header('Location: select.php');
    // exit();

    redirect('select.php');
} 