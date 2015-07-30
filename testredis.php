<?php

$redis = new Redis();

$redis->connect('127.0.0.1');
$redis->set('hello','hehanlin');

echo $redis->get('hello');
echo $redis->type('hello');
$redis->close();
