<?php
try{
    $login_name = $_POST["name"];
    $login_pass = $_POST["pass"];
  $pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/sample.sqlite3");
  $sql = "SELECT * FROM acount WHERE name = '${login_name}'";
  $stmt = $pdo->query($sql);
  foreach ($stmt as $row) {
    // データベースのフィールド名で出力
     if($_POST['name'] = $row['name']){
      if(password_verify($_POST['pass'], $row['age'])){
        header('Location:../form/form.php');
       }
     }
  }
  } catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }
  echo "ログインに失敗しました.";
  echo '<br>';
  echo '<a href ="login.php">戻る</a>';
?>
