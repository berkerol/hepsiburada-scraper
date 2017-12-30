<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

switch ($request_uri[0]) {
  case '/':
    require 'home.php';
    break;
  case '/list':
    require 'list.php';
}
