#!/usr/bin/php
<?php

require dirname(__DIR__).'/pm/common-init.php';

foreach ((new PmLocalProjectRecords)->getRecords() as $v) {
  sys("php ".NGN_ENV_PATH."/run/site.php {$v['name']} makeBackup");
}