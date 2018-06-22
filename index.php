<?php
  /*
  *   Подключаем файл окружения
  */
  require_once("core/env.php");

  $router = new \core\Router($_SERVER["REQUEST_URI"]);
  $controller = $router->getCtl();

  header("Content-type: text/html;");
  header("Status: 200 OK");

  /*
  *   В зависимости от REQUEST_METHOD отдаём выполнение
  *   либо GET, либо POST-методу контроллера
  */
  if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
      $ret = $controller->do_action($_POST["action"]);
  }

  $controller->run($_REQUEST);

?>
