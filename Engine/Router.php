<?php

abstract class Router
{
  
}

$_ROUTES = __CONFIG__['ROUTES'];

var_dump($_ROUTES);
if (isset($_ROUTES[__REQ_PATH__]))
{
  $_REQ_PATH = $_ROUTES[__REQ_PATH__];
  $_REQ_METHOD = $_ROUTES['MEHTOD'];

  echo $_REQ_METHOD;

  if (function_exists($_ROUTE))
  {
  }
}
