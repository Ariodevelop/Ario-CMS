<?php

spl_autoload_register('load');

function load($classname)
{
  $classname = str_replace('\\', _, $classname);
  require_once __ENGINE__ . _ . $classname . '.php';
  if (method_exists($classname, "__static")) $classname::__static();
}