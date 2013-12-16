#!/usr/bin/php
<?php

/*
$r = explode("\n", trim(`ps aux | grep /home/user/ngn-env/projects/{$_SERVER['argv'][1]}/queue.php`));
$r = array_filter($r, function($s) { return !strstr($s, 'grep'); });
if (count($r) < 3) {
  print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue stop`;
  print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue start`;
}
*/
print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue stop`;
print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue start`;
//print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue restart || sudo /etc/init.d/{$_SERVER['argv'][1]}-queue start`;
//print `sudo /etc/init.d/{$_SERVER['argv'][1]}-queue restart`;