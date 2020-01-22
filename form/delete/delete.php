<head>
<link rel="stylesheet" href="../../css/bootstrap.css">
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</head>
<body>
  <style>
    body{
      text-align: center;
    }
    </style>
<h1>この投稿を消去しますか？</h1>
<?php
 $delete = $_POST['delete'];
$pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/form.sqlite3");
$sql = "SELECT * FROM form where id = $delete";
$stmt = $pdo->query($sql);
foreach ($stmt as $row) {
  $date = $row['date'];
  $concept = $row['concept'];
  $title = $row['title'];
  $link = $row['link'];
  echo '削除する投稿内容';
  echo "<form method ='post' action ='delete_comp.php'>
<<<<<<< Updated upstream
  <button value=$delete name='delete' class='form-inline'><h1>はい</h1></button></form>";
  echo "<a href = ../form.php><button class='float-left'><h1>戻る</h1></button></a>";
=======
  <button value=$delete name='delete' class='btn-danger'>はい</button></form>";
  echo "<a href = ../form.php><button class='btn-danger'>いいえ</button></a>";
>>>>>>> Stashed changes

  


  echo "<table class='table'>
<thead>
  <tr>
    <th scope='col'>日付</th>
    <th scope='col'>タイトル</th>
    <th scope='col'>内容</th>
    <th scope='col'>リンク</th>
  </tr>
</thead>";
echo " <tbody>
<tr>
  <th scope='row'>$date</th>
  <td>$concept</td>
  <td>$title</td>
  <td>$link</td>
</tr>
</tbody>";
}
?>
</body>