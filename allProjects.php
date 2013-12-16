#!/usr/bin/php
<?php

require dirname(__DIR__).'/pm/common-init.php';


foreach ((new PmLocalProjectRecords)->getRecords() as $v) {
  if (file_exists(NGN_ENV_PATH.'/projects/'.$v['name'])) {
    sys("php ".NGN_ENV_PATH."/run/site.php {$v['name']} ".implode(' ', array_slice($_SERVER['argv'], 1)));
  }
}