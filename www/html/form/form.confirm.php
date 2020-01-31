<!-- 投稿完了フォーム -->
<html>

<head>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</head>

<body>
  <?php
  // データベース接続
  try {
    $pdo = new PDO('sqlite:../cms.db');
    $today = $_POST["today"];
    $today =  date("Y/m/d", strtotime($today));
    $concepts = $_POST["contents"];
    $title = $_POST["title"];
    $link = $_POST["link"];

    // 画像データ受け取り
    if ($_FILES["upimg"]["name"]) {
      $upimg = ($_FILES['upimg']['name']);
      $upimg = file_get_contents($_FILES['upimg']['tmp_name']);
    }
    $upimg = base64_encode($upimg);

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
  <th scope='row'>$today</th>
  <td>$concepts</td>
  <td>$title</td>
  <td>$link</td>
</tr>
</tbody>";
    // データベースに内容登録
    $sql = "INSERT INTO form(
  date, concept, title,link
) VALUES (
'${today}','${concepts}','${title}','${link}'
)";

    $res = $pdo->query($sql);
  } catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }
  echo "<h1 class='text-center'>投稿成功しました。</h1>";
  echo "<br>";
  echo '<div class="text-center"><button><a href ="form.php" class="h2 text-center">戻る</a></button></div>';
  ?>
  <!-- 上で投稿したidを抽出、画像にひもづけ -->
  <?php
  $i = 1;
  $sql1 = "SELECT * FROM form order by id desc";
  $stmt = $pdo->query($sql1);
  foreach ($stmt as $row) {
    if ($i >= 2) {
      break;
    } else {
      $id =  $row['id'];
      $i++;
    }
  }
  ?>
  <!-- 画像表示 -->
  <img src="data:image/jpg;base64,<?php echo $upimg; ?>" width="100px">
  <?php
  $img_path = $id;
  $fileData = base64_decode($upimg);
  $fileName = $img_path . '.png';
  file_put_contents('../static/data/img/' . $fileName, $fileData);
  ?>
</body>

</html>