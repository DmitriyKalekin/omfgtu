<?php
namespace MVC\Ctl;

class DefaultController extends \MVC\Ctl\Controller
{
    public function index()
    {
        $html = "GENERAL Page";

        echo $html;
    }

    public function form(array $params)
    {


        $tree_model = new \MVC\Model\TreeModel();
        $result = $tree_model->getTree(); // array("id"=>1)

        $view = new \View\FormIntent();
        $html = $view->show($params);
        echo $html;
    }


    // $_POST
    public function post_create_intent($params)
    {

        if (empty($params["intent_name"]))
            return false;

        if (!isset($params["pid"]) || $params["pid"]=="")
            return false;



        //vd(debug_backtrace());


        $tree_model = new \MVC\Model\TreeModel();
        $tree_model->create_intent($params);

        header("location: /default/index");
        return true;


    }


}


?>
