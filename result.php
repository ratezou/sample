<?php
$data = array(
  "key1" => "value1",
  "key2" => "value2"
);
// JSON形式に変換
$data = json_encode($data);
// コンテキストオプションセット
$options = array(
  "http" => array(
    "method" => "POST",
    "header" => "Content-type: application/json; charset=UTF-8",
    "content" => $data
  )
);
// ストリームコンテキスト生成
$context = stream_context_create($options);
// POST送信
$result = file_get_contents('https://ratezou-sample.herokuapp.com/api.php', false, $context);
// レスポンス表示
echo $result;
