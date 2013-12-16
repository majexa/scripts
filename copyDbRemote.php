<?php

$c = include dirname(__DIR__).'/config/server.php';
if (empty($_SERVER['argv'][1])) die('Db name not defined');
if (empty($_SERVER['argv'][2])) die('Host not defined');
$dbName = $_SERVER['argv'][1];
$host = $_SERVER['argv'][2];
`mysqldump -u {$c['dbUser']} -p{$c['dbPass']} {$dbName} > /tmp/$dbName.sql`;
`scp /tmp/$dbName.sql user@$host:/tmp/$dbName.sql`;
`rm /tmp/$dbName.sql`;
$p = "-u {$c['dbUser']} -p{$c['dbPass']}";
system("ssh user@$host '".
  //"mysql $p -e \"DROP DATABASE IF EXISTS $dbName\"".
  //"mysql $p -e \"CREATE DATABASE $dbName\"".
  "mysql $p $dbName < /tmp/$dbName.sql; ".
  'mysql '.$p.' -Nse "show tables" '.$dbName.' | while read table; do mysql '.$p.' -e "drop table $table" '.$dbName.'; done; '. // delete all tables
  "mysql $p $dbName < /tmp/$dbName.sql; ".
  "rm /tmp/$dbName.sql; ".
  "".
  "'");
