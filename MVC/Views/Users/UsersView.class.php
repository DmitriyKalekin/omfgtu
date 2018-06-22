<?php

namespace MVC\Views\Users;

/**
*   Представление для сущности "Пользователь"
**/
class UsersView {

  /**
  *   Список записей
  **/
  public function show(array $params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    $elem_count = count($params);
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<div class=main>";
    require_once('MVC/Views/HeaderView.php');
    echo "<div class=create_button>";
    echo "<a class=navigation href = '/users/create'>create new</a>";
    echo "</div>";
    echo "<table cellspacing=0>";
    echo "<caption><b>Users</b></caption>";
    echo "<tr align='center'>";
    echo "<th><b>name</b></th><th><b>age</b></th><th><b>controls</b></th>";
    echo "</tr>";
    if (isset($params) && $elem_count > 0)
    {
      for ($i = 0; $i < $elem_count; $i++)
      {
        echo "<tr><td>{$params[$i]["name"]}</td><td>{$params[$i]["age"]}</td><td><a class = navigation href='/users/edit/{$params[$i]["id"]}'>edit</a> <a class = navigation href='/users/delete/{$params[$i]["id"]}'>delete</a> <a class = navigation href='/users/details/{$params[$i]["id"]}'>details</a></td></tr>";
      }
    }
    echo"</table>";
    echo "</div>";
    return ob_get_clean();
  }

  /**
  *   Форма создания
  **/
  public function create($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<div class=main>";
    require_once('MVC/Views/HeaderView.php');
    echo "<form method=\"post\">";
    echo "<b>name</b><br />";
    echo "<input type=text name=\"name\" value=\"".htmlspecialchars(@$params["name"])."\" /><br /><br />";
    echo "<b>age</b><br />";
    echo "<input type=number name=\"age\" value=\"".htmlspecialchars(@$params["age"])."\" /><br /><br />";
    echo "<input type=hidden name=\"action\" value=\"create_user\" />";
    echo "<button type=submit>create user</button>";
    echo "</form>";
    echo "</div>";
    return ob_get_clean();
  }

  /**
  *   Форма изменения
  **/
  public function edit($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<form method=\"post\">";
    echo "<b>name</b><br />";
    echo "<input type=text name=\"name\" value=\"".htmlspecialchars(@$params["name"])."\" /><br /><br />";
    echo "<b>age</b><br />";
    echo "<input type=number name=\"age\" value=\"".htmlspecialchars(@$params["age"])."\" /><br /><br />";
    echo "<input type=hidden name=\"action\" value=\"edit_user\" />";
    echo "<input type=hidden name=\"id\" value=\"".htmlspecialchars(@$params["id"])."\" />";
    echo "<button type=submit>edit user</button>";
    echo "</form>";
    return ob_get_clean();
  }

  /**
  *   Форма удаления
  **/
  public function delete($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<div class=main>";
    require_once('MVC/Views/HeaderView.php');
    echo "<table cellspacing=0>";
    echo "<caption>Users</caption>";
    echo "<tr align='center'>";
    echo "<th><b>name</b></th><th><b>age</b></th>";
    echo "</tr>";
    echo "<tr><td>{$params["name"]}</td><td>{$params["age"]}</td></tr>";
    echo "</table>";
    echo "<form method=\"post\">";
    echo "<input type=hidden name=\"action\" value=\"delete_user\" />";
    echo "<input type=hidden name=\"id\" value=\"{$params["id"]}\" />";
    echo "<button type=submit>Delete</button>";
    echo "</form>";
    echo "<a class=navigation href = '/users'>back to users</a>";
    echo "</div>";
    return ob_get_clean();
  }

  /**
  *   Отдельная запись
  **/
  public function details($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<div class=main>";
    require_once('MVC/Views/HeaderView.php');
    echo "<table cellspacing=0>";
    echo "<caption>Users</caption>";
    echo "<tr align='center'>";
    echo "<th><b>name</b></th><th><b>age</b></th>";
    echo "</tr>";
    echo "<tr><td>{$params["name"]}</td><td>{$params["age"]}</td></tr>";
    echo "</table>";
    echo "<a class=navigation href = '/users'>back to users</a>";
    echo "</div>";
    return ob_get_clean();
  }
}

?>
