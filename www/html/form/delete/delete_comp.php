<?php
echo "<script>
alert('投稿消去完了しました');
</script>";
$id = $_POST['id'];
$pdo = new PDO('sqlite:../../cms.db');
$sql = "DELETE FROM form WHERE id = $id";
$stmt = $pdo->query($sql);
$img_path = $delete;
$fileName = $img_path.'.png';
unlink('../../static/data/img/'.$fileName);
header('Location:../form.php');
?>