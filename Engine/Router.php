<?php

$_routes = __CONFIG__['ROUTES'];


if (isset($_routes[__REQ_PATH__]))
{
  $_route = $_routes[__REQ_PATH__];

  $_request_function = $_route['FUNCTION'];

  $_request_method = $_route['MEHTODS'];


  if (!method_exists('Routes\Functions', $_request_function)) Routes\Functions::_503();
}
else
{
  Routes\Functions::_404();
}
