<?php
require_once("config.php");
require_once("./core/env.php");

$router = new \core\Router($_SERVER["REQUEST_URI"]); // "\core\Router.class.php"

$ctl = $router->getCtl();

// UTF - 8
header("Content-type: text/html;");
header("Status: 200 OK");

//$ctl->{action}();
$ctl->index();


$tree_model = new \MVC\Model\TreeModel();

$result = $tree_model->getTree(); // array("id"=>1)

vd($result);


\core\Db::close();
?>
