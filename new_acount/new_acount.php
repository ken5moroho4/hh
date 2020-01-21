<head>
    <meta charset="utf-8">
    <title>新規アカウント登録</title>
    <link rel="stylesheet" href="new_acount.css">
  </head>
  <body>
    <h1>新規アカウント登録</h1>
    <form class="" action="comfirm.php" method="post">
    <h2>ユーザー名</h2>
    <input type="text" name="name" required>
    <h2>メールアドレス</h2>
    <input type="text" name="male" required>
    <h2>パスワード設定</h2>
    <input type="password" name="pass" required>
    <!-- <input type="submit" name="submit"> -->
    <button name ='action'>送信</button>
        </form>
  </body>
</html>
<?php
 if(isset($_POST['action'])){
  header('Location:comfirm.php');
 }
 //  データベース接続
try{
 $pdo = new PDO ( "sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/sample.sqlite3" );
 $pdo->exec("CREATE TABLE IF NOT EXISTS acount(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(10),
  male VARCHAR(10),
  age VARCHAR(10),
  price INTEGER
)")
;
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
 
// テーブルの中身挿入
 

  //空欄かの確認
session_start();
if (isset($_POST["action"])) {
  if (empty($_POST["name"])) { 
      $errorMessage = 'ユーザーIDが未入力です。';
  } else if (empty($_POST["pass"])) {
      $errorMessage = 'パスワードが未入力です。';
  } 
}
 

?>
