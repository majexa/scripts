<?php

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname(__DIR__)), RecursiveIteratorIterator::SELF_FIRST);
foreach ($objects as $name => $object) {
  if (is_dir($object)) continue;
  if (!strstr($object, '-classesList')) continue;
  print "delete: $object\n";
  unlink($object);
}
print "done\n";