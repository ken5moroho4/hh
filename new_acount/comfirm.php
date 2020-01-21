<head>
<link rel="stylesheet" href="comfirm.css">
</head>
<body>
<h1>登録完了しました！</h1>
<?php
//  テーブルの中身挿入
try{
    $pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/sample.sqlite3");
$name = $_POST["name"];
$male = $_POST["male"];
$display_pass = $_POST["pass"];
$pass = password_hash($_POST["pass"],PASSWORD_DEFAULT);
$sql = "INSERT INTO acount(
  name, age,male
) VALUES (
'${name}','${pass}','${male}'
)";
$res = $pdo->query($sql);
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
    }
    echo "<h3>ユーザー名:${name}</h3><br />";
    echo "<h3>パスワード:${display_pass}</h3>";
?>
<a href="../login/login.php"><button>ログイン画面へ</button></a>
<a href="new_acount.php"><button>戻る</button></a>
</body>