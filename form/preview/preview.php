<!-- プレビュー画面 -->
<head>
<link rel = "stylesheet" href = "preview.css">
<link rel = "stylesheet" href = "reset.css">
<link rel = "stylesheet" href = "style.css">
<link rel="stylesheet" href="../../css/bootstrap.css">
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</head>
<?php
$pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/form.sqlite3");
$sql = "SELECT * FROM form order by id desc";
$stmt = $pdo->query($sql);
?>
<!-- プレビューで表示させる画面 -->
<?php
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
    // プレビューフォーム
echo'
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
                            <a href="#">
                                    <div class="card">
                                            <img class="card-img-top"  src="../../img/startup-594090_1920.jpg"
                                                    alt="Card image cap">
                                            <div class="card-body">
                                                    <div class="badge badge-secondary">NEW</div>
                                                    <span class="data">'; echo $row['date'];echo '</span>
                                                    <h1 class="card-title text-center">'; echo $row['link']; echo'</h1>

                                            </div>
                                    </div>
                            </a>
                    </div>'; }
?>
<div class="col-12 text-center">
    <a class="btn moreLink" href="release.php" role="button">
            <p>公開</p></a>
                </div>
