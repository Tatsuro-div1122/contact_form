<?php
session_start();

?>

<html>
  <body>
    <h1>お問い合わせフォーム（確認）</h1>
    <form action="complete.php" method="POST">
      <p>名前</p>
      <?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8"); ?>
      <p>メールアドレス</p>
      <?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, "UTF-8"); ?><br>
      <p>問い合わせ内容</p>
      <?php echo htmlspecialchars($_SESSION["content"], ENT_QUOTES, "UTF-8"); ?><br>

      <input type="button" onclick="history.back();" name = "btn_back" value="戻る">

      <input type="submit" value="送信する">
    </form>
  </body>
</html>