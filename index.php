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
    <input type="text" class="key" id="key2" placeholder="enter key1">
  </form>
  <div id="result"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    $(function() {
      'use strict';

      $('#license_key').focus();

      // db操作
      $('#form').on('submit', function() {
        // ライセンス（入力値）を取得
        var key = $('#key').val();
        // ajax処理
        $.post('_ajax.php', {
          key: key,
          mode: 'activate'
        }, function(res) {
          $('#result').text(res.result + ':' + res.message);
        });
        return false;
      });

    });
  </script>
</body>
</html>
