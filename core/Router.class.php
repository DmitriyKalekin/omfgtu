<?php

namespace core;

/**
*   Класс-роутер для передачи управления контроллерам
**/
class Router
{
  protected $controller = "Default";
  protected $action = "index";

  /**
  *   Определяет нужный контроллер по URL
  **/
  public function __construct($url)
  {
    $parts = explode("/", $url);
    unset($parts[0]);

    if (!empty($parts[1]))
    {
      $ctl = @$parts[1];

      if (!empty($parts[2]))
      {
        $action = @$parts[2];
        $this->action = $action;
      }
      $this->controller = $ctl;
    }

    return array($this->controller, $this->action);
  }

  /**
  *   Возвращает контроллер
  **/
  public function getCtl()
  {
    $class_name = "\\MVC\\Controllers\\".UCFirst($this->controller)."Controller";
    $controller = new $class_name();
    $controller->action = $this->action;
    return $controller;
  }
}

?>
