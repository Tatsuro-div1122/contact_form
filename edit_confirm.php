<?php
  session_start();
  require_once('db.php');
  require_once('function.php');
  check_login($_SESSION['id']);

  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $id = $_SESSION['id'];
  if(isset($_POST['submit'])){
      $db = db_connect();
      $sql = 'UPDATE admin set name = :name, email = :email WHERE id = :id';
      $stmt = $db->prepare($sql);
      $stmt -> bindParam(':name', $name, PDO::PARAM_INT);
      $stmt -> bindParam(':email', $email, PDO::PARAM_INT);
      $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      header('Location: list.php');
      exit();
  }
?>
<h1>ユーザー編集確認画面</h1>
<form method='POST'>
  <p>
    Name: <?php echo htmlspecialchars($name) ;?>
  </p>
  <p>
    Email: <?php echo htmlspecialchars($email) ;?>
  </p>


  <br>
  <input type='button' value="戻る" onclick="history.back()">
  <input type='submit' name='submit' value="確認">
</form>


