<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <h1>フォーム(完了)</h1>
    名前<br>
    <?php echo $_SESSION["name"]; ?><br>
    <br>メールアドレス<br>
    <?php echo $_SESSION['email']; ?><br>
    <br>問い合わせ内容<br>
    <?php echo $_SESSION['content']; ?>
</body>
</html>

