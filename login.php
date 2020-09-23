<?php

session_start();

require_once('db.php');



if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $errors = array();

  if ($email === '') {
    $errors['email'] = "*メールアドレスを入力してください";
  }
  if ($password === '') {
    $errors['password'] = "*パスワードを入力してください";
  }

  if(count($errors) === 0) {

    $db = db_connect();

    $sql = 'SELECT * FROM admin WHERE email = :email' ;
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':email', $email, PDO::PARAM_STR);

    $stmt->execute();

    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
      $password_hash = $row['password'];

      if (password_verify($password, $password_hash)) {
        $_SESSION['id'] = $row['id'];
        header('Location: list.php');
        exit();
      }else{
        $errors['login'] = "ログインに失敗しました";

      }
    }
  }
}





?>
<html>
  <body>
    <h1>管理者ログイン画面</h1>
    <b>
      <?php if(isset($errors['login'])){echo $errors['login'];}?>
    </b>

    <form method="POST">

      <p>メールアドレス</p>
      <input type="text" name="email" value="<?php if(isset($errors)){echo htmlspecialchars($email, ENT_QUOTES);}?>"><br>
      <span>
        <?php
          if(isset($errors["email"])) {
            echo $errors["email"];
          }
        ?>
      </span>

      <p>パスワード</p>
      <input type="password" name="password" value="<?php if(isset($errors)){echo htmlspecialchars($password, ENT_QUOTES); }?>">
      <br>
      <span><?php
          if(isset($errors["password"])) {
            echo $errors["password"];
          }
         ?>
      </span>

      <br>
      <br>
      <input type="button" onclick="location.href='admin_register.php'" value="新規登録" >

      <input type="submit" name="submit" value="ログイン">
    </form>
  </body>
</html>


<?php 
  echo var_dump($_SESSION);
?>