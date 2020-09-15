<?php

$dsn = "mysql:dbname=test;host=localhost;charaset=utf8";
$user = "root";
$password = "";

try {
  $db = new PDO($dsn, $user, $password);
  echo "接続成功";
} catch (PDOException $e) {
  echo "接続失敗:" .$e->getMessage(). "\n";
  exit();
}

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userName = "tanaka";

$sql = "INSERT INTO contact_form(id, name, email)VALUES(NULL, :userName, 'tanaka@example.com')";

$sql = "SELECT * FROM contact_form";

$stmt = $db->prepare($sql);

$stmt->bindParam(':userName', $userName, PDO::PARAM_STR);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);


?>