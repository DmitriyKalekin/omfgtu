<?php

namespace MVC\Controllers;

/**
*   Контроллер для сущности "Пользователь"
**/
class UsersController extends AController
{

  protected $model = null;
  protected $view = null;

  /**
  *   Подключает Model и View
  **/
  public function __construct()
  {
    $this->model = new \MVC\Models\UsersModel();
    $this->view = new \MVC\Views\Users\UsersView();
  }

  /**
  *   Индексная страница с таблицей
  **/
  public function index()
  {
    $users = $this->model->getUsers();
    $html = $this->view->show($users);
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
  public function post_create_user($params)
  {
    if (
    !isset($params["name"]) || empty($params["name"]) ||
    !isset($params["age"]) || empty($params["age"]))
    {
      return false;
    }

    $this->model->createUser($params);

    header("location: /users");
    return true;
  }

  /**
  *   GET-запрос на форму изменения
  **/
  public function edit()
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $user = $this->model->aboutUser($parts[3]);
      $html = $this->view->edit($user);
      echo "$html";
    }
    else
    {
      header("location: /users");
    }
  }

  /**
  *   POST-запрос на форму изменения
  **/
  public function post_edit_user($params)
  {
    if (!isset($params["id"]) || empty($params["id"]) ||
    !isset($params["name"]) || empty($params["name"]) ||
    !isset($params["age"]) || empty($params["age"]))
    {
      return false;
    }

    $this->model->editUser($params);

    header("location: /users");
    return true;
  }

  /**
  *   GET-запрос на удаление
  **/
  public function delete($params)
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $user = $this->model->aboutUser($parts[3]);
      $html = $this->view->delete($user);
      echo "$html";
    }
    else
    {
      header("location: /users");
    }
  }

  /**
  *   POST-запрос на удаление
  **/
  public function post_delete_user($params)
  {
    if (!isset($params["id"]) || empty($params["id"]))
    {
      return false;
    }

    $this->model->removeUser($params["id"]);

    header("location: /users");
    return true;
  }

  /**
  *   GET-запрос единичной записи
  **/
  public function details()
  {
    $parts = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($parts[3])) {
      $user = $this->model->aboutUser($parts[3]);
      $html = $this->view->details($user);
      echo "$html";
    }
    else
    {
      header("location: /users");
    }
  }
}
 ?>
