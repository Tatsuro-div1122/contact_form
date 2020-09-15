<?php
require_once('db.php');
session_start();


$db = db_connection();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$content = $_SESSION['content'];

$sql = "INSERT INTO contact_form(name, email, content)VALUES(:name, :email, :content)";

$stmt = $db->prepare($sql);

$stmt -> bindParam(':name', $name, PDO::PARAM_STR);
$stmt -> bindParam(':email', $email, PDO::PARAM_STR);
$stmt -> bindParam(':content', $content, PDO::PARAM_STR);

$stmt->execute();

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
