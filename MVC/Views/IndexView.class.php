<?php

namespace MVC\Views;

/**
*   Простая страничка
**/
class IndexView
{
  public function index()
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<div class=main>";
    require_once('MVC/Views/HeaderView.php');
    echo "<h1>Main page</h1>";
    echo "</div>";
    return ob_get_clean();
  }
}

 ?>
