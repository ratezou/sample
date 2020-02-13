<?php

echo "this is api.php\n";
$json = json_decode(file_get_contents('php://input'), true);
echo $json['key1'];
echo $json['key2'];
