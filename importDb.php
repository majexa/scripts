<?php

$c = include dirname(__DIR__).'/config/server.php';
if (empty($_SERVER['argv'][1])) die('db name not defined');
if (empty($_SERVER['argv'][2])) die('file not defined');
`mysql -u {$c['dbUser']} -p{$c['dbPass']} {$_SERVER['argv'][1]} < {$_SERVER['argv'][2]}`;