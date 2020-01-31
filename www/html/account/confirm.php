<!-- アカウント登録完了フォーム -->
<!DOCTYPE html>
<html lang="ja">

<header>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</header>

<body>
  <div class="new_account">
    <h1>登録完了</h1>
    <?php
    try {
      $pdo = new PDO('sqlite:../cms.db');

      //  テーブルの中身挿入
      $name = $_POST["name"];
      $display_pass = $_POST["pass"];
      $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
      $sql = "
        INSERT INTO account(
          name,pass
        ) VALUES (
          '${name}',
          '${pass}'
        )";
      $res = $pdo->query($sql);
    } catch (Exception $e) {
      echo $e->getMessage() . PHP_EOL;
    }
    echo "<h3>ユーザー名:${name}</h3><br />";
    echo "<h3>パスワード:${display_pass}</h3>";
    ?>
  </div>
  <a href="../account/login.php"><button class="btn btn-warning">ログイン画面へ</button></a>
</body>

</html>
<style>
  body {
    text-align: center;
  }
</style>