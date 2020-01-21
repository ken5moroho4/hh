<html>
<head>
  <link rel="stylesheet" href="login1.css">
</head>
<body>
  <h1 id="title">miracleave社員専用ページ</h1>
<form action="complete.php" method="post"> <!--ファイル、methodの指定-->
    <tr id="login_tabel">
      <div id="login_tabel1">
      <h2>ユーザー名</h2>
      <input type="text" name="name" required> <!--名前の入力フォーム作成-->
      <h2>パスワード設定</h2>
      <input type="text" name="pass" required> <!--パスワード入力フォーム作成-->
      <td colspan="2">
        <input type="submit" value="送信" id="sub">
      </div>
    </tr>
    </form>
    <!-- アカウント作成、パスワードわすれ -->
    <div id="form">
    <div id="new_acount">
      <a href = "../new_acount/new_acount.php"><button type="button" id="new_acount">新規アカウント作成</button>
    </div>
    <div id="forgot_pass">
      <a href="../new_acount/forgot_pass/forgot.php"><button type="button" id="forgot_pass">パスワードを忘れた方はこちら</button></a>
    </div>
  </table>
</div>
</body>
</html>
