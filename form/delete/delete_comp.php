<?php
echo "<script>
alert('投稿消去完了しました');
</script>";
 $delete = $_POST['delete'];
$pdo = new PDO ("sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/form.sqlite3");
$sql = "DELETE FROM form WHERE id = $delete";
$stmt = $pdo->query($sql);
$img_path = $delete;
$fileName = $img_path.'.png';
unlink('../form_img/'.$fileName);
header('Location:../form.php');
?>