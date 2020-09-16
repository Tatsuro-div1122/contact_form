<?php
require_once('function.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $content = $_POST["content"];
  $validation = new Validation();
  $errors = $validation-> inquiry_errmsg($name, $email, $content);
  if(empty($errors)){
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
      <input type="text" name="name" value="<?php if(isset($errors)){echo htmlspecialchars($name, ENT_QUOTES); }elseif(!empty($_SESSION["name"])){echo htmlspecialchars($_SESSION["name"], ENT_QUOTES);}?>"><br>
      <span><?php
          if(isset($errors["name"])) {
            echo $errors["name"];
          }
       ?>
      </span>

      <p>メールアドレス</p>
      <input type="text" name="email" value="<?php if(isset($errors)){echo htmlspecialchars($email, ENT_QUOTES); }elseif(!empty($_SESSION["email"])){echo htmlspecialchars($_SESSION["email"], ENT_QUOTES);}?>"><br>
      <span>
        <?php
          if(isset($errors["email"])) {
            echo $errors["email"];
          }
        ?>
      </span>

      <p>問い合わせ内容</p>
      <input type="content" name="content" value="<?php if(isset($errors)){echo htmlspecialchars($content, ENT_QUOTES); }elseif(!empty($_SESSION["content"])){echo htmlspecialchars($_SESSION["content"], ENT_QUOTES);}?>">
      <br>
      <span><?php
          if(isset($errors["content"])) {
            echo $errors["content"];
          }
         ?>
      </span>
      <br><br>

      <br><input type="submit" name="btn_confirm" value="確認">
    </form>
  </body>
</html>

