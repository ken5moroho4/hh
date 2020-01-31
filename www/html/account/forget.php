<!DOCTYPE html>
<html lang="ja">

<header>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</header>

<body>
  <!-- パスワード再発行ページ、メールアドレス入力 -->
  <div class="card mx-auto" style="width: 30rem;">
    <div class="card-header">
      パスワード再設定
    </div>
    <div class="card-body">
      <form action="male_conf.php" method="post">
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">メールアドレス</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="staticEmail" name="male" placeholder="email@example.com" required>
          </div>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-outline-primary">送信</button>
          <button type="button" class="btn btn-outline-secondary" onclick="history.back()">戻る</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>