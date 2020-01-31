<!DOCTYPE html>
<html lang="ja">

<header>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</header>

<body>
  <?php
  try {
    // DB接続
    $pdo = new PDO('sqlite:../cms.db');

    // param取得
    $login_name = $_POST["name"];
    $login_pass = $_POST["pass"];

    $sql = "SELECT * FROM account WHERE name = '${login_name}'";
    $stmt = $pdo->query($sql);
    var_dump($stmt);
    foreach ($stmt as $row) {
      // データベースのフィールド名で出力
      if ($_POST['name'] = $row['name']) {
        if (password_verify($_POST['pass'], $row['pass'])) {
          header('Location:../form/form.php');
        }
      }
    }
  } catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }

  echo '<div class="alert alert-danger" role="alert">
          ログインに失敗しました。
        </div>
        <br>
        <a href="login.php"><button type="button" class="btn btn-outline-info">戻る</button></a>';
  ?>
</body>

</html>