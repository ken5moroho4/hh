<head>
  <!-- アカウント登録フォーム -->
<link rel="stylesheet" href="../css/bootstrap.css">
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
    <meta charset="utf-8">
    <title>新規アカウント登録</title>
    <link rel="stylesheet" href="new_account.css">
  </head>
  <body>
    <div class="new_account">
    <h2>新規アカウント登録</h2>
    <form class="" action="comfirm.php" method="post">
    <div class="form-group">
        <label for="email" class="h3">username</label>
        <input type="text" name="name" required >
      </div>
      <div class="form-group">
        <label for="pass" class="h3">password</label>
        <input type="password" name="pass" required>
      </div>
      <hr>
    <br>
    <br>
    <button name ='action' class="btn btn-warning">登録</button>
        </form>
        </div>
  </body>
</html>
<?php
// ボタンが押下処理
 if(isset($_POST['action'])){
  header('Location:comfirm.php');
 }
 //  データベース接続
try{
 $pdo = new PDO ( "sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/new_account.sqlite3" );
 $pdo->exec("CREATE TABLE IF NOT EXISTS account(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(10),
  pass VARCHAR(10)
)")
;
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
} 
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
