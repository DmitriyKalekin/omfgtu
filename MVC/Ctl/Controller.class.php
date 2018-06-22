<?php
namespace MVC\Ctl;

abstract class Controller
{
    public $action = "";

    public function index()
    {
        echo "abstract ctl run()";
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
