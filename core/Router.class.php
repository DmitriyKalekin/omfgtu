<?php
// \core\Router
namespace core;

class Router
{
    public $ctl = "default";
    public $action = "show";

    public function __construct($url)
    {
        $parts = explode("/", $url);
        unset($parts[0]); // ????

        $ctl = @$parts[1];
        $action = @$parts[2];
    
        $this->ctl = $ctl;
        $this->action = $action;
        return array($ctl, $action);
    }

    public function getCtl()
    {
        $class_name = "\\MVC\\Ctl\\".UCFirst($this->ctl)."Controller";
        
        $ctl = new $class_name();
        $ctl->action = $this->action;
        
        return new $class_name();
    }   
}


?>
