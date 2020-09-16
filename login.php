<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = $_POST['email'];
$dsn = "mysql:dbname=test;host=localhost;charaset=utf8";
$user = "root";
$password = "";
try {
  $dbh = new PDO($dsn, $user, $password);
  $sql = "SELECT * FROM admin WHERE email = :email";
  $stmt = $dbh->prepare($sql);
  $stmt->bindParm(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $admin = $stmt->fetch();
} catch (PDOException $e) {
echo "接続失敗:" .$e->getMessage(). "\n";
exit();
}



if (password_verify($_POST['password'], admin['password'])){
  header("Location: list.php");
}else{
  $msg = "メールアドレスかパスワードが正しくありません";
}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST["email"];
  if(empty($_POST["password"])){
    $password = "";
  }else{
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  }
  $validation = new Validation();
  $errors = $validation->admin_login_errmsg($email, $password);
  if(empty($errors)){
    $db1 = new Setdb();
    $db = $db1->admin_db();


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
    <h1>管理者ログイン画面</h1>

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
      <br><br>
      <input type="button" onclick="location.href='#" value="戻る" >

      <input type="submit" value="ログイン">
    </form>
  </body>
</html>

