<?php

// ngn init
define('NGN_ENV_PATH', dirname(dirname(__DIR__)));
define('NGN_PATH', dirname(dirname(__DIR__)).'/ngn');

// web init
define('SITE_PATH', __DIR__.'/site');
define('WEBROOT_PATH', __DIR__);
define('IS_DEBUG', true);
define('PROJECT_KEY', 'scripts');

require_once NGN_PATH.'/init/core.php';
require_once NGN_PATH.'/init/web.php';

define('SITE_TITLE', 'scripts');
setConstant('SITE_LIB_PATH', SITE_PATH.'/lib');
Lib::addFolder(NGN_ENV_PATH.'/run/lib');

print (new RouterScripts(['disableHeaders' => true]))->dispatch()->getOutput();