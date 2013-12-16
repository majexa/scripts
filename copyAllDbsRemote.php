<?php

// run this by run/run.php
if (empty($_SERVER['argv'][2])) die("Host not defined\n");
print "Start copying all project dbs. From local to {$_SERVER['argv'][2]}\n";
foreach (require dirname(__DIR__).'/config/projects.php' as $v) {
  if (!Db::dbExists($v['name'])) {
    print "Db '{$v['name']}' does not exists. Skipped\n";
    continue;
  }
  print `php /home/user/ngn-env/scripts/copyDbRemote.php {$v['name']} {$_SERVER['argv'][2]}`;
  print "Db '{$v['name']}' copyed OK.\n";
}

