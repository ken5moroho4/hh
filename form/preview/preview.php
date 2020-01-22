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
<<<<<<< Updated upstream
<section class="info" id="news" name ="news">
=======
<section class="info">
>>>>>>> Stashed changes
<h2 class="text-center"><span>news</span></h2>
<div class="container">
        <div class="row">';
$stop = 0;
foreach ($stmt as $row) {
<<<<<<< Updated upstream
  if($stop >= 3){
  break;
  }
  $stop++;
=======
  if($stop >= 18){
  break;
  }
  $stop++;
  $a = "card";
  if($stop > 3){
        $a = "card2";
  }
  if($stop > 6){
        $a = "card3";
  }
>>>>>>> Stashed changes
    // プレビューフォーム
echo'
                    <div class="col-12 col-md-6 col-lg-4 mt-5 test">
                            <a href=';echo $row['link'];echo'>
                                    <div class=';echo $a;echo'>
                                            <img class="card-img-top"  src="../../img/startup-594090_1920.jpg"
                                                    alt="Card image cap" width = "360px">
                                            <div class="car-body">
                                                    <div class="badge badge-secondary">NEW</div>
                                                    <span class="data">'; echo $row['date'];echo '</span>
<<<<<<< Updated upstream
                                                    <h1 class="card-title text-center">'; echo $row['link']; echo'</h1>
=======
                                                    <h1 class="card-title text-center">'; echo $row['title']; echo'</h1>
>>>>>>> Stashed changes

                                            </div>
                                    </div>
                            </a>
<<<<<<< Updated upstream
                    </div>'; }
?>
=======
                    </div>
                    <style>
                    .card{
                            margin-top:30px;
                    }
                    </style>
                    '; }
?>
<script>
var num = 0;
$button = document.getElementById('button');
$(function () {
    $('button').click(function () {
        $('.card2').show();
    });
    $('button').click(function () {
        $(this).data("click", ++num);
        var click = $(this).data("click");
        if(click == 2){
        $('.card3').show();
    }
    });
});
</script>
<div class="col-12 text-center">
        <button id="show">
                <p>もっと読む</p>
                </button>
</div>
>>>>>>> Stashed changes
<div class="col-12 text-center">
    <a class="btn moreLink" href="release.php" role="button">
            <p>公開</p></a>
                </div>
