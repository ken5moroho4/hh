<?php
$male = $_POST["male"];
 $pdo = new PDO ( "sqlite:C:/xampp/htdocs/php/sqlite-tools-win32-x86-3300100/sample.sqlite3" );
 $sql = "SELECT * FROM acount WHERE male = '${male}'";
 $stmt = $pdo->query($sql);
 foreach ($stmt as $row) {
    // データベースのフィールド名で出力
    if(isset($row['male'])){
        mb_language("Japanese"); 
        mb_internal_encoding("UTF-8");
         
        $email = "k.morohoshi@miracleave.co.jp";
        $subject = "テスト";
        $body = "テストメール";
        $to = "${male}";
        $header = "From: $email\nReply-To: $email\n";
        mb_send_mail($to, $subject, $body, $header);
    }else{
    }
  }
?>