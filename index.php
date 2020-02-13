<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>keys test</title>
  <style>
    .key {
      width: 300px;
    }
  </style>
</head>
<body>
  <form action="" id="form">
    <input type="text" class="key" id="key1" placeholder="enter key1">
    <input type="text" class="key" id="key2" placeholder="enter key2">
    <input type="submit" value="post">
  </form>
  <div id="result"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    $(function() {
      'use strict';

      $('.key1').focus();

      $('form')submit(function(){
        var data = $('form').serializeArray();
        console.log(data);
      }

    });
  </script>
</body>
</html>
