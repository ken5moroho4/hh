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
<section class="info">
<h2 class="text-center"><span>news</span></h2>
<div class="container">
        <div class="row">';
$stop = 0;
foreach ($stmt as $row) {
  if($stop >= 9){
  break;
  }
  $stop++;
//   $a = "card";
//   if($stop > 3){
//         $a = "card2";
//   }
//   if($stop > 6){
//         $a = "card3";
//   }
    // プレビューフォーム
echo'
                    <div class="col-12 col-md-6 col-lg-4">
                            <a href=';echo $row['link'];echo'target="_blank">
                                    <div class="card">
                                            <img class="card-img-top"  src="../form_img/';echo $row['id'];echo '.png';echo'"
                                                    alt="Card image cap" width = "360px" height = "200px">
                                            <div class="car-body">
                                                    <div class="badge badge-danger">NEW</div>
                                                    <span class="data">'; echo $row['date'];echo '</span>
                                                    <div class="link_art">
                                                    <h3 class="card-title mt-10">';
                                                    $title = $row['title'];
                                                    $words = wordwrap($title, 3, '<br/>');
                                                    echo $words;
                                                     echo'</h3>
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
                    '; }
?>
<script>
// 一週間前いないであればnewの表示
// 一週間前取得
var ago=new Date(); 
var year = ago.getFullYear();
var month = ago.getMonth()+1;
var week = ago.getDay();
ago.setDate(ago.getDate() - 7);
var day = ago.getDate();
var one_ago = (year+"年"+month+"月"+day+"日 ");
alert(one_ago);
// 本日の日付
var hiduke=new Date(); 
var year = hiduke.getFullYear();
var month = hiduke.getMonth()+1;
var week = hiduke.getDay();
var day = hiduke.getDate();
var now = (year+"年"+month+"月"+day+"日 ");
alert(now);
</script>
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
            <p>公開</p></a>
                </div>
