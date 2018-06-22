<?php
namespace MVC\Ctl;

abstract class Controller
{

    public function show()
    {
        echo "abstract ctl run()";
    }

    public function run($action, $request)
    {
        return $this->{$action}($request);
    }
    
    public function do_action($action)
    {
        return $this->{$action}($_POST);
    }


}



?>
