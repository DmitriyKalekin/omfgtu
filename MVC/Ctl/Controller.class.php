<?php
namespace MVC\Ctl;

abstract class Controller
{
  public $action = "";
  public function index()
  {
      echo "abstract ctl run()";
  }
  public function run($action, $curRow, $request)
  {
      if (isset($curRow))
      {
          return $this->$action($curRow, $request);
      } else
      {
        return $this->$action($request);
      }


  }
  public function do_action($action)
  {
      return $this->{"post_".$action}($_POST);
  }
  // public function action_curRow($curRow)
  // {
  //   return $this->{$curRow}($_POST);
  // }


}



?>
