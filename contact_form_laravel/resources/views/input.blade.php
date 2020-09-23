<!DOCTYPE html>
<html lang='ja'>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>お問い合わせ</h1>
    <form action="{{ url('confirm') }}" method="post">
      {{ csrf_field() }}
      名前<br>
      <input type="text" mame="name" value="{{old('name')}}"><br>
      <input type="submit" value="送信" name="send">
    </form>
      }
  </body>
</html>
