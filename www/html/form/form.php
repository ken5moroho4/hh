<!-- 新規投稿フォーム、投稿履歴 -->
<html>

<head>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</head>

<?php
// ==============================
// テーブルが存在しない場合、作成
// ==============================
try {
  $pdo = new PDO('sqlite:../cms.db');
  $pdo->exec(
    "
    CREATE TABLE IF NOT EXISTS form(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      date VARCHAR(10),
      concept VARCHAR(10),
      title VARCHAR(10),
      link VARCHAR(10)
    )"
  );
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
?>

<body>
  <!-- フィード投稿 -->
  <div class="card mx-auto" style="width: 50rem;">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="mr-auto p-1">フィード投稿</h4>
      </div>
    </div>
    <div class="card-body">
      <form method="POST" action="form.confirm.php" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="date" class="col-sm-4 col-form-label">投稿日</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="date" name="today" required />
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-4 col-form-label">タイトル(*)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" placeholder="タイトルを入れてください" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="contents" class="col-sm-4 col-form-label">内容</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="contents" name="contents" placeholder="投稿する内容を入力してください"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="link" class="col-sm-4 col-form-label">リンク先(*)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="link" name="link" placeholder="リンク先を入力してください" required>
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
          <button type="submit" class="btn btn-outline-primary">投稿する</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card mt-5 mx-auto" style="width: 50rem;">
    <div class="card-header">
      <div class="d-flex align-items-center">
        <h4 class="mr-auto p-1">投稿履歴</h4>
        <a href="preview/preview.php">
          <button type="button" class="btn btn-outline-info">プレビュー表示</button>
        </a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>日付</th>
            <th>タイトル</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          // ==============================
          // 投稿内容一覧表示
          // ==============================
          try {
            $pdo = new PDO('sqlite:../cms.db');
            $sql = "SELECT * FROM form order by id desc";
            $stmt = $pdo->query($sql);

            foreach ($stmt as $row) {
              // ==============================
              // 投稿履歴フォーム
              // ==============================
              echo "
                <tr>
                  <td class='align-middle'>{$row['date']}</td>
                <td class='align-middle'>{$row['title']}</td>
                <td>
                  <a href='edit/edit.php?id={$row['id']}'>
                    <button type='button' class='btn btn-outline-info'>編集</button>
                  </a>
                  <a href='delete/delete.php?id={$row['id']}'>
                    <button type='button' class='btn btn-outline-danger'>削除</button>
                  </a>
                </td>
              </tr>";
            }
          } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
          }
          ?>
        </tbody>
      </table>
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

<style>
  .table {
    table-layout: fixed;
  }

  td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>