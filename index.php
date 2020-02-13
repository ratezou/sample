<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>keys test</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="key1">
    <input type="text" name="key2">
    <input type="submit" name="submit">
  </form>
  <div id="result"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    $(function() {
      'use strict';

      $('form')submit(function(){
        var data = $('form').serializeArray();
        console.log(data);
      }

    });
  </script>
</body>
</html>
