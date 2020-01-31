<!DOCTYPE html>
<html lang="ja">

<header>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</header>

<body>
  <!-- アカウント新規登録 -->
  <div class="card mx-auto" style="width: 40rem;">
    <div class="card-header">
      新規アカウント登録
    </div>
    <div class="card-body">
      <form action="confirm.php" method="post">
        <div class="form-group row">
          <label for="account" class="col-sm-4 col-form-label">アカウント名</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="account" name="name" placeholder="ログインアカウントを入力してください" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password"" class="col-sm-4 col-form-label">パスワード</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" name="pass" placeholder="パスワードを入力してください" required>
          </div>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-outline-primary">登録</button>
          <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>

<?php
// ボタンが押下処理
if (isset($_POST['action'])) {
  header('Location:confirm.php');
}

//  データベース接続
try {
  $pdo = new PDO('sqlite:../cms.db');
  $pdo->exec("CREATE TABLE IF NOT EXISTS account(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(10),
  pass VARCHAR(10)
)");
} catch (Exception $e) {
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
