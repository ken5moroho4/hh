<head>
<?php
 $edit = $_POST['edit'];
?>
<?php
$pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/form.sqlite3");
$sql = "SELECT * FROM form where id = $edit";
$stmt = $pdo->query($sql);
foreach ($stmt as $row) {
    $date =  $row['date'];
    $title = $row['title'];
    $concept = $row['concept'];
    $link = $row['link'];
}
    ?> 
<link rel="stylesheet" href="../../css/bootstrap.css">
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>
</head>
<body>
    <style>
        body{
            text-align: center;
        }
        </style>
<h1>投稿編集画面</h1>
<!-- 投稿機能の部分のhtml -->
<form method="POST" action="edit_complete.php" enctype="multipart/form-data" class="toukou_form">
<input name='id_data' type="hidden" value= "<?php echo $edit;?>" />
  <input name="today" type="date" value= "<?php echo $edit;?>"  required ></input>
<br><br>
<textarea name="title" rows="1" cols="40" placeholder = "投稿ページのタイトルを入れてください" required><?php echo $title;?></textarea>
<br><br>
<textarea name="contents" rows="8" cols="40" placeholder="投稿する内容を入力してください" required><?php echo $concept;?>
</textarea><br><br>
<textarea name="link" rows="1" cols="40" placeholder = "リンク先として表示する文字を入力してください" required><?php echo $link;?></textarea>
<br><br>
<h6>編集前画像</h6>
<img src="../form_img/<?php
echo $edit
 ?>.png" alt="" width = '300px' height = '200px'>
 <div class="upimg">
<input type="file" name="upimg" required>
</div>
<h6 class="alert-danger">画像を選択してください、縦200px,横360pxで表示されます。</h6>
<br><br>
<input type="submit" name="btn1" value="編集を完了する" class="btn btn-warning">
</form>
<style>
body{
    text-align: center;
}
.edit{
    color: red;
    width: 100px;
    height: 50px;
}
.delete{
    color: red;
    width: 100px;
    height: 50px;
}
/* 画像選択フォーム */
.upimg{
    text-align: center;
    margin: 0 auto;
    margin-left: 80px;
}
/* 投稿フォームの周りの枠 */
.toukou_form{
    padding: 0.5em 1em;
    margin: 2em 0;
    font-weight: bold;
    border: solid 3px #000000;
    width: 500px;
    text-align: center;
    margin: 0 auto;
}
</style>
</body>