<?php

$c = include dirname(__DIR__).'/config/server.php';
if (empty($_SERVER['argv'][1])) die('=(');
if (empty($_SERVER['argv'][2])) die('=(');
$dbNameFrom = $_SERVER['argv'][1];
$dbNameTo = $_SERVER['argv'][2];
$access = "-u {$c['dbUser']} -p{$c['dbPass']}";
`mysqldump $access {$dbNameFrom} > /tmp/$dbNameFrom.sql`;
`mysql $access -e "DROP DATABASE IF EXISTS $dbNameTo"`;
`mysql $access -e "CREATE DATABASE $dbNameTo"`;
`mysql $access $dbNameTo < /tmp/$dbNameFrom.sql`;
`rm /tmp/$dbNameFrom.sql`;
echo "$dbNameFrom copyed to $dbNameTo\n";
