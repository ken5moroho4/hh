<!-- 投稿削除 -->
<html>

<head>
  <title>cms</title>
  <?php include('../../include/nested_bootstrap.php'); ?>
</head>

<?php
$id = $_GET['id'];

$pdo = new PDO('sqlite:../../cms.db');
$sql = "SELECT * FROM form where id = $id";
$stmt = $pdo->query($sql);
foreach ($stmt as $row) {
  $date =  $row['date'];
  $title = $row['title'];
  $concept = $row['concept'];
  $link = $row['link'];
}
?>

<body>
  <!-- フィード投稿削除 -->
  <div class="card mx-auto" style="width: 50rem;">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="mr-auto p-1">フィード投稿内容</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="delete_comp.php">
        <input name='id' type="hidden" value="<?= $id ?>" />
        <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label">投稿日</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="date" name="today" value="<?= date("Y-m-d", strtotime($date)) ?>" readonly />
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-4 col-form-label">タイトル</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="contents" class="col-sm-4 col-form-label">内容</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="contents" name="contents" readonly><?= $concept ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="link" class="col-sm-4 col-form-label">リンク先</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="link" name="link" value="<?= $link ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4">画像</label>
          <div class="col-sm-8">
            <img src="../../static/data/img/<?= $id ?>.png" alt="" width='360px' height='200px'>
          </div>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-outline-danger">削除</button>
          <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>