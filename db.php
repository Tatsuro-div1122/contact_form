<?php
  class Setdb {
    function inquiry_db($name, $email, $content) {
      try {
        $dsn = "mysql:dbname=test;host=localhost;charaset=utf8";
        $user = "root";
        $password = "";
        $db = new PDO($dsn, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO contact_form(name, email, content)VALUES(:name, :email, :content)';
        $stmt = $db->prepare($sql);

        $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
        $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> bindParam(':content', $content, PDO::PARAM_STR);

        $stmt->execute();
      } catch (PDOException $e) {
      echo "接続失敗:" .$e->getMessage(). "\n";
      exit();
      }
    }
  }

   function db_connect() {
    try {
      $dsn = "mysql:dbname=test;host=localhost;charaset=utf8";
      $user = "root";
      $password = "";
      $db = new PDO($dsn, $user, $password);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $db;
    } catch (PDOException $e) {
    echo "接続失敗:" .$e->getMessage(). "\n";
    exit();
    }
  }

