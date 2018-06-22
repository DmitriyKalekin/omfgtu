<?php
// \core\Router
namespace core;

class Router
{
    protected $ctl = "Default";
    protected $action = "index";



    public function __construct($url)
    {
        $parts = explode("/", $url);
        unset($parts[0]); // ????

        $ctl = @$parts[1];
        $action = @$parts[2];

        if (isset($parts[2]))
        {
            // ....

        }

        if (!empty($parts[2]))
        {
            // ....
        }

        if (empty($ctl))
        {
            $ctl = "default";
        }


        $this->ctl = $ctl;
        $this->action = $action;

        return array($ctl, $action);
    }

    public function getCtl()
    {
        $class_name = "\\MVC\\Ctl\\".UCFirst($this->ctl)."Controller";


        // $xml->{book-first}
        $ctl = new $class_name();
        $ctl->action = $this->action;

        return  $ctl;



    }


}


?>
