<link rel="stylesheet" href="../../css/bootstrap.css">
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<?php
// データベース接続
try{
    $edit = $_POST['id_data'];
    $pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/form.sqlite3");
    $today = $_POST["today"];
    $concepts = $_POST["contents"];
    $title = $_POST["title"];
    $link = $_POST["link"];
    // 画像の受け取り、登録
    if($_FILES["upimg"]["name"]){
      $upimg = ($_FILES['upimg']['name']);
       $upimg = file_get_contents($_FILES['upimg']['tmp_name']);
      }
      $upimg = base64_encode($upimg);
      
    $img_path = $edit;
    $fileData = base64_decode($upimg);
    $fileName = $img_path.'.png';
    file_put_contents('../form_img/'.$fileName, $fileData);
    // 確認フォーム
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
$sql = "UPDATE form set date = '$today', concept = '$concepts', title = '$title', link = '$link' where id = $edit;";
$stmt = $pdo->query($sql);
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
    }
    ?>
    <?php
    echo "<h1 class='text-center'>編集成功しました。</h1>";
    echo "<br>";
    echo '<div class="text-center"><button><a href ="../form.php" class="h2 text-center">戻る</a></button></div>';
?>
