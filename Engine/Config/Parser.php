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


    $explode = explode(' ', $_RAW);

    return self::scope_reader($explode);
  }

  static private function scope_reader(&$array)
  {
    $output = array();
    $count = count($array);

    for ($i = 0; $i < $count; $i++)
    {
      $item = &$array[$i];

      if ($item == '{')
      {
        $subArray = array_slice($array, $i + 1);
        $out = self::scope_reader($subArray);
        $output[$array[$i - 1]] = $out;
        $i += count($out) + 2;
      }
      if ($item == '}')
      {
        return $output;
      }

      $explode = explode('=', $array[$i]);
      if (count($explode) == 2)
      {
        $output[$explode[0]] = $explode[1];
      }
    }
    return $output;
  }
}
