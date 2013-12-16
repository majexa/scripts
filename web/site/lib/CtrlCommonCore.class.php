<?php

class CtrlCommonCore extends CtrlCommon {

  function action_ajax_ip() {
    $this->ajaxOutput = $_SERVER['HTTP_X_REAL_IP'];
  }

}