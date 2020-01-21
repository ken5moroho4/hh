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
<form method="POST" action="edit_complete.php">
<input name='id_data' type="hidden" value= "<?php echo $edit;?>" />
  <input name="today" type="date" value= "<?php echo $date;?>"  required ></input>
<br><br>
<textarea name="title" rows="1" cols="40" placeholder = "投稿ページのタイトルを入れてください" required><?php echo $title;?></textarea>
<br><br>
<textarea name="contents" rows="8" cols="40" placeholder="投稿する内容を入力してください" required><?php echo $concept;?>
</textarea><br><br>
<textarea name="link" rows="1" cols="60" placeholder = "リンク先として表示する文字を入力してください" required><?php echo $link;?></textarea>
<br><br>

<input type="submit" name="btn1" value="編集を完了する">
</form>
</body>