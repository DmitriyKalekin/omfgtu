<?php
  require_once("core/env.php");

  $router = new \core\Router($_SERVER["REQUEST_URI"]);
  $controller = $router->getCtl();

  //unset($router);

  header("Content-type: text/html;");
  header("Status: 200 OK");

  if ($_SERVER["REQUEST_METHOD"]=="POST")
  {

      $ret = $controller->do_action($_POST["action"]);
      vd("$ret");
  }

  $controller->run($_REQUEST);

?>
