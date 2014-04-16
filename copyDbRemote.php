<?php

$c = include dirname(__DIR__).'/config/server.php';
if (empty($_SERVER['argv'][1])) die('Syntax: '.basename(__FILE__)." dbName host [port] [password]\n");
if (empty($_SERVER['argv'][2])) die('Syntax: '.basename(__FILE__)." dbName host [port] [password]\n");
$dbName = $_SERVER['argv'][1];
$host = $_SERVER['argv'][2];
$port = $_SERVER['argv'][3];
`mysqldump -u{$c['dbUser']} -p{$c['dbPass']} {$dbName} > /tmp/$dbName.sql`;
`scp -P $port /tmp/$dbName.sql user@$host:/tmp/$dbName.sql`;
`rm /tmp/$dbName.sql`;
$p = "-u{$c['dbUser']} -p{$c['dbPass']}";
if (isset($_SERVER['argv'][4])) $p2 = "-u{$c['dbUser']} -p{$_SERVER['argv'][4]}";
else $p2 = $p;
system("ssh user@$host -p $port '".
  'mysql '.$p2.' -Nse "show tables" '.$dbName.' | while read table; do mysql '.$p2.' -e "drop table $table" '.$dbName.'; done; '. // delete all tables
  "mysql $p2 $dbName < /tmp/$dbName.sql; ".
  "rm /tmp/$dbName.sql; ".
  "".
  "'");