<!-- preview.phpとrelease.htmlの仲介、ここでrelease.htmlにコードをおくり更新する -->
<?php
header('Location:release_production.html');
ob_start();
?>
<head>
<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8"/>
<link rel = "stylesheet" href = "preview.css">
<link rel = "stylesheet" href = "reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel="stylesheet" href="../../css/bootstrap.css">
<script type="text/javascript" src="../../static/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../static/js/bootstrap.js"></script>
</head>
<?php
$pdo = new PDO('sqlite:../../cms.db');
$sql = "SELECT * FROM form order by id desc";
$stmt = $pdo->query($sql);
// セクションのタグ
echo '
<section class="info" id="news" name ="news">
<h2 class="text-center"><span>news</span></h2>
<div class="container">
        <div class="row">';
$stop = 0;
foreach ($stmt as $row) {
  if($stop >= 3){
  break;
  }
  $stop++;

  echo'
  <div class="col-12 col-md-6 col-lg-4 mt-5">
          <a href=';echo $row['link'];echo'>
                  <div class="card">
                          <img class="card-img-top"  src="../../static/img/startup-594090_1920.jpg"
                                  alt="Card image cap" width = "360px">
                          <div class="card-body">
                                  <div class="badge badge-secondary">NEW</div>
                                  <span class="data">'; echo $row['date'];echo '</span>
                                  <h1 class="card-title text-center">'; echo $row['title']; echo'</h1>

                          </div>
                  </div>
          </a>
  </div>
  <style>
  .card{
          margin-top:30px;
  }
  </style>'; }
?>
<!-- セクションの閉じたぐ -->
<?php echo '</div>
</div>'?>
<div class="col-12 text-center">
<a class="btn moreLink" href="#" role="button">
                <p>もっと読む</p>
        </a>
</div>
</section>
<?php
file_put_contents( 'release.html', ob_get_contents() );
echo "<script>alert('ホームページが更新されました')</script>";
echo "<h1 class='text-center'>上記の画面が挿入されます。</h1>";
echo "<a href = '../form.php'><h2 class='text-center'>投稿フォームへ</h2></a>";
file_put_contents( 'release_production.html', ob_get_contents() );
 
// 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
ob_end_clean();
?>