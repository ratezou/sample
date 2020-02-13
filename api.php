<?php

  echo "this is api.php";
  $json = json_decode(file_get_contents('php://input'), true);
  echo $json['key1'];
