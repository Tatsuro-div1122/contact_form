<?php
  function validation($name, $email, $content){
    $errors = array();
      if($name === "") {
        $errors["name"] = "名前を入力してください";
      }
      if($email === "") {
        $errors["email"] = "メールアドレスを入力してください";
      }
      if($content === "") {
        $errors["content"] = "内容を入力してください";
      }
    return $errors;
  }
