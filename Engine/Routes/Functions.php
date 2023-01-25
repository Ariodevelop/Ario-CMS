<?php

namespace Routes;

abstract class Functions
{
  static function LOAD_PAGE($_REQ, $_FILENAME)
  {
    if (file_exists($_FILENAME))
    {
      require_once $_FILENAME;
    }
  }
}
