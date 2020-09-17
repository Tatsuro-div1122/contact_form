<?php
  session_start();
  require_once('db.php');

  if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $db = db_connect();
    $sql = 'SELECT * FROM admin WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
  }
?>
<h1>ユーザー編集画面</h1>
<form action="edit_confirm.php" method='GET'>
  <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
  <p>
    Name: <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']) ;?>">
  </p>
  <p>
    Email: <input type="text" name="email" value="<?php echo htmlspecialchars($user['email']) ;?>">
  </p>


  <br>
  <input type='button' value="戻る" onclick="history.back()">
  <input type='submit' value="確認">
</form>
