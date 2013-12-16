<?php

$addStartStopScript = function($projectFolder, $daemonName) {
  $projectName = basename($projectFolder);
  if (file_exists("$projectFolder/$daemonName.php")) {
    $numbers = $daemonName == 'queue' ? '1 2 3' : '1';
    if (file_exists("$projectFolder/site/config/vars/$daemonName.php")) {
      $cfg = require "$projectFolder/site/config/vars/$daemonName.php";
      if (!empty($cfg['workers'])) {
        $s = '';
        for ($i=1; $i<=$cfg['workers']; $i++) $s .= $i.' ';
        $numbers = rtrim($s);
      }
    }
    $tmpFile = "/tmp/$projectName-$daemonName";
    $c = str_replace('{name}', $daemonName, file_get_contents(__DIR__.'/startStop'));
    $c = str_replace('{project}', $projectName, $c);
    $c = str_replace('{numbers}', $numbers, $c);
    file_put_contents($tmpFile, $c);
    $file = "/etc/init.d/$projectName-$daemonName";
    `sudo mv $tmpFile $file`;
    `sudo chmod 0755 $file`;
  }
};
$ngnEnvFolder = dirname(__DIR__);
foreach (glob("$ngnEnvFolder/projects/*", GLOB_ONLYDIR) as $folder) {
  $addStartStopScript($folder, 'queue');
  $addStartStopScript($folder, 'wss');
}