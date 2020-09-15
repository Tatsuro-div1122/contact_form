<?php
require_once('function.php');
session_start();
if(isset($_POST["btn_confirm"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $content = $_POST["content"];
  $errors = validation($name, $email, $content);
  if(count($errors) === 0){
      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      $_SESSION["content"] = $content;
      header("Location: confirm.php");
      exit();
  }
}
?>
<html>
  <body>
    <h1>入力画面</h1>

    <form method="POST">

      <p>名前</p>
      <input type="text" name="name" value="<?php if(isset($errors)){echo htmlspecialchars($name, ENT_QUOTES); }elseif(!empty($_SESSION["name"])){echo htmlspecialchars($_SESSION["name"]);}?>"><br>
      <?php
          if(isset($errors["name"])) {
            echo $errors["name"];
          }
       ?>

      <p>メールアドレス</p>
      <input type="text" name="email" value="<?php if(isset($errors)){echo htmlspecialchars($email, ENT_QUOTES); }elseif(!empty($_SESSION["email"])){echo htmlspecialchars($_SESSION["email"]);}?>"><br>
      <?php
          if(isset($errors["email"])) {
            echo $errors["email"];
          }
       ?>

      <p>問い合わせ内容</p>
      <input type="content" name="content" value="<?php if(isset($errors)){echo htmlspecialchars($content, ENT_QUOTES); }elseif(!empty($_SESSION["content"])){echo htmlspecialchars($_SESSION["content"]);}?>">
      <br>
      <?php
          if(isset($errors["content"])) {
            echo $errors["content"];
          }
       ?>
      <br><br>

      <br><input type="submit" name="btn_confirm" value="確認">
    </form>
  </body>
</html>