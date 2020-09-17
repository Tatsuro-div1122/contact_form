<?php
session_start();
require_once('db.php');

if(isset($_POST['delete'])){
  $id = $_GET['id'];
  $db = db_connect();
  $sql = 'DELETE FROM admin WHERE ID = :id';
  $stmt = $db->prepare($sql);
  $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  header('Location: list.php');
}
?>

<h1>本当に削除しますか？</h1>


<form method='POST'>
  <input type='button' value="やめる" onclick="history.back()">
  <input type='submit'  name='delete' value="削除" onClick="return confirm('削除してもよろしいですか?')">

