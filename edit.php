<?php
  session_start();
  require_once('db.php');
  require_once('function.php');
  check_login();
  $errors = array();
  if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $db = db_connect();
    $sql = 'SELECT * FROM admin WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $user['name'];
    $email = $user['email'];
  }

  if(isset($_POST['submit'])){

    if($_POST['name'] == ""){
       $errors['name'] = "*名前を入力してください";
    }

    if($_POST['email'] == ""){
       $errors['email'] = "*メールアドレスを入力してください";
    }

    if(count($errors) == 0) {
      $_SESSION['id'] = $id;
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['email'] = $_POST['email'];
      header('Location: edit_confirm.php');
      exit();
    }
  }
?>
<h1>ユーザー編集画面</h1>
<form method='POST'>
  <p>
    Name: <input type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}else{ echo htmlspecialchars($name);}?>">
    <br>
    <?php if(!empty($errors['name'])){ echo $errors['name'] ;}?>
  </p>
  <p>
    Email: <input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{ echo htmlspecialchars($email);}?>">
    <br>
    <?php if(!empty($errors['email'])){ echo $errors['email'] ;}?>
  </p>


  <br>
  <input type='button' value="戻る" onclick="history.back()">
  <input type='submit' name = 'submit' value="確認">
</form>
