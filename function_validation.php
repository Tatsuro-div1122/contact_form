<?php



  function validation($btn_confirm, $name, $email, $content){
    $btn_confirm = $btn_confirm;
    if(isset($btn_confirm)){
        $name = $name;
        $email = $email;
        $content = $content;
        
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

        if(count($errors) === 0){
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["content"] = $content;
        
        header("Location: confirm.php");
        exit();
        return $_SESSION;
        }else{
          return $errors;
        }

    }
  }