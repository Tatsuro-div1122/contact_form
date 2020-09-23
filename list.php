<?php

  session_start();
  require_once('db.php');
  require_once('function.php');
  check_login();

  if(isset($_POST['logout'])){
    $_SESSION=array();
    $session_destroy;
  }

  $db = db_connect();

  $sql = 'SELECT * FROM admin';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h1>ユーザー一覧</h1>
<form method="POST" action="login.php">
  <input type="submit" name="logout" value="ログアウト">
</form>
<table border="1">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
       <tr>
         <td><?php echo $user['name'];?></td>
         <td><?php echo $user['email'];?></td>
         <td>
            <form action="delete.php" method="GET">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input type='submit' name='delete' value="削除">
            </form>
            <form action="edit.php" method="GET" name='edit'>
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <input type='submit' name='edit'value="修正">
            </form>
          </td>
       <tr>
      <?php } ?>
  </tbody>

</table>


<input type="button" onclick="location.href='admin_register.php'" value="管理者登録" >

<input type="button" onclick="location.href='login.php'" value="ログインページへ" >

<?php
 echo "<pre>";
 echo var_dump($_SESSION);
 echo "</pre>";
?>