<?php
namespace MVC\Ctl;

abstract class Controller
{

    public function show()
    {
        echo "abstract ctl run()";
    }

    public function run($action, $rowNumber, $request)
    {
        if(isset($rowNumber))
        {
            return $this->{$action}($request, $rowNumber);
        }
        else
        {
            return $this->{$action}($request);       
        }
    }
    
    public function do_action($action)
    {
        return $this->{$action}($_POST);
    }


}



?>
