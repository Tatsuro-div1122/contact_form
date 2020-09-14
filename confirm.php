
<!DOCTYPE html>
<html>
<body>
  <h1>フォーム(確認)</h1>
  <form action="complete.php" method="post">
      名前<br>
      <?php echo $_POST['name']; ?><br>
      <br>メールアドレス<br>
      <?php echo $_POST['email']; ?><br>
      <br>問い合わせ内容<br>
      <?php echo $_POST['content']; ?><br>
      <br><input type="submit" value="送信">
  </form>
</body>
</html>