<!-- アカウント登録完了フォーム -->
<head>
<link rel="stylesheet" href="comfirm.css">
</head>
<body>
  <div class="new_account">
<h1>登録完了</h1>
<?php
//  テーブルの中身挿入
try{
    $pdo = new PDO (  "sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/new_account.sqlite3");
$name = $_POST["name"];
$display_pass = $_POST["pass"];
$pass = password_hash($_POST["pass"],PASSWORD_DEFAULT);
$sql = "INSERT INTO account(
  name,pass
) VALUES (
'${name}','${pass}'
)";
$res = $pdo->query($sql);
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
    }
    echo "<h3>ユーザー名:${name}</h3><br />";
    echo "<h3>パスワード:${display_pass}</h3>";
?>
</div>
<a href="../login/login.php"><button class="btn btn-warning">ログイン画面へ</button></a>
<a href="new_acount.php"><button class="btn btn-danger">戻る</button></a>
</body>