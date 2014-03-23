<?php

throw new Exception('depricated');
$ngnEnvFolder = dirname(__DIR__);
$copy = function($folder, $name, $force = false) use ($ngnEnvFolder) {
  if (!file_exists("$folder/$name.php")) {
    if ($force) {
      print "create '$name' of '".basename($folder)."' project\n";
      copy("$ngnEnvFolder/dummyProject/$name.php", "$folder/$name.php");
      return;
    }
    return;
  }
  if (!`diff $ngnEnvFolder/dummyProject/$name.php $folder/$name.php`) return;
  if (filemtime("$ngnEnvFolder/dummyProject/$name.php") == filemtime("$folder/$name.php")) return;
  print "update '$name' of '".basename($folder)."' project\n";
  copy("$ngnEnvFolder/dummyProject/$name.php", "$folder/$name.php");
};
foreach (glob("$ngnEnvFolder/projects/*", GLOB_ONLYDIR) as $folder) {
  $copy($folder, 'index', true);
  $copy($folder, 'cmd', true);
  $copy($folder, 'queue');
  $copy($folder, 'wss');
}
`php $ngnEnvFolder/pm/pm.php localProjects updateIndex`;