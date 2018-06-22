<?php
namespace MVC\Views\News;
class NewsView {
  public function show(array $params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    $elem_count = count($params);
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<a href = '/news/create'>create new</a>";
    echo "<table cellspacing=0>";
    echo "<caption>News</caption>";
    echo "<tr align='center'>";
    echo "<th><b>title</b></th><th><b>description</b></th><th><b>tag</b></th><th><b>controls</b></th>";
    echo "</tr>";

    if (isset($params) && $elem_count > 0)
    {
      for ($i = 0; $i < $elem_count; $i++)
      {
        echo "<tr><td>{$params[$i]["title"]}</td><td>{$params[$i]["description"]}</td><td>{$params[$i]["tag"]}</td><td><a href='/news/edit/{$params[$i]["id"]}'>edit</a> <a href='/news/delete/{$params[$i]["id"]}'>delete</a> <a href='/news/details/{$params[$i]["id"]}'>details</a></td></tr>";
      }
    }

    echo"</table>";

    return ob_get_clean();
  }

  public function create($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<form method=\"post\">";
    echo "<b>title</b><br />";
    echo "<input type=text name=\"title\" value=\"".htmlspecialchars(@$params["title"])."\" /><br /><br />";
    echo "<b>description</b><br />";
    echo "<input type=comment name=\"description\" value=\"".htmlspecialchars(@$params["description"])."\" /><br /><br />";
    echo "<input type=hidden name=\"action\" value=\"create_news\" />";
    echo "<b>tag</b><br />";
    //  TODO изменить структуру базы, отрефакторить!!!
    echo "<input type=text name=\"tag\" value=\"".htmlspecialchars(@$params["tag"])."\" /><br /><br />";
    echo "<button type=submit>Create News</button>";
    echo "</form>";
    return ob_get_clean();
  }

  public function delete($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<table cellspacing=0>";
    echo "<caption>News</caption>";
    echo "<tr align='center'>";
    echo "<th><b>title</b></th><th><b>description</b></th><th><b>tag</b></th>";
    echo "</tr>";
    echo "<tr><td>{$params["title"]}</td><td>{$params["description"]}</td><td>{$params["tag"]}</td></tr>";
    echo "</table>";
    echo "<form method=\"post\">";
    echo "<input type=hidden name=\"action\" value=\"delete_news\" />";
    echo "<input type=hidden name=\"id\" value=\"{$params["id"]}\" />";
    echo "<button type=submit>Delete</button>";
    echo "</form>";
    echo "<a href = '/news'>back to news</a>";
    return ob_get_clean();
  }

  public function details($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<link rel='stylesheet' href='/style.css'/>";
    echo "<table cellspacing=0>";
    echo "<caption>News</caption>";
    echo "<tr align='center'>";
    echo "<th><b>title</b></th><th><b>description</b></th><th><b>tag</b></th>";
    echo "</tr>";
    echo "<tr><td>{$params["title"]}</td><td>{$params["description"]}</td><td>{$params["tag"]}</td></tr>";
    echo "</table>";
    echo "<a href = '/news'>back to news</a>";
    return ob_get_clean();
  }

  public function edit($params)
  {
    ob_start();
    header("Content-type: text/html;");
    header("Status: 200 OK;");
    echo "<form method=\"post\">";
    echo "<b>title</b><br />";
    echo "<input type=text name=\"title\" value=\"".htmlspecialchars(@$params["title"])."\" /><br /><br />";
    echo "<b>description</b><br />";
    echo "<input type=comment name=\"description\" value=\"".htmlspecialchars(@$params["description"])."\" /><br /><br />";
    echo "<input type=hidden name=\"action\" value=\"edit_news\" />";
    echo "<input type=hidden name=\"id\" value=\"".htmlspecialchars(@$params["id"])."\" />";
    echo "<b>tag</b><br />";
    //  TODO изменить структуру базы, отрефакторить!!!
    echo "<input type=text name=\"tag\" value=\"".htmlspecialchars(@$params["tag"])."\" /><br /><br />";
    echo "<button type=submit>Edit news</button>";
    echo "</form>";
    return ob_get_clean();
  }


}

?>
