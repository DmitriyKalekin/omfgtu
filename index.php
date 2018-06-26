<?php
require_once("config.php");
require_once("./core/env.php");

$router = new \core\Router($_SERVER["REQUEST_URI"]); // "\core\Router.class.php"

$ctl = $router->getCtl();
//$action = $router->getAction();
// UTF - 8
header("Content-type: text/html;");
header("Status: 200 OK");
// if ($_SERVER["REQUEST_METHOD"]=="POST")
// {
//     $ret = $ctl->do_action($_POST["action"]);
// }
// $ctl->run($router->action,$_REQUEST);

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $ret = $ctl->do_action($_POST["action"]);
}
$ctl->run($router->action, $router->curRow, $_REQUEST);
\core\Db::close();
?>
