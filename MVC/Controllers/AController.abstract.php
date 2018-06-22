<?php

namespace MVC\Controllers;

/**
*   Абстрактный контроллер
**/
abstract class AController
{
  public $action = "";

  public function index()
  {
      echo "abstract controller run()";
  }

  /**
  *   Обработка GET-запроса
  **/
  public function run()
  {
      return $this->{$this->action}($_REQUEST);
  }

  /**
  *   Обработка POST-запроса
  **/
  public function do_action($action)
  {
      return $this->{"post_".$action}($_POST);
  }

}

?>
