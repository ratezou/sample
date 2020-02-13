<?php
// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');

// numパラメータにセットする値
$num = 10;
// WebAPIのURL
$url = "http://localhost:1024/api.php?num=${num}";
// URLの内容を取得し、json形式からstdClass形式に変換し取得
$data = json_decode(file_get_contents($url));
// 連想配列で取得したかったら第二引数にtrueを指定↓
// $data = json_decode(file_get_contents($url), true);

// dataのstatusがyesだったら(出力に成功したら)
if($data->status == "yes") {
    // 114倍の値をprint
    print $data->x114;
}
