<?php
namespace MVC\Controllers;

require_once("core/env.php");

class UsersController extends AController
{

  protected $model = null;
  protected $view = null;

  public function __construct()
  {
    $this->model = new \MVC\Models\UsersModel();
    $this->view = new \MVC\Views\Users\UsersView();
  }

  public function index()
  {
    $users = $this->model->getUsers();
    $html = $this->view->show($users);
    echo "$html";
  }

  public function create()
  {
    $html = $this->view->create();
    echo "html";
  }


  //TODO POST_CREATE
  public function post_create($params)
  {

  }

  public function edit()
  {
    if(!empty($_GET["id"]) && !empty($_GET["name"]) && !empty($_GET["age"]))
    {
      $this->model->editUser(array('id' => $_GET["id"], 'name' => $_GET["name"], 'age' => $_GET["age"]));
    }
    else
    {
      printf("Specify what user to edit\n");
      vd($_GET);
    }
  }

  public function delete()
  {
    if(!empty($_GET["id"])){
      $this->model->removeUser($_GET["id"]);
    }
    else
    {
      printf("Specify what user to delete\n");
      vd($_GET);
    }
  }

  public function details()
  {
    if(!empty($_GET["id"])){
      $user = $this->model->aboutUser($_GET["id"]);
      vd($user);
    }
    else
    {
      printf("Specify what user to view\n");
      vd($_GET);
    }
  }
}
 ?>
