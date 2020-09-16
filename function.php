<?php
  class Validation {


    public function inquiry_errmsg($name, $email, $content){

        $errors = array();
          if($name === "") {
            $errors["name"] = "*名前を入力してください";
          }
          if($email === "") {
            $errors["email"] = "*メールアドレスを入力してください";
          }
          if($content === "") {
            $errors["content"] = "*内容を入力してください";
          }
        return $errors;
      }

    public function admin_errmsg($name, $email, $password){
        $errors = array();
          if($name === "") {
            $errors["name"] = "*名前を入力してください";
          }
          if($email === "") {
            $errors["email"] = "*メールアドレスを入力してください";
          }
          if($password === "") {
            $errors["password"] = "*パスワードを入力してください";
          }
        return $errors;
    }

    public function admin_login_errmsg($email, $password){
      $errors = array();
        if($email === "") {
          $errors["email"] = "*メールアドレスを入力してください";
        }
        if($password === "") {
          $errors["password"] = "*パスワードを入力してください";
        }
        return $errors;
    }
  }