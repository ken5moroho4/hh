<!DOCTYPE html>
<html lang="ja">
<!-- プレビュー画面 -->

<head>
  <link rel="stylesheet" href="preview.css">
  <link rel="stylesheet" href="style.css">
  <title>cms</title>
  <?php include('../../include/nested_bootstrap.php'); ?>
</head>

<?php
$pdo = new PDO('sqlite:../../cms.db');
$sql = "SELECT * FROM form order by id desc";
$stmt = $pdo->query($sql);
?>
<!-- プレビューで表示させる画面 -->
<?php
echo '
<section class="info">
<h2 class="text-center"><span>news</span></h2>
<div class="container">
        <div class="row">';
$stop = 0;
foreach ($stmt as $row) {
  if ($stop >= 9) {
    break;
  }
  $stop++;

  $form_date =  $row['date'];
  $one_week_ago =  date("Y/m/d", strtotime("-7 day"));
  if($form_date > $one_week_ago&&date("Y/m/d") >=$form_date)
  {
        $new = "New";
  }else{
          $new = "";
  }
  // プレビューフォーム
  echo '
                    <div class="col-12 col-md-6 col-lg-4">
                            <a href=';
  echo $row['link'];
  echo 'target="_blank">
                                    <div class="card">
                                            <img class="card-img-top"  src="../static/data/img/';
  echo $row['id'];
  echo '.png';
  echo '"
                                                    alt="Card image cap" width = "360px" height = "200px">
                                            <div class="car-body">
                                                    <div class="badge badge-danger">';echo $new;echo'</div>
                                                    <span class="data">';
  echo $row['date'];
  echo '</span>
                                                    <div class="link_art">
                                                    <h3 class="card-title mt-10">';
  $title = $row['title'];
  $words = wordwrap($title, 3, '<br/>');
  echo $words;
  echo '</h3>
                                                     </div>
                                            </div>
                                    </div>
                            </a>
                    </div>
                    <h1 id="d"></h1>   
                    <style>
                    .card{
                            margin-top:50px;
                    }
                    .link_art{
                        width: 100%;
                        height:80px;
                        position:relative;
                        padding-bottom:40px;
                    }
                      h3{
                        padding:20px 0 40px 0;
                        width: 330px;
                        height:70px;
                        word-wrap: break-word;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2;
                        margin: 0;
                        overflow: hidden;
                      }
                    </style>
                    ';
}
?>

<!--  var num = 0;
 $button = document.getElementById('button');
 $(function () {
    $('button').click(function () {
         $('.card2').show();
         $('.card2').css('margin-top','30px');
     });
     $('button').click(function () {
         $(this).data("click", ++num);
         var click = $(this).data("click");
         if(click == 2){
         $('.card3').show();
         $('.card3').css('margin-top','30px');
    }
    });
 }); -->
<!-- もっと見るボタンはホームページに -->
<!-- <div class="col-12 text-center">
        <button class="btn btn-danger">
                <p>もっと読む</p>
                </button>
</div> -->
<br>
</section>
<div class="col-12 text-center">
  <a class="btn btn-warning" href="release.php" role="button">
    <p>公開</p>
  </a>
</div>

</html>