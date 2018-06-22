<?php

namespace MVC\Controllers;

/**
*   Контроллер для сущности "Новость"
**/
class NewsController extends AController
{

  protected $model = null;
  protected $view = null;

  /**
  *   Подключает Model и View
  **/
  public function __construct()
  {
    $this->model = new \MVC\Models\NewsModel();
    $this->view = new \MVC\Views\News\NewsView();
  }

  /**
  *   Индексная страница с таблицей
  **/
  public function index()
  {
    $news = $this->model->getNews();
    $html = $this->view->show($news);
    echo "$html";
  }

  /**
  *   GET-запрос на форму создания
  **/
  public function create($params)
  {
    $html = $this->view->create($params);
    echo "$html";
  }

  /**
  *   POST-запрос на форму создания
  **/
  public function post_create_news($params)
  {
    if (
      !isset($params["title"]) || empty($params["title"]) ||
      !isset($params["description"]) || empty($params["description"]) ||
      !isset($params["tag"]) || empty($params["tag"])
    )
    {
      return false;
    }

    $this->model->createNews($params);

    header("location: /news");
    return true;
  }

  /**
  *   GET-запрос на форму изменения
  **/
  public function edit()
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $news = $this->model->aboutNews($parts[3]);
      $html = $this->view->edit($news);
      echo "$html";
    }
    else
    {
      header("location: /news");
    }
  }

  /**
  *   POST-запрос на форму изменения
  **/
  public function post_edit_news($params)
  {
    if (!isset($params["id"]) || empty($params["id"]) ||
    !isset($params["title"]) || empty($params["title"]) ||
    !isset($params["description"]) || empty($params["description"]) ||
    !isset($params["tag"]) || empty($params["tag"]))
    {
      return false;
    }

    $this->model->editNews($params);

    header("location: /news");
    return true;
  }

  /**
  *   GET-запрос на удаление
  **/
  public function delete()
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $news = $this->model->aboutNews($parts[3]);
      $html = $this->view->delete($news);
      echo "$html";
    }
    else
    {
      header("location: /news");
    }
  }

  /**
  *   POST-запрос на удаление
  **/
  public function post_delete_news($params)
  {
    if (!isset($params["id"]) || empty($params["id"]))
    {
      return false;
    }

    $this->model->removeNews($params["id"]);

    header("location: /news");
    return true;
  }

  /**
  *   GET-запрос единичной записи
  **/
  public function details($params)
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $news = $this->model->aboutNews($parts[3]);
      $html = $this->view->details($news);
      echo "$html";
    }
    else
    {
      header("location: /news");
    }
  }
}

?>
