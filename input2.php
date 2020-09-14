<?php
session_start();
$errors = array();
if(isset($_POST["btn_confirm"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $content = $_POST["content"];

  if($name === "") {
    $errors["name"] = "名前を入力してください";
  }
  if($email === "") {
    $errors["email"] = "メールアドレスを入力してください";
  }
  if($content === "") {
    $errors["content"] = "内容を入力してください";
  }

  if(count($errors) === 0){
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["content"] = $content;
    header("Location: confirm2.php");
    exit();
  }

}
?>
<html>
  <body>
    <h1>入力画面</h1>

    <form method="POST">

      <p>名前</p>
      <input type="text" name="name" value="<?php if(isset($errors)){echo htmlspecialchars($name, ENT_QUOTES); }?>"><br>
      <?php
          if(isset($errors["name"])) {
            echo $errors["name"];
          }
       ?>

      <p>メールアドレス</p>
      <input type="text" name="email" value="<?php if(isset($errors)){echo htmlspecialchars($email, ENT_QUOTES); }?>"><br>
      <?php
          if(isset($errors["email"])) {
            echo $errors["email"];
          }
       ?>

      <p>問い合わせ内容</p>
      <input type="content" name="content" value="<?php if(isset($errors)){echo htmlspecialchars($content, ENT_QUOTES); }?>">
      <br>
      <?php
          if(isset($errors["content"])) {
            echo $errors["content"];
          }
       ?>
      <br><br>

      <br><input type="submit" name="btn_confirm" value="送信する">
    </form>
  </body>
</html>