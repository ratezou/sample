<?php

  $json = json_decode(file_get_contents('php://input'), true);
  print $json['key1'];
