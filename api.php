<?php

$json = json_decode(file_get_contents('php://input'), true);
$key1 = $json['key1'];
$key2 = $json['key2'];

//db接続
$url = parse_url(getenv('DATABASE_URL'));
$dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
$pdo = new PDO($dsn, $url['user'], $url['pass']);

try{
  //DBに登録があればチェックOK
  $stmt = $pdo->prepare("select count(*) cnt from test where key1 = :key1 and key2 = :key2");
  $stmt->execute([
    ':key1' => $key1,
    ':key2' => $key2
  ]);
  $row = $stmt->fetch();
  if ($row['cnt'] == 1) {
    result(0, 'already registered');
  }

  //DBに登録がなく、key1の登録件数が2件以上のときはエラー
  $stmt = $pdo->prepare("select count(*) cnt from test where key1 = :key1");
  $stmt->execute([
  ':key1' => $key1
  ]);
  $row = $stmt->fetch();
  if ($row['cnt'] >= 2) {
    result(9, 'already exists');
  }

  //DBに登録がなく、key1の登録件数が2件未満のときは、DBに登録してチェックOKとする
  $sql = "insert into test(key1, key2) values(:key1, :key2)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':key1' => $key1,
    ':key2' => $key2
  ]);
    result(0, 'registered');
  } catch (Exception $e){
    result(9, $e->getMessage());
}


function result($result_code, $result_message) {
  header("Content-Type: application/json; charset=UTF-8");
  $result = array('result' => $result_code, 'message' => $result_message);
  return json_encode($result);
}
