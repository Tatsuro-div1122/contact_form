<?php
require_once('function.php');
require_once('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  if(empty($_POST["password"])){
    $password = "";
  }else{
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
  }
  $validation = new Validation();
  $errors = $validation->admin_errmsg($name, $email, $password);
  if(empty($errors)){
    $db = db_connect();


    $sql = 'INSERT INTO admin(name, email, password)VALUES(:name, :email, :password)';

    $stmt = $db->prepare($sql);

    $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
    $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
    $stmt -> bindParam(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: list.php");
    exit();
  }
}
?>
<html>
  <body>
    <h1>管理者登録画面</h1>

    <form method="POST">

      <p>名前</p>
      <input type="text" name="name" value="<?php if(isset($errors)){echo htmlspecialchars($name, ENT_QUOTES); }?>"><br>
      <span><?php
          if(isset($errors["name"])) {
            echo $errors["name"];
          }
       ?>
      </span>

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
      <br><br>
      <input type="button" onclick="location.href='login.php'" value="ログインページへ" >

      <input type="submit" value="登録">
    </form>
  </body>
</html>

<?php var_dump($name, $email, $password); ?>