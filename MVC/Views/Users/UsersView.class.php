<?php
namespace MVC\Views\Users;
class UsersView {
  public function show(array $params)
  {
    //vd($params);
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    $elem_count = count($params);
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<a href = '/users/create'>create new</a>";
    echo "<table cellspacing=0>";
    echo "<caption>Users</caption>";
    echo "<tr align='center'>";
    echo "<th><b>name</b></th><th><b>age</b></th><th><b>controls</b></th>";
    echo "</tr>";

    if (isset($params) && $elem_count > 0)
    {
      for ($i = 0; $i < $elem_count; $i++)
      {
        echo "<tr><td>{$params[$i]["name"]}</td><td>{$params[$i]["age"]}</td><td><a href='/users/edit/{$i}'>edit</a> <a href='/users/delete/{$i}'>delete</a> <a href='/users/details/{$i}'>details</a></td></tr>";
      }
    }

    echo"</table>";



    return ob_get_clean();
  }
}

?>
