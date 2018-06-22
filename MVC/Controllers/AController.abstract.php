<?php
namespace MVC\Controllers;

abstract class AController
{
  public $action = "";

  public function index()
  {
      echo "abstract controller run()";
  }

  public function run()
    {
        return $this->{$this->action}($_REQUEST);
    }

    public function do_action($action)
    {
        return $this->{"post_".$action}($_POST);
    }

}


 ?>
