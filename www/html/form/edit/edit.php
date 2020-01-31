<!-- 投稿編集フォーム -->
<html>

<head>
  <title>cms</title>
  <?php include('../../include/nested_bootstrap.php'); ?>
</head>

<?php
$edit = $_GET['id'];

$pdo = new PDO('sqlite:../../cms.db');
$sql = "SELECT * FROM form where id = $edit";
$stmt = $pdo->query($sql);
foreach ($stmt as $row) {
  $date =  $row['date'];
  $title = $row['title'];
  $concept = $row['concept'];
  $link = $row['link'];
}
?>

<body>
  <!-- フィード投稿編集 -->
  <div class="card mx-auto" style="width: 50rem;">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="mr-auto p-1">フィード投稿編集</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="edit_complete.php" enctype="multipart/form-data">
        <input name='id_data' type="hidden" value="<?= $edit ?>" />
        <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label">投稿日</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="date" name="today" value="<?= date("Y-m-d", strtotime($date)) ?>" required />
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-4 col-form-label">タイトル(*)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" placeholder="タイトルを入れてください" value="<?= $title ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="contents" class="col-sm-4 col-form-label">内容</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="contents" name="contents" placeholder="投稿する内容を入力してください"><?= $concept ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="link" class="col-sm-4 col-form-label">リンク先(*)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="link" name="link" placeholder="リンク先を入力してください" value="<?= $link ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4">編集前画像</label>
          <div class="col-sm-8">
            <img src="../../static/data/img/<?= $edit ?>.png" alt="" width='360px' height='200px'>
          </div>
        </div>
        <div class="form-group row">
          <label for="upimg" class="col-sm-4 col-form-label">画像(*)</label>
          <div class="col-sm-8">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="upimg">
              <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
            </div>
          </div>
        </div>
        <div class="alert alert-danger" role="alert">
          画像は縦200px,横360pxで表示されます。
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-outline-primary">更新</button>
          <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>

<script>
  // ファイル選択時にファイル名を表示
  $('.custom-file-input').on('change', function() {
    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
  })
</script>