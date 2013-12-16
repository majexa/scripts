<?php

class CtrlCommonSitePreview2 extends CtrlCommon {

  function action_ajax_default() {
    if (empty($this->req['url'])) throw new Exception('url not defined');
    $name = md5($this->req['url']).'.png';
    // paths
    $webrootDir = 'sitePreview';
    $webroot = WEBROOT_PATH."/$webrootDir";
    $uri = "/$webrootDir/cache/$name";
    $file = "$webroot/cache/$name";
    // -------
    if (empty($this->req['forceCache']) and file_exists($file)) {
      $this->redirect($uri);
      return;
    }
    $cutycapt = NGN_ENV_PATH.'/bin/CutyCapt';
    $w = (int)($this->req['w'] ?: 1000);
    $h = (int)($this->req['h'] ?: 670);
    sys("xvfb-run $cutycapt --url={$this->req['url']} --out=$file --min-width=$w --min-height=$h");
    $this->redirect($uri);
  }

  function redirect_______($r = null) {
    die2($r);
  }

}