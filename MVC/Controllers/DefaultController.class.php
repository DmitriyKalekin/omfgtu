<?php

namespace MVC\Controllers;

/**
*   Контроллер по умолчанию
**/
class DefaultController extends AController
{
  protected $view = null;

  /**
  *   Присоединяет View
  **/
  public function __construct()
  {
    $this->view = new \MVC\Views\IndexView();
  }

  /**
  *   Отображает индексную страницу
  **/
  public function index()
  {
    $html = $this->view->index();
    echo "$html";
  }

}

?>
