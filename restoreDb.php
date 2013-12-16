<?php

$c = include dirname(__DIR__).'/config/server.php';
if (empty($_SERVER['argv'][1]) or empty($_SERVER['argv'][2])) {
  print "\nsyntax: ".__FILE__." dbName date\n";
  return;
}
$dbName = $_SERVER['argv'][1];
$date = $_SERVER['argv'][2];
$backupDir = dirname(__DIR__)."/backup/db/$dbName";
`tar -zxvf $backupDir/$date.sql.tgz`;
//`mysql -u {$c['dbUser']} -p{$c['dbPass']} {$dbNameTo} < /tmp/$dbNameFrom.sql`;
