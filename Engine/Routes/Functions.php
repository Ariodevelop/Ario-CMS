<?php

namespace Routes;

abstract class Functions
{
  static function LOAD_PAGE($_request, $_filename)
  {
    if (file_exists($_filename))
    {
      require_once $_filename;
    }
  }
  static function MAIN_PAGE()
  {
    $_path = __ROOT__ . _ . 'Themes' . _ . __CONFIG__['WEBSITE']['THEME'] . _ . 'index.php';
    if (file_exists($_path))
    {
      require_once $_path;
    }
  }
  static function _404()
  {
    http_response_code(404);
    die();
  }

  static function _503()
  {
    http_response_code(404);
    die();
  }
}
