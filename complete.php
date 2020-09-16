<?php
require_once('db.php');
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$content = $_SESSION['content'];

$db1 = new Setdb();
$db1->inquiry_db($name, $email, $content);


?>

<html>
  <body>

    <h1>完了画面</h1>

    <h1>送信完了しました！</h1>

    <p>名前</p>
    <?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8"); ?>
    <p>メールアドレス</p>
    <?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES, "UTF-8"); ?><br>
    <p>問い合わせ内容</p>
    <?php echo htmlspecialchars($_SESSION["content"], ENT_QUOTES, "UTF-8"); ?><br>

    <br>
    <br>

    <input type="button" onclick="location.href='input.php'" value="入力画面に戻る" >
  </body>
</html>
