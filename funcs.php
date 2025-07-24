<?php
//共通に使う関数を記述
//XSS対策（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str,ENT_QUOTES);
}

//DB接続関数：db_conn() 

function db_conn() {


// 非表示


}


// function db_conn()
// {
//     try {
//         $db_name = 'gs_db_kadai05';    //データベース名
//         $db_id   = 'root';      //アカウント名
//         $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
//         $db_host = 'localhost'; //DBホスト
//         $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
//         return $pdo;
//     } catch (PDOException $e) {
//         exit('DB Connection Error:' . $e->getMessage());
//     }
// }

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){

    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()

// ログインしないと見れない画面については、この関数を毎回入れる
function logincheck(){
    // select.phpのをうつす
        if( !isset ($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id() ){
    
            // exitはそのまま出口という意味、ログインできない場合はこの後の処理ができない
            exit('LOGIN ERROR');
        
        }
        
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    
    }