<?php

namespace Config;

class Parser
{
  static function parse_acf($_FILENAME)
  {
    $_RAW = file_get_contents($_FILENAME);

    $_RAW = str_replace(['}', '{'], [' } ', ' { '], $_RAW);
    $_RAW = preg_replace('/\s+/', ' ', $_RAW);
    $_RAW = preg_replace('/\s*=\s*/', '=', $_RAW);
    $_RAW = preg_replace('/\s*,\s*/', ',', $_RAW);


    $_EXPLODE = explode(' ', $_RAW);

    return self::scope_reader($_EXPLODE);
  }

  static private function scope_reader(&$_ARRAY)
  {
    $_OUTPUT = array();
    $count = count($_ARRAY);

    for ($i = 0; $i < $count; $i++)
    {
      $item = &$_ARRAY[$i];

      if ($item == '{')
      {
        $subArray = array_slice($_ARRAY, $i + 1);
        $out = self::scope_reader($subArray);
        $_OUTPUT[$_ARRAY[$i - 1]] = $out;
        $i += count($out) + 2;
      }
      if ($item == '}')
      {
        return $_OUTPUT;
      }

      $explode = explode('=', $_ARRAY[$i]);
      if (count($explode) == 2)
      {
        $_OUTPUT[$explode[0]] = $explode[1];
      }
    }
    return $_OUTPUT;
  }
}
