<?php

define('PROJECT_KEY', 'scripts');
define('WEBROOT_PATH', __DIR__);

require dirname(dirname(__DIR__)).'/ngn/init/web-standalone.php';

define('SITE_TITLE', 'scripts');
//setConstant('SITE_LIB_PATH', PROJECT_PATH.'/lib');
Lib::addFolder(NGN_ENV_PATH.'/run/lib');

print (new RouterScripts(['disableHeaders' => true]))->dispatch()->getOutput();