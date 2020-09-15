<?php
  function db_connection() {
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


