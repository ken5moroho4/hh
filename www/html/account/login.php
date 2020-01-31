<!DOCTYPE html>
<html lang="ja">

<header>
  <title>cms</title>
  <?php include('../include/bootstrap.php'); ?>
</header>

<body>
  <!-- CMSログイン -->
  <div class="card mx-auto" style="width: 40rem;">
    <div class="card-header">
      CMS
    </div>
    <div class="card-body">
      <form action="complete.php" method="post">
        <div class="form-group row">
          <label for="account" class="col-sm-4 col-form-label">アカウント名</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="account" name="name" placeholder="ログインアカウントを入力してください" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-4 col-form-label">パスワード</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="password" name="pass" placeholder="パスワードを入力してください" required>
          </div>
        </div>
        <div class="float-right" style="text-align: right;">
          <a href="new.php"><button type="button" class="btn btn-outline-info">新規アカウント作成</button></a>
          <button type="submit" class="btn btn-outline-primary">ログイン</button>
          <div><a href="forget.php">パスワードを忘れた方はこちら</a></div>
        </div>

      </form>
    </div>
  </div>
</body>

</html>
