<?php
  session_start();
  $error = "";
  if(isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
    if(empty($_SESSION['name'])) {
      $error = '名前を入力してください';
    header('Location: input.php');
    exit;
    }else{
      ('Location: confirm.php');
    }
  }
  if(isset($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'] ;
  }
  if(isset($_POST['content'])) {
    $_SESSION['content'] = $_POST['content'];
  }
?>
<!DOCTYPE html>
<html>
<body>
    <h1>フォーム(入力)</h1>
    <form action="" method="post">
        名前<br>
        <input type="text" name="name" size="30">
        <br>
        <?php if(isset($error)):?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        メールアドレス<br>
        <input type="text" name="email" size="30"><br>
        問い合わせ内容<br>
        <textarea name="content" cols="50" rows="8"></textarea><br>
        <input type="submit" value="確認">
    </form>
</body>
</html>