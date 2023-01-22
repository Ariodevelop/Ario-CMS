<?php

spl_autoload_register(

  function ($class)
  {
    $class = str_replace('\\', _, $class);
    require_once __ENGINE__ . _ . $class . '.php';
    if (method_exists($class, "__static")) $class::__static();
  }

);

