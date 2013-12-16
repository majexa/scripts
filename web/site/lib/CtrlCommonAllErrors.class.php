<?php

class CtrlCommonAllErrors extends CtrlCommonErrors {

  function errors() {
    return new AllErrors;
  }

}