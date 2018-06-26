<?php
// \core\Router
namespace core;

class Router
{
  public $ctl = "Default";
  public $action = "index";

    public function __construct($url)
    {
      $parts = explode("/", $url);
      unset($parts[0]); // ????
      $ctl = @$parts[1];
      $action = @$parts[2];
      $curRow = @$parts[3];

      if (isset($parts[3]))
      {

      }
      if (isset($parts[2]))
      {
        // ....
      }
      if (empty($parts[2]))
      {
        $action = "index";
      }
      if (empty($ctl))
      {
        $ctl = "default";
      }
      $this->ctl = $ctl;
      $this->action = $action;
      $this->curRow = $curRow;
      return array($ctl, $action, $curRow);
    }

    public function getCtl()
    {
        $class_name = "\\MVC\\Ctl\\".UCFirst($this->ctl)."Controller";

        $ctl = new $class_name();
        $ctl->action = $this->action;
        $ctl->curRow = $this->curRow;

        return new $class_name();

    }
}


?>
