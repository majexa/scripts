<?php

$c = include dirname(__DIR__).'/config/server.php';
$dbName = $_SERVER['argv'][1];
$date = date('d-m-Y_H-i-s');
$backupDir = dirname(__DIR__)."/backup/db/$dbName";
if (!file_exists(dirname($backupDir))) mkdir(dirname($backupDir));
if (!file_exists($backupDir)) mkdir($backupDir);
`mysqldump -u {$c['dbUser']} -p{$c['dbPass']} $dbName > $backupDir/$date.sql`;
`tar -czf $backupDir/$date.sql.tgz $backupDir/$date.sql`;
unlink("$backupDir/$date.sql");