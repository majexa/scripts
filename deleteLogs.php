#!/usr/local/bin/php
<?php

define('NGN_PATH', dirname(__DIR__).'/ngn');
require_once NGN_PATH.'/lib/core/init.php';
require_once NGN_PATH.'/lib/core/cli-init.php';
define('LOGS_PATH', __DIR__.'/logs');

foreach (glob(dirname(__DIR__).'/www/*') as $f) {
  if (!is_dir($f.'/site/write/logs')) continue;
  Dir::clear($f.'/site/write/logs');
  output('Clear "'.$f.'/write/logs"');
}